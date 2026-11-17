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
const EXTERNAL_IMPORT = /@import\s+['"](?:https?:|\/\/)[^'"]*['"]/gi;

/**
 * Finds every url() or @import in the CSS files under a directory that points off-site.
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
			const css = read( path );
			for ( const pattern of [ EXTERNAL_URL, EXTERNAL_IMPORT ] ) {
				for ( const match of css.matchAll( pattern ) ) {
					found.push( `${ path }: ${ match[ 0 ] }` );
				}
			}
		}
	}
	return found;
}

const URL_PAYLOAD = /url\((?:"[^"]*"|'[^']*'|[^)]*)\)/g;
// Sides (padding-left, scroll-margin-right, border-left-width, left), corners (border-top-left-radius) and
// the left and right keywords of text-align, float and clear: every physical twin a logical property has.
const PHYSICAL =
	/(?<![-\w])(?:(?:(?:scroll-)?(?:padding|margin)|border)-(?:left|right)(?:-[a-z]+)*|border-(?:top|bottom)-(?:left|right)-radius|left|right)\s*:|(?:text-align|float|clear)\s*:\s*(?:left|right)\b/g;

/**
 * Finds every left or right declaration in the CSS files under a directory. The sources are written
 * with logical properties; a physical one in the build means a build step rewrote them, which pins
 * the layout to left-to-right.
 *
 * @param {string} dir Directory to scan recursively.
 * @return {string[]} The offending declarations, prefixed with their file path.
 */
export function scanPhysicalCss( dir ) {
	const found = [];
	if ( ! existsSync( dir ) ) {
		throw new Error( `ENOENT ${ dir }` );
	}
	for ( const entry of readdirSync( dir ) ) {
		const path = join( dir, entry );
		if ( statSync( path ).isDirectory() ) {
			found.push( ...scanPhysicalCss( path ) );
		} else if ( path.endsWith( '.css' ) ) {
			// Inline SVG payloads carry attributes that are not CSS declarations.
			const css = read( path ).replace( URL_PAYLOAD, 'url()' );
			for ( const match of css.matchAll( PHYSICAL ) ) {
				found.push( `${ path }: ${ match[ 0 ] }` );
			}
		}
	}
	return found;
}
