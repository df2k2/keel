#!/usr/bin/env node
/**
 * Captures screenshot.png (Clinic, the demo default) and docs/review/m1-<variation>.png
 * for every variation from the seeded wp-env home page at 1200 by 900.
 *
 * Usage: node bin/screenshot.js   (wp-env running and seeded)
 */
import { chromium } from '@playwright/test';
import { execSync } from 'node:child_process';
import { copyFileSync } from 'node:fs';

const BASE = process.env.WP_BASE_URL ?? 'http://localhost:8888';
const VARIATIONS = [ 'harbor', 'coral', 'slate', 'palm', 'night', 'clinic' ];

const browser = await chromium.launch();
const page = await browser.newPage( {
	viewport: { width: 1200, height: 900 },
} );
for ( const slug of VARIATIONS ) {
	execSync( `bash bin/apply-variation.sh ${ slug }`, { stdio: 'pipe' } );
	await page.goto( `${ BASE }/`, { waitUntil: 'networkidle' } );
	await page.screenshot( { path: `docs/review/m1-${ slug }.png` } );
	process.stdout.write( `docs/review/m1-${ slug }.png\n` );
}
copyFileSync( 'docs/review/m1-clinic.png', 'screenshot.png' );
process.stdout.write( 'screenshot.png (Clinic)\n' );
await browser.close();
