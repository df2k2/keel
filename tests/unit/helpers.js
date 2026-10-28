/**
 * Shared helpers for the unit tests.
 */
import { existsSync, readdirSync, readFileSync, statSync } from 'node:fs';
import { join } from 'node:path';

/** Palette slugs every variation must declare, in order. */
export const SLUGS = [
	'base',
	'contrast',
	'primary',
	'primary-contrast',
	'accent',
	'accent-contrast',
	'surface',
	'surface-alt',
	'border',
	'success',
	'warning',
	'error',
];

/**
 * Reads a file as UTF-8 text.
 *
 * @param {string} path File path.
 * @return {string} File contents.
 */
export const read = ( path ) => readFileSync( path, 'utf8' );

/** The contrast pairs, or an empty list until tests/contrast-pairs.json exists. */
export const pairs = existsSync( 'tests/contrast-pairs.json' )
	? JSON.parse( read( 'tests/contrast-pairs.json' ) )
	: [];

const EXTERNAL_URL = /url\(\s*['"]?\s*(?:https?:|\/\/)[^)]*\)/gi;

/**
 * Finds every url() in the CSS files under a directory that points off-site.
 *
 * @param {string} dir Directory to scan recursively.
 * @return {string[]} The offending url() tokens, prefixed with their file path.
 */
export function scanBuiltCss( dir ) {
	const found = [];
	if ( ! existsSync( dir ) ) {
		throw new Error( `ENOENT ${ dir }` );
	}
	for ( const entry of readdirSync( dir ) ) {
		const path = join( dir, entry );
		if ( statSync( path ).isDirectory() ) {
			found.push( ...scanBuiltCss( path ) );
		} else if ( path.endsWith( '.css' ) ) {
			for ( const match of read( path ).matchAll( EXTERNAL_URL ) ) {
				found.push( `${ path }: ${ match[ 0 ] }` );
			}
		}
	}
	return found;
}
