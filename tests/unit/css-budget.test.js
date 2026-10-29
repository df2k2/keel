import { test } from 'node:test';
import assert from 'node:assert/strict';
import { existsSync, readdirSync, readFileSync, statSync } from 'node:fs';
import { join } from 'node:path';
import { gzipSync } from 'node:zlib';

const BUDGET = 35 * 1024;
const BLOCK_BUDGET = 4 * 1024;

function cssFiles( dir ) {
	const found = [];
	for ( const entry of readdirSync( dir ) ) {
		const path = join( dir, entry );
		if ( statSync( path ).isDirectory() ) {
			found.push( ...cssFiles( path ) );
		} else if ( path.endsWith( '.css' ) ) {
			found.push( path );
		}
	}
	return found;
}

const compressed = ( path ) =>
	gzipSync( readFileSync( path ), { level: 9 } ).length;

test( 'theme CSS stays under 35 KB compressed', () => {
	const files = cssFiles( 'build/css' );
	assert.ok( files.length > 0, 'no built CSS' );
	const total = files.reduce( ( sum, file ) => sum + compressed( file ), 0 );
	assert.ok(
		total <= BUDGET,
		`theme CSS is ${ total } bytes compressed (budget ${ BUDGET })`
	);
} );

test( 'each block source has a built twin', () => {
	const sources = readdirSync( 'src/css/blocks' ).filter( ( file ) =>
		file.endsWith( '.css' )
	);
	assert.ok( sources.length >= 14, `${ sources.length } block sources` );
	for ( const file of sources ) {
		assert.ok(
			existsSync( join( 'build/css/blocks', file ) ),
			`build/css/blocks/${ file } missing`
		);
	}
} );

test( 'block CSS files stay small', () => {
	for ( const file of readdirSync( 'build/css/blocks' ) ) {
		const size = compressed( join( 'build/css/blocks', file ) );
		assert.ok(
			size <= BLOCK_BUDGET,
			`${ file } is ${ size } bytes compressed`
		);
	}
} );
