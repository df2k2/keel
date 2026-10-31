import { test } from 'node:test';
import assert from 'node:assert/strict';
import { existsSync, readdirSync, statSync } from 'node:fs';
import { join } from 'node:path';
import { read, scanBuiltCss } from './helpers.js';

const ICONS = [
	'phone',
	'message',
	'calendar',
	'map-pin',
	'shield',
	'star',
	'clock',
	'check',
	'play',
	'close',
	'chevron-left',
	'chevron-right',
	'search',
	'arrow-right',
	'mail',
];
const IMAGES = [
	'placeholder-wide',
	'placeholder-portrait',
	'placeholder-square',
	'placeholder-map',
	'placeholder-avatar',
];

function svgFiles( dir ) {
	const found = [];
	for ( const entry of readdirSync( dir ) ) {
		const path = join( dir, entry );
		if ( statSync( path ).isDirectory() ) {
			found.push( ...svgFiles( path ) );
		} else if ( path.endsWith( '.svg' ) ) {
			found.push( path );
		}
	}
	return found;
}

test( 'built CSS contains no external url()', () => {
	assert.deepEqual( scanBuiltCss( 'build/css' ), [] );
} );

test( 'scanner catches http, https and protocol-relative urls', () => {
	assert.equal( scanBuiltCss( 'tests/fixtures/css' ).length, 5 );
} );

test( 'shipped SVGs are inert', () => {
	const expected = [
		...ICONS.map( ( name ) => `assets/icons/${ name }.svg` ),
		...IMAGES.map( ( name ) => `assets/images/${ name }.svg` ),
	];
	for ( const file of expected ) {
		assert.ok( existsSync( file ), `${ file } missing` );
	}
	for ( const file of svgFiles( 'assets' ) ) {
		const svg = read( file );
		assert.ok( statSync( file ).size <= 10 * 1024, `${ file } too large` );
		for ( const bad of [
			'<script',
			'href="http',
			'xlink:href="http',
			'<foreignObject',
		] ) {
			assert.ok( ! svg.includes( bad ), `${ file } contains ${ bad }` );
		}
		assert.doesNotMatch( svg, /\son[a-z]+=/i, `${ file } inline handler` );
	}
} );
