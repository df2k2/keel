import { test } from 'node:test';
import assert from 'node:assert/strict';
import { spawnSync } from 'node:child_process';
import { existsSync, mkdirSync, mkdtempSync, writeFileSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join, resolve } from 'node:path';
import { read } from './helpers.js';

const SCRIPT = resolve( 'bin/rename.sh' );

/** Builds a minimal committed repository shaped like the theme. */
function makeRepo() {
	const dir = mkdtempSync( join( tmpdir(), 'keel-rename-' ) );
	const files = {
		'style.css': '/*\nTheme Name: Keel\nText Domain: keel\n*/\n',
		'readme.txt': '=== Keel ===\n',
		'functions.php':
			"<?php\nnamespace Keel\\Theme;\ndefine( 'KEEL_VERSION', '0.1.0' );\n",
		'src/css/keel.css': '@import "base.css";\n',
		'package.json':
			'{ "name": "keel", "scripts": { "build": "postcss src/css/keel.css" } }\n',
		LICENSE: 'GPL. keel is mentioned here and must stay.\n',
		'CHANGELOG.md': '# Changelog\n\nKeel 0.1.0\n',
		'docs/design.md': '# Keel design\n',
	};
	for ( const [ name, body ] of Object.entries( files ) ) {
		mkdirSync( join( dir, name, '..' ), { recursive: true } );
		writeFileSync( join( dir, name ), body );
	}
	const git = ( ...args ) =>
		spawnSync(
			'git',
			[
				'-c',
				'user.email=t@t',
				'-c',
				'user.name=t',
				'-c',
				'commit.gpgsign=false',
				...args,
			],
			{ cwd: dir }
		);
	git( 'init', '-q' );
	git( 'add', '-A' );
	git( 'commit', '-q', '-m', 'init' );
	return dir;
}

const run = ( dir, ...args ) =>
	spawnSync( 'bash', [ SCRIPT, ...args ], { cwd: dir } );
const porcelain = ( dir ) =>
	String(
		spawnSync( 'git', [ 'status', '--porcelain' ], { cwd: dir } ).stdout
	).trim();

test( 'invalid slugs are refused with exit 2', () => {
	const dir = makeRepo();
	for ( const slug of [ 'Keel', 'my theme', '1keel', 'keel_x' ] ) {
		assert.equal( run( dir, slug, 'X' ).status, 2, slug );
	}
	assert.equal( porcelain( dir ), '' );
} );

test( 'dry run lists files and changes nothing', () => {
	const dir = makeRepo();
	const result = run( dir, 'seawall', 'Seawall', '--dry-run' );
	assert.equal( result.status, 0 );
	const out = String( result.stdout );
	assert.match( out, /would change: style\.css/ );
	assert.match(
		out,
		/would rename: src\/css\/keel\.css -> src\/css\/seawall\.css/
	);
	assert.doesNotMatch( out, /LICENSE|CHANGELOG|docs\// );
	assert.equal( porcelain( dir ), '' );
} );

test( 'real run rewrites the theme header, constants, namespace and css path', () => {
	const dir = makeRepo();
	assert.equal( run( dir, 'sea-wall', 'Sea Wall' ).status, 0 );
	const style = read( join( dir, 'style.css' ) );
	assert.match( style, /Theme Name: Sea Wall/ );
	assert.match( style, /Text Domain: sea-wall/ );
	assert.ok( existsSync( join( dir, 'src/css/sea-wall.css' ) ) );
	assert.ok( ! existsSync( join( dir, 'src/css/keel.css' ) ) );
	const php = read( join( dir, 'functions.php' ) );
	assert.match( php, /namespace SeaWall\\Theme;/ );
	assert.match( php, /SEA_WALL_VERSION/ );
	assert.match(
		read( join( dir, 'package.json' ) ),
		/"name": "sea-wall".*src\/css\/sea-wall\.css/s
	);
	assert.match( read( join( dir, 'readme.txt' ) ), /=== Sea Wall ===/ );
	assert.match( read( join( dir, 'CHANGELOG.md' ) ), /Keel 0\.1\.0/ );
	assert.match( read( join( dir, 'docs/design.md' ) ), /Keel design/ );
	assert.match( read( join( dir, 'LICENSE' ) ), /keel is mentioned/ );
} );

test( 'display names with sed-special characters are inserted verbatim', () => {
	const dir = makeRepo();
	assert.equal( run( dir, 'seawall', 'Sea & Wall/Co' ).status, 0 );
	assert.match(
		read( join( dir, 'style.css' ) ),
		/Theme Name: Sea & Wall\/Co/
	);
	assert.match( read( join( dir, 'readme.txt' ) ), /=== Sea & Wall\/Co ===/ );
} );
