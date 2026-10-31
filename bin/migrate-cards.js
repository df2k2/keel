#!/usr/bin/env node
/**
 * Rewrites every constrained-layout card (a core/group with the `is-style-card` class and
 * `"layout":{"type":"constrained"}`) to the Stack layout with the card gap, so the card fills its
 * column and its footer can sit on the bottom edge. Only the block comment changes: the sources
 * carry no layout classes, core adds them at render. Attribute text that is not JSON (PHP-built
 * samples) is left alone, as is every card that already uses another layout.
 *
 * Usage: node bin/migrate-cards.js [path ...]
 * Default paths: the theme's patterns, templates and parts, the style guide helper, and the demo
 * plugin's patterns and fixtures. Keep running it on new sources that still use constrained cards.
 */
import { readdirSync, readFileSync, statSync, writeFileSync } from 'node:fs';
import { join } from 'node:path';
import { fileURLToPath } from 'node:url';

/** Sources the theme ships or seeds from. */
export const DEFAULT_PATHS = [
	'patterns',
	'templates',
	'parts',
	'inc/styleguide.php',
	'examples/keel-demo/patterns',
	'examples/keel-demo/fixtures',
];

const STACK = {
	type: 'flex',
	orientation: 'vertical',
	justifyContent: 'stretch',
};
const GAP = 'var:preset|spacing|30';
const GROUP_COMMENT = /<!-- wp:group (\{.*?\}) -->/g;

/**
 * Whether parsed group attributes describe a constrained-layout card.
 *
 * @param {Object} attrs Block attributes.
 * @return {boolean} True for a card to migrate.
 */
function isConstrainedCard( attrs ) {
	return (
		typeof attrs.className === 'string' &&
		attrs.className.split( /\s+/ ).includes( 'is-style-card' ) &&
		attrs.layout?.type === 'constrained'
	);
}

/**
 * Migrates every constrained card in one source text.
 *
 * @param {string} source Pattern, template, part or fixture text.
 * @return {{output: string, changed: number}} The rewritten text and the number of cards changed.
 */
export function migrateCards( source ) {
	let changed = 0;
	const output = source.replace( GROUP_COMMENT, ( match, json ) => {
		let attrs;
		try {
			attrs = JSON.parse( json );
		} catch {
			return match;
		}
		if (
			! attrs ||
			typeof attrs !== 'object' ||
			! isConstrainedCard( attrs )
		) {
			return match;
		}
		const { layout, style, ...rest } = attrs;
		const spacing = { ...( style?.spacing ?? {} ) };
		if ( ! spacing.blockGap ) {
			spacing.blockGap = GAP;
		}
		changed++;
		return `<!-- wp:group ${ JSON.stringify( {
			...rest,
			style: { ...( style ?? {} ), spacing },
			layout: STACK,
		} ) } -->`;
	} );
	return { output, changed };
}

/**
 * Lists the PHP and HTML files under a path (or the path itself when it is a file).
 *
 * @param {string} path File or directory.
 * @return {string[]} File paths.
 */
function sourceFiles( path ) {
	if ( statSync( path ).isFile() ) {
		return [ path ];
	}
	const found = [];
	for ( const entry of readdirSync( path ) ) {
		const child = join( path, entry );
		if ( statSync( child ).isDirectory() ) {
			found.push( ...sourceFiles( child ) );
		} else if ( /\.(php|html)$/.test( child ) ) {
			found.push( child );
		}
	}
	return found;
}

/**
 * Migrates the files under the given paths in place.
 *
 * @param {string[]} paths Files or directories.
 * @return {Array<[string, number]>} Changed files with their card counts.
 */
export function migrateFiles( paths ) {
	const results = [];
	for ( const path of paths ) {
		for ( const file of sourceFiles( path ) ) {
			const { output, changed } = migrateCards(
				readFileSync( file, 'utf8' )
			);
			if ( changed > 0 ) {
				writeFileSync( file, output );
				results.push( [ file, changed ] );
			}
		}
	}
	return results;
}

if (
	process.argv[ 1 ] &&
	fileURLToPath( import.meta.url ) === process.argv[ 1 ]
) {
	const paths =
		process.argv.length > 2 ? process.argv.slice( 2 ) : DEFAULT_PATHS;
	const results = migrateFiles( paths );
	for ( const [ file, count ] of results ) {
		process.stdout.write( `${ file }: ${ count }\n` );
	}
	process.stdout.write(
		`total: ${ results.reduce( ( sum, [ , count ] ) => sum + count, 0 ) }\n`
	);
}
