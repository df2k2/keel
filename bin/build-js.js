#!/usr/bin/env node
/**
 * Builds the Interactivity API script modules in src/js into build/js as
 * minified ES modules that import the interactivity package from core import map.
 */
import { build } from 'esbuild';
import { readdirSync } from 'node:fs';

const entryPoints = readdirSync( 'src/js' )
	.filter( ( file ) => file.endsWith( '.js' ) )
	.map( ( file ) => `src/js/${ file }` );

const options = {
	bundle: true,
	format: 'esm',
	minify: true,
	target: 'es2022',
	external: [ '@wordpress/interactivity' ],
	legalComments: 'none',
	logLevel: 'warning',
};

await build( { ...options, entryPoints, outdir: 'build/js' } );

// The demo plugin's module, kept out of the theme's build and zip.
const demoEntries = readdirSync( 'examples/keel-demo/src' )
	.filter( ( file ) => file.endsWith( '.js' ) )
	.map( ( file ) => `examples/keel-demo/src/${ file }` );
if ( demoEntries.length > 0 ) {
	await build( {
		...options,
		entryPoints: demoEntries,
		outdir: 'examples/keel-demo/build',
	} );
}
