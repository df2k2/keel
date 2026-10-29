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

await build( {
	entryPoints,
	bundle: true,
	format: 'esm',
	minify: true,
	target: 'es2022',
	external: [ '@wordpress/interactivity' ],
	outdir: 'build/js',
	legalComments: 'none',
	logLevel: 'warning',
} );
