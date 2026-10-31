#!/usr/bin/env node
/**
 * Captures the showcase home page in every variation, the dental home in Coral and Clinic, and
 * six Coral pages from the seeded wp-env site: docs/review/m1-6-<name>.png at 1200 by 900 for
 * review, 600 by 450 JPEG tiles into the demo plugin's assets for the variations strip (they
 * count against the image budget), and screenshot.png (the showcase home in Coral).
 *
 * Usage: node bin/screenshot.js   (wp-env running and seeded)
 */
import { chromium } from '@playwright/test';
import { execSync } from 'node:child_process';
import { copyFileSync, mkdirSync } from 'node:fs';

const BASE = process.env.WP_BASE_URL ?? 'http://localhost:8888';
// Coral last: it is the demo default and must be the variation left applied.
const VARIATIONS = [
	'harbor',
	'clinic',
	'slate',
	'palm',
	'night',
	'contrast',
	'coral',
];
const CORAL_PAGES = [
	[ '/elements/', 'elements' ],
	[ '/journal/', 'journal' ],
	[ '/places/harbor-district/', 'place' ],
	[ '/listings/harbor-view-inn/', 'listing' ],
	[ '/events/', 'events' ],
];
const REVIEW = 'docs/review';
const ASSETS = 'examples/keel-demo/assets';

mkdirSync( REVIEW, { recursive: true } );
mkdirSync( `${ ASSETS }/variations`, { recursive: true } );

const browser = await chromium.launch();
const page = await browser.newPage( {
	viewport: { width: 1200, height: 900 },
} );
// Half-scale context: the same 1200 by 900 layout saved as a 600 by 450 tile.
const tile = await browser.newPage( {
	viewport: { width: 1200, height: 900 },
	deviceScaleFactor: 0.5,
} );
const apply = ( slug ) =>
	execSync( `bash bin/apply-variation.sh ${ slug }`, { stdio: 'pipe' } );
const capture = async ( url, review, asset ) => {
	await page.goto( url, { waitUntil: 'networkidle' } );
	await page.screenshot( { path: review } );
	if ( asset ) {
		await tile.goto( url, { waitUntil: 'networkidle' } );
		await tile.screenshot( { path: asset, type: 'jpeg', quality: 70 } );
	}
	process.stdout.write( `${ review }${ asset ? ` ${ asset }` : '' }\n` );
};
for ( const slug of VARIATIONS ) {
	apply( slug );
	await capture(
		`${ BASE }/`,
		`${ REVIEW }/m1-6-${ slug }.png`,
		`${ ASSETS }/variations/${ slug }.jpg`
	);
	if ( slug === 'clinic' ) {
		await capture(
			`${ BASE }/dental/`,
			`${ REVIEW }/m1-6-dental-clinic.png`
		);
	}
}
// Coral again: its own tile did not exist yet when the loop reached it.
await capture(
	`${ BASE }/`,
	`${ REVIEW }/m1-6-coral.png`,
	`${ ASSETS }/variations/coral.jpg`
);
await capture(
	`${ BASE }/dental/`,
	`${ REVIEW }/m1-6-dental.png`,
	`${ ASSETS }/dental.jpg`
);
for ( const [ path, name ] of CORAL_PAGES ) {
	await capture( `${ BASE }${ path }`, `${ REVIEW }/m1-6-${ name }.png` );
}
copyFileSync( `${ REVIEW }/m1-6-coral.png`, 'screenshot.png' );
process.stdout.write( 'screenshot.png (showcase home, Coral)\n' );
await browser.close();
