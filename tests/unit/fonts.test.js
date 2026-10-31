import { test } from 'node:test';
import assert from 'node:assert/strict';
import { createHash } from 'node:crypto';
import { existsSync, readFileSync, readdirSync } from 'node:fs';
import { join } from 'node:path';
import { latinText } from '../../bin/build-fonts.js';
import { read } from './helpers.js';

const FONT_FILES = [
	'figtree.woff2',
	'figtree-italic.woff2',
	'bricolage-grotesque.woff2',
	'fraunces.woff2',
	'fraunces-italic.woff2',
];
const LICENSES = [
	'OFL-figtree.txt',
	'OFL-bricolage-grotesque.txt',
	'OFL-fraunces.txt',
];

test( 'latinText covers Latin-1 and the Google latin ranges', () => {
	const text = latinText();
	for ( const ch of [ 'é', 'ñ', '€', '—', '−', 'A', '0' ] ) {
		assert.ok( text.includes( ch ), `missing ${ ch }` );
	}
	assert.ok( ! text.includes( 'Ѐ' ), 'Cyrillic must not be included' );
} );

test( 'every committed font file is a small variable WOFF2 and matches the manifest', () => {
	const manifest = JSON.parse( read( 'assets/fonts/manifest.json' ) );
	let total = 0;
	for ( const file of FONT_FILES ) {
		const path = join( 'assets/fonts', file );
		assert.ok( existsSync( path ), `${ file } missing` );
		const bytes = readFileSync( path );
		assert.equal(
			bytes.subarray( 0, 4 ).toString( 'latin1' ),
			'wOF2',
			`${ file } is not WOFF2`
		);
		assert.ok(
			bytes.length <= 100 * 1024,
			`${ file } is ${ bytes.length } bytes`
		);
		total += bytes.length;
		const digest = createHash( 'sha256' ).update( bytes ).digest( 'hex' );
		assert.equal(
			manifest[ file ],
			digest,
			`${ file } digest differs from manifest.json`
		);
	}
	assert.ok( total <= 300 * 1024, `fonts total ${ total } bytes` );
	for ( const license of LICENSES ) {
		assert.ok(
			existsSync( join( 'assets/fonts', license ) ),
			`${ license } missing`
		);
	}
} );

test( 'fonts.css declares metric fallbacks for all three families', () => {
	const css = read( 'src/css/fonts.css' );
	for ( const family of [
		'Figtree Fallback',
		'Bricolage Grotesque Fallback',
		'Fraunces Fallback',
	] ) {
		const start = css.indexOf( `font-family: "${ family }"` );
		assert.ok( start >= 0, `${ family } missing` );
		const block = css.slice( start, css.indexOf( '}', start ) );
		assert.match( block, /size-adjust:/ );
		assert.match( block, /src: local\(/ );
	}
} );

test( 'theme.json and every variation declare body, display and serif with existing font files', () => {
	const files = [
		'theme.json',
		...readdirSync( 'styles' )
			.filter( ( f ) => f.endsWith( '.json' ) )
			.map( ( f ) => join( 'styles', f ) ),
	];
	for ( const file of files ) {
		const families =
			JSON.parse( read( file ) ).settings?.typography?.fontFamilies ?? [];
		assert.deepEqual(
			families.map( ( f ) => f.slug ),
			[ 'body', 'display', 'serif' ],
			`${ file } slugs`
		);
		for ( const family of families ) {
			for ( const face of family.fontFace ?? [] ) {
				const src = face.src[ 0 ];
				assert.ok(
					src.startsWith( 'file:./assets/fonts/' ),
					`${ file } ${ family.slug } src ${ src }`
				);
				assert.ok(
					existsSync( src.replace( 'file:./', '' ) ),
					`${ file } ${ src } missing`
				);
				assert.equal(
					face.fontDisplay,
					'swap',
					`${ file } ${ family.slug } fontDisplay`
				);
			}
		}
	}
} );
