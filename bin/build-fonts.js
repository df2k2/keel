#!/usr/bin/env node
/**
 * Builds the theme's web fonts from pinned upstream sources: downloads each
 * variable TTF from the google/fonts repository at a fixed commit, verifies its
 * digest, subsets it to Latin as a variable WOFF2 (pinning or narrowing axes),
 * writes the OFL licence texts, a digest manifest of the output, and the
 * metric-matched fallback font-face rules in src/css/fonts.css.
 *
 * Usage: node bin/build-fonts.js   (needs network access to raw.githubusercontent.com)
 * The only script in the repository that touches the network; CI never runs it.
 */
import { createHash } from 'node:crypto';
import { mkdirSync, writeFileSync } from 'node:fs';
import { join } from 'node:path';
import { fileURLToPath } from 'node:url';
import subsetFont from 'subset-font';
import { createFontStack } from '@capsizecss/core';
import figtree from '@capsizecss/metrics/figtree';
import bricolageGrotesque from '@capsizecss/metrics/bricolageGrotesque';
import fraunces from '@capsizecss/metrics/fraunces';
import arial from '@capsizecss/metrics/arial';
import georgia from '@capsizecss/metrics/georgia';

/** The google/fonts commit every source is read from. */
export const COMMIT = '9862abc066c9b83bf84c3e8ed1fc2d8d48f9bbf0';
const RAW = `https://raw.githubusercontent.com/google/fonts/${ COMMIT }/ofl`;

/**
 * Font sources. `sha256` is the digest of the upstream TTF; an empty string
 * means "not yet pinned": the build prints the digest so it can be filled in.
 */
export const SOURCES = [
	{
		family: 'Figtree',
		file: 'figtree.woff2',
		style: 'normal',
		url: `${ RAW }/figtree/Figtree[wght].ttf`,
		sha256: '26ad3db9b31ff7dde67a91ff515d022d2f495cd506590699cf264f0bfe6fb714',
		axes: null,
	},
	{
		family: 'Figtree',
		file: 'figtree-italic.woff2',
		style: 'italic',
		url: `${ RAW }/figtree/Figtree-Italic[wght].ttf`,
		sha256: '94dec1f18b9275d69e8b4a91b6514bdc18199048347e1c36e1285b11b0b87653',
		axes: null,
	},
	{
		family: 'Bricolage Grotesque',
		file: 'bricolage-grotesque.woff2',
		style: 'normal',
		url: `${ RAW }/bricolagegrotesque/BricolageGrotesque[opsz,wdth,wght].ttf`,
		sha256: '413e7357809ddd12fd80a96a8a396de0e401638d4acd3cb3e37532f0472ac682',
		axes: { wdth: 100, wght: { min: 400, max: 800 } },
	},
	{
		family: 'Fraunces',
		file: 'fraunces.woff2',
		style: 'normal',
		url: `${ RAW }/fraunces/Fraunces[SOFT,WONK,opsz,wght].ttf`,
		sha256: '177ff6c0f14e5550a3c624247cd1189611d4eb65d000b14944c63d967958abbb',
		axes: { SOFT: 50, WONK: 0, wght: { min: 300, max: 800 } },
	},
	{
		family: 'Fraunces',
		file: 'fraunces-italic.woff2',
		style: 'italic',
		url: `${ RAW }/fraunces/Fraunces-Italic[SOFT,WONK,opsz,wght].ttf`,
		sha256: 'b24448c43702fac4ee856781d461a0dfba8d8e594b6e8e190234b75fed2c0e01',
		axes: { SOFT: 50, WONK: 0, wght: { min: 300, max: 800 } },
	},
];

/** Licence texts, pinned the same way. */
export const LICENSES = [
	{
		file: 'OFL-figtree.txt',
		url: `${ RAW }/figtree/OFL.txt`,
		sha256: '140d37233e7f3ce7313798befa9600893bcceaf41a55fa0fa5ad52f7f657a268',
	},
	{
		file: 'OFL-bricolage-grotesque.txt',
		url: `${ RAW }/bricolagegrotesque/OFL.txt`,
		sha256: '4b5a7d8f37f5602621c8a8d7358a6a2e71317e6c231c661e15aef0275d3e07ba',
	},
	{
		file: 'OFL-fraunces.txt',
		url: `${ RAW }/fraunces/OFL.txt`,
		sha256: 'bdf4c22802eaf804f998195871c6b8938aac2ac14b2d78a8bd66a6f1eced833b',
	},
];

/** Metric stacks for the fallback faces: web font first, then the system fallback. */
const STACKS = [
	[ figtree, arial ],
	[ bricolageGrotesque, arial ],
	[ fraunces, georgia ],
];

/** Google Fonts' "latin" unicode-range, as inclusive code point pairs. */
const LATIN_RANGES = [
	[ 0x0000, 0x00ff ],
	[ 0x0131, 0x0131 ],
	[ 0x0152, 0x0153 ],
	[ 0x02bb, 0x02bc ],
	[ 0x02c6, 0x02c6 ],
	[ 0x02da, 0x02da ],
	[ 0x02dc, 0x02dc ],
	[ 0x0304, 0x0304 ],
	[ 0x0308, 0x0308 ],
	[ 0x0329, 0x0329 ],
	[ 0x2000, 0x206f ],
	[ 0x20ac, 0x20ac ],
	[ 0x2122, 0x2122 ],
	[ 0x2191, 0x2191 ],
	[ 0x2193, 0x2193 ],
	[ 0x2212, 0x2212 ],
	[ 0x2215, 0x2215 ],
	[ 0xfeff, 0xfeff ],
	[ 0xfffd, 0xfffd ],
];

/**
 * Every character the subset keeps.
 *
 * @return {string} One string holding each code point of the latin ranges once.
 */
export function latinText() {
	let text = '';
	for ( const [ from, to ] of LATIN_RANGES ) {
		for ( let code = from; code <= to; code++ ) {
			text += String.fromCodePoint( code );
		}
	}
	return text;
}

const sha256 = ( bytes ) =>
	createHash( 'sha256' ).update( bytes ).digest( 'hex' );

/**
 * Default downloader: fetches a URL into a Buffer, failing on any non-2xx status.
 *
 * @param {string} url Source URL.
 * @return {Promise<Buffer>} The response body.
 */
async function fetchBufferFromNetwork( url ) {
	const response = await fetch( url );
	if ( ! response.ok ) {
		throw new Error( `${ response.status } fetching ${ url }` );
	}
	return Buffer.from( await response.arrayBuffer() );
}

/**
 * Downloads one pinned source and checks its digest when one is recorded.
 *
 * @param {{url:string, sha256:string}}   source      Source entry.
 * @param {(url:string)=>Promise<Buffer>} fetchBuffer Downloader.
 * @param {string[]}                      unpinned    Collects "file digest" lines for sources without a digest.
 * @param {string}                        name        Output file name, for messages.
 * @return {Promise<Buffer>} The verified bytes.
 */
async function download( source, fetchBuffer, unpinned, name ) {
	const bytes = await fetchBuffer( source.url );
	const digest = sha256( bytes );
	if ( source.sha256 === '' ) {
		unpinned.push( `${ name } ${ digest }` );
	} else if ( source.sha256 !== digest ) {
		throw new Error(
			`Digest mismatch for ${ name }: expected ${ source.sha256 }, got ${ digest }`
		);
	}
	return bytes;
}

/**
 * Formats Capsize's output the way the theme's Stylelint config expects: tabs and double quotes.
 *
 * @param {string} css Capsize font-face rules.
 * @return {string} Formatted rules.
 */
function formatFontFaces( css ) {
	return css
		.replace( /^ {2}/gm, '\t' )
		.replace( /local\('([^']+)'\)/g, 'local("$1")' );
}

/**
 * Builds every font file, licence, the manifest and the fallback stylesheet.
 *
 * @param {{root?:string, fetchBuffer?:(url:string)=>Promise<Buffer>}} options Paths and downloader.
 * @return {Promise<{written:string[], unpinned:string[]}>} Written paths and any digests still to pin.
 */
export async function buildFonts( {
	root = '.',
	fetchBuffer = fetchBufferFromNetwork,
} = {} ) {
	const dir = join( root, 'assets', 'fonts' );
	mkdirSync( dir, { recursive: true } );
	const written = [];
	const unpinned = [];
	const manifest = {};

	for ( const source of SOURCES ) {
		const ttf = await download(
			source,
			fetchBuffer,
			unpinned,
			source.file
		);
		const options = { targetFormat: 'woff2' };
		if ( source.axes ) {
			options.variationAxes = source.axes;
		}
		const woff2 = await subsetFont( ttf, latinText(), options );
		const path = join( dir, source.file );
		writeFileSync( path, woff2 );
		manifest[ source.file ] = sha256( woff2 );
		written.push( path );
	}

	for ( const license of LICENSES ) {
		const text = await download(
			license,
			fetchBuffer,
			unpinned,
			license.file
		);
		const path = join( dir, license.file );
		writeFileSync( path, text );
		written.push( path );
	}

	const manifestPath = join( dir, 'manifest.json' );
	writeFileSync(
		manifestPath,
		`${ JSON.stringify(
			Object.fromEntries( Object.entries( manifest ).sort() ),
			null,
			2
		) }\n`
	);
	written.push( manifestPath );

	const faces = STACKS.map(
		( stack ) =>
			createFontStack( stack, {
				fontFaceProperties: { fontDisplay: 'swap' },
			} ).fontFaces
	);
	const cssPath = join( root, 'src', 'css', 'fonts.css' );
	writeFileSync(
		cssPath,
		`/* Generated by bin/build-fonts.js: metric-matched fallbacks so the swap to the web font causes no layout shift. Do not edit. */\n\n${ formatFontFaces(
			faces.join( '\n\n' )
		) }\n`
	);
	written.push( cssPath );

	return { written, unpinned };
}

if (
	process.argv[ 1 ] &&
	fileURLToPath( import.meta.url ) === process.argv[ 1 ]
) {
	const { statSync } = await import( 'node:fs' );
	const { written, unpinned } = await buildFonts();
	for ( const path of written ) {
		process.stdout.write(
			`${ path } ${ ( statSync( path ).size / 1024 ).toFixed( 1 ) } KB\n`
		);
	}
	if ( unpinned.length > 0 ) {
		process.stdout.write(
			`Unpinned sources; record these digests in bin/build-fonts.js:\n${ unpinned.join(
				'\n'
			) }\n`
		);
		process.exit( 1 );
	}
	process.stdout.write( 'Every source digest verified.\n' );
}
