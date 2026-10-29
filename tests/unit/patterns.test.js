import { test } from 'node:test';
import assert from 'node:assert/strict';
import { spawnSync } from 'node:child_process';
import { existsSync, readdirSync } from 'node:fs';
import { join } from 'node:path';
import { CATEGORIES } from '../../bin/scaffold-pattern.js';
import { read } from './helpers.js';

const FORBIDDEN = [ 'wp:html', 'http://', 'https://', '<svg', '<script' ];

test( 'every pattern file is core-only, translatable and offline', () => {
	const files = readdirSync( 'patterns' ).filter( ( file ) =>
		file.endsWith( '.php' )
	);
	assert.ok( files.length > 0, 'no patterns' );
	for ( const file of files ) {
		const slug = file.replace( /\.php$/, '' );
		const source = read( join( 'patterns', file ) );
		assert.match( source, /^ \* Title: .+$/m, `${ file } has no title` );
		assert.ok(
			source.includes( ` * Slug: keel/${ slug }\n` ),
			`${ file } slug must be keel/${ slug }`
		);
		const categories = /^ \* Categories: (.+)$/m.exec( source );
		assert.ok( categories, `${ file } has no categories` );
		for ( const category of categories[ 1 ].split( ',' ) ) {
			const name = category.trim();
			assert.ok(
				name.startsWith( 'keel/' ) &&
					CATEGORIES.includes( name.slice( 5 ) ),
				`${ file } uses unknown category ${ name }`
			);
		}
		for ( const match of source.matchAll( /<!-- wp:([a-z0-9-]+)\//g ) ) {
			assert.equal(
				match[ 1 ],
				'core',
				`${ file } uses a non-core block: ${ match[ 0 ] }`
			);
		}
		for ( const bad of FORBIDDEN ) {
			assert.ok(
				! source.includes( bad ),
				`${ file } contains ${ bad }`
			);
		}
		assert.doesNotMatch(
			source,
			/\son[a-z]+=/i,
			`${ file } inline handler`
		);
		for ( const match of source.matchAll(
			/get_theme_file_uri\(\s*'([^']+)'\s*\)/g
		) ) {
			assert.ok(
				match[ 1 ].startsWith( 'assets/' ) && existsSync( match[ 1 ] ),
				`${ file } references a missing file ${ match[ 1 ] }`
			);
		}
		const lint = spawnSync( 'php', [ '-l', join( 'patterns', file ) ] );
		assert.equal( lint.status, 0, `${ file }: ${ String( lint.stdout ) }` );
	}
} );
