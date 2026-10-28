#!/usr/bin/env node
/**
 * Contrast gate: checks every foreground/background pair in tests/contrast-pairs.json
 * against theme.json and every style variation in styles/.
 *
 * Usage: node bin/check-contrast.js [--pairs tests/contrast-pairs.json] [--theme theme.json] [--styles styles]
 * Exit 0 when every file passes, 1 otherwise.
 */
import { existsSync, readdirSync, readFileSync } from 'node:fs';
import { join } from 'node:path';
import { fileURLToPath } from 'node:url';

/**
 * Relative luminance of a hex color per WCAG 2.x.
 *
 * @param {string} hex Color as #RRGGBB.
 * @return {number} Luminance between 0 and 1.
 */
function luminance( hex ) {
	const clean = hex.replace( '#', '' );
	const channel = ( i ) => {
		const c = parseInt( clean.slice( i, i + 2 ), 16 ) / 255;
		return c <= 0.03928 ? c / 12.92 : ( ( c + 0.055 ) / 1.055 ) ** 2.4;
	};
	return 0.2126 * channel( 0 ) + 0.7152 * channel( 2 ) + 0.0722 * channel( 4 );
}

/**
 * WCAG contrast ratio between two hex colors.
 *
 * @param {string} hexA First color.
 * @param {string} hexB Second color.
 * @return {number} Ratio between 1 and 21.
 */
export function contrastRatio( hexA, hexB ) {
	const a = luminance( hexA );
	const b = luminance( hexB );
	const [ hi, lo ] = a > b ? [ a, b ] : [ b, a ];
	return ( hi + 0.05 ) / ( lo + 0.05 );
}

/**
 * Reads settings.color.palette from a theme.json-shaped file into a slug to color map.
 *
 * @param {string} path Path to theme.json or a style variation.
 * @return {Object<string,string>} Palette by slug.
 */
export function loadPalette( path ) {
	const json = JSON.parse( readFileSync( path, 'utf8' ) );
	const palette = json?.settings?.color?.palette ?? [];
	return Object.fromEntries( palette.map( ( c ) => [ c.slug, c.color ] ) );
}

/**
 * Checks a palette against a list of pairs.
 *
 * @param {Object<string,string>} palette Palette by slug.
 * @param {Array<{fg:string,bg:string,min:number}>} pairs Pairs to check.
 * @return {Array<{fg:string,bg:string,ratio:number|null,min:number,reason:'ratio'|'missing'}>} Failures.
 */
export function checkPalette( palette, pairs ) {
	const failures = [];
	for ( const { fg, bg, min } of pairs ) {
		if ( ! palette[ fg ] || ! palette[ bg ] ) {
			failures.push( { fg, bg, ratio: null, min, reason: 'missing' } );
			continue;
		}
		const ratio = contrastRatio( palette[ fg ], palette[ bg ] );
		if ( ratio < min ) {
			failures.push( { fg, bg, ratio, min, reason: 'ratio' } );
		}
	}
	return failures;
}

function parseArgs( argv ) {
	const options = { pairs: 'tests/contrast-pairs.json', theme: 'theme.json', styles: 'styles' };
	for ( let i = 0; i < argv.length; i += 2 ) {
		const key = argv[ i ].replace( /^--/, '' );
		if ( key in options ) {
			options[ key ] = argv[ i + 1 ];
		}
	}
	return options;
}

function main() {
	const options = parseArgs( process.argv.slice( 2 ) );
	const pairs = JSON.parse( readFileSync( options.pairs, 'utf8' ) );
	const files = [ options.theme ];
	if ( existsSync( options.styles ) ) {
		for ( const entry of readdirSync( options.styles ).sort() ) {
			if ( entry.endsWith( '.json' ) ) {
				files.push( join( options.styles, entry ) );
			}
		}
	}
	let failed = false;
	for ( const file of files ) {
		const failures = checkPalette( loadPalette( file ), pairs );
		if ( failures.length === 0 ) {
			process.stdout.write( `OK ${ file }\n` );
			continue;
		}
		failed = true;
		for ( const f of failures ) {
			const ratio = f.reason === 'missing' ? 'missing' : f.ratio.toFixed( 2 );
			process.stdout.write( `FAIL ${ file } ${ f.fg } on ${ f.bg } ${ ratio } (min ${ f.min })\n` );
		}
	}
	process.exit( failed ? 1 : 0 );
}

if ( process.argv[ 1 ] && fileURLToPath( import.meta.url ) === process.argv[ 1 ] ) {
	main();
}
