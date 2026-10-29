#!/usr/bin/env node
/**
 * Packages the theme into dist/keel-<version>.zip with keel-manifest.json inside and alongside.
 *
 * Usage: node bin/package.js
 */
import { ZipArchive } from 'archiver';
import {
	createWriteStream,
	existsSync,
	mkdirSync,
	readdirSync,
	statSync,
	writeFileSync,
} from 'node:fs';
import { join, relative, sep } from 'node:path';
import { fileURLToPath } from 'node:url';
import { buildManifest } from './build-manifest.js';

/** Directories and files that never ship. Dotfiles and dot-directories are excluded as well. */
export const EXCLUDED = [
	'src',
	'bin',
	'tests',
	'examples',
	'docs',
	'node_modules',
	'vendor',
	'dist',
	'test-results',
	'playwright-report',
	'package.json',
	'package-lock.json',
	'composer.json',
	'composer.lock',
	'phpcs.xml.dist',
	'phpstan.neon.dist',
	'postcss.config.js',
	'eslint.config.js',
	'playwright.config.js',
	'lighthouserc.cjs',
	'README.md',
	'CONTRIBUTING.md',
	'CODE_OF_CONDUCT.md',
	'SECURITY.md',
	'CHANGELOG.md',
	'keel-manifest.json',
];

/**
 * Lists every file that ships, sorted, relative to root with forward slashes.
 *
 * @param {string} rootDir Theme root.
 * @return {string[]} Relative paths.
 */
export function releaseFiles( rootDir ) {
	if ( ! existsSync( join( rootDir, 'build' ) ) ) {
		throw new Error( 'Run npm run build first' );
	}
	const files = [];
	const walk = ( dir ) => {
		for ( const entry of readdirSync( dir ) ) {
			const path = join( dir, entry );
			const rel = relative( rootDir, path ).split( sep ).join( '/' );
			if ( entry.startsWith( '.' ) || EXCLUDED.includes( rel ) ) {
				continue;
			}
			if ( statSync( path ).isDirectory() ) {
				walk( path );
			} else {
				files.push( rel );
			}
		}
	};
	walk( rootDir );
	return files.sort();
}

/**
 * Writes the release zip and manifest.
 *
 * @param {{root?:string, outDir?:string}} options Paths.
 * @return {Promise<{zipPath:string, manifestPath:string, files:string[]}>} What was written.
 */
export async function packageTheme( { root = '.', outDir = 'dist' } = {} ) {
	const files = releaseFiles( root );
	const manifest = buildManifest( root, files );
	const manifestJson = `${ JSON.stringify( manifest, null, 2 ) }\n`;
	mkdirSync( outDir, { recursive: true } );
	const zipPath = join( outDir, `keel-${ manifest.version }.zip` );
	const manifestPath = join( outDir, 'keel-manifest.json' );
	writeFileSync( manifestPath, manifestJson );
	await new Promise( ( resolve, reject ) => {
		const output = createWriteStream( zipPath );
		const archive = new ZipArchive( { zlib: { level: 9 } } );
		output.on( 'close', resolve );
		archive.on( 'error', reject );
		archive.pipe( output );
		for ( const file of files ) {
			archive.file( join( root, file ), { name: `keel/${ file }` } );
		}
		archive.append( manifestJson, { name: 'keel/keel-manifest.json' } );
		archive.finalize();
	} );
	return { zipPath, manifestPath, files };
}

if (
	process.argv[ 1 ] &&
	fileURLToPath( import.meta.url ) === process.argv[ 1 ]
) {
	const result = await packageTheme();
	process.stdout.write(
		`${ result.zipPath } (${ result.files.length } files + manifest)\n`
	);
}
