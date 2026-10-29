#!/usr/bin/env node
/**
 * Builds keel-manifest.json: a SHA-256 of every shipped file.
 *
 * Usage: node bin/build-manifest.js [dir]  (writes <dir>/keel-manifest.json)
 */
import { createHash } from 'node:crypto';
import { readFileSync, writeFileSync } from 'node:fs';
import { join } from 'node:path';
import { fileURLToPath } from 'node:url';

/**
 * Hashes a list of files relative to a root.
 *
 * @param {string}   rootDir Directory the paths are relative to.
 * @param {string[]} files   Relative file paths.
 * @return {{name:string, version:string, generated:string, files:Object<string,string>}} Manifest.
 */
export function buildManifest( rootDir, files ) {
	const version = JSON.parse(
		readFileSync( new URL( '../package.json', import.meta.url ), 'utf8' )
	).version;
	const entries = [ ...files ].sort().map( ( file ) => [
		file,
		createHash( 'sha256' )
			.update( readFileSync( join( rootDir, file ) ) )
			.digest( 'hex' ),
	] );
	return {
		name: 'keel',
		version,
		generated: new Date().toISOString(),
		files: Object.fromEntries( entries ),
	};
}

if (
	process.argv[ 1 ] &&
	fileURLToPath( import.meta.url ) === process.argv[ 1 ]
) {
	const { releaseFiles } = await import( './package.js' );
	const dir = process.argv[ 2 ] ?? '.';
	const manifest = buildManifest( dir, releaseFiles( dir ) );
	writeFileSync(
		join( dir, 'keel-manifest.json' ),
		`${ JSON.stringify( manifest, null, 2 ) }\n`
	);
	process.stdout.write(
		`${ Object.keys( manifest.files ).length } files hashed\n`
	);
}
