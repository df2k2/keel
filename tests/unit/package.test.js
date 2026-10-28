import { test } from 'node:test';
import assert from 'node:assert/strict';
import { spawnSync } from 'node:child_process';
import { mkdtempSync, existsSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join } from 'node:path';
import { EXCLUDED, releaseFiles, packageTheme } from '../../bin/package.js';

const zipEntryNames = ( zipPath ) =>
	String( spawnSync( 'unzip', [ '-Z1', zipPath ] ).stdout )
		.trim()
		.split( '\n' );

test( 'release file list excludes every dev path and includes build output', () => {
	const files = releaseFiles( '.' );
	for ( const bad of [
		'src/',
		'bin/',
		'tests/',
		'.github/',
		'node_modules/',
		'vendor/',
		'package.json',
		'package-lock.json',
		'.wp-env.json',
		'composer.json',
		'README.md',
		'eslint.config.js',
		'.githooks/',
	] ) {
		assert.ok(
			! files.some( ( f ) => f.startsWith( bad ) || f === bad ),
			`${ bad } must not ship`
		);
	}
	for ( const good of [
		'style.css',
		'readme.txt',
		'theme.json',
		'functions.php',
		'templates/index.html',
		'build/css/keel.css',
		'styles/coral.json',
		'patterns/hero-text.php',
		'LICENSE',
	] ) {
		assert.ok( files.includes( good ), `${ good } must ship` );
	}
	assert.deepEqual( files, [ ...files ].sort() );
	assert.ok( EXCLUDED.includes( 'tests' ) );
} );

test( 'zip contains keel/ prefix and the manifest', async () => {
	const outDir = mkdtempSync( join( tmpdir(), 'keel-dist-' ) );
	const result = await packageTheme( { root: '.', outDir } );
	assert.ok(
		existsSync( result.zipPath ) && existsSync( result.manifestPath )
	);
	const names = zipEntryNames( result.zipPath );
	assert.ok( names.includes( 'keel/keel-manifest.json' ) );
	assert.ok( names.includes( 'keel/style.css' ) );
	assert.ok(
		! names.some(
			( n ) =>
				n.startsWith( 'keel/src/' ) || n.startsWith( 'keel/tests/' )
		)
	);
	assert.ok( names.every( ( n ) => n.startsWith( 'keel/' ) ) );
} );
