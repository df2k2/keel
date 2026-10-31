import { test, expect } from '@playwright/test';
import { execSync } from 'node:child_process';

const FONT_PATH = '/wp-content/themes/keel/assets/fonts/';
const apply = ( slug ) =>
	execSync( `bash bin/apply-variation.sh ${ slug }`, { stdio: 'pipe' } );
const fileNames = ( hrefs ) =>
	hrefs.map( ( href ) => new URL( href ).pathname.split( '/' ).pop() );

test( 'web fonts load from the theme', async ( { page } ) => {
	const fontRequests = [];
	page.on( 'request', ( request ) => {
		if ( request.resourceType() === 'font' ) {
			fontRequests.push( new URL( request.url() ).pathname );
		}
	} );
	await page.goto( '/' );
	const loaded = await page.evaluate( async () => {
		await document.fonts.ready;
		return [ ...document.fonts ]
			.filter( ( face ) => face.status === 'loaded' )
			.map( ( face ) => face.family.replace( /"/g, '' ) );
	} );
	expect( loaded ).toContain( 'Figtree' );
	expect( fontRequests.length ).toBeGreaterThan( 0 );
	for ( const path of fontRequests ) {
		expect( path.startsWith( FONT_PATH ) ).toBe( true );
	}
	const preloads = page.locator( 'link[rel="preload"][as="font"]' );
	expect( await preloads.count() ).toBeGreaterThan( 0 );
	const hrefs = await preloads.evaluateAll( ( links ) =>
		links.map( ( link ) => link.href )
	);
	for ( const href of hrefs ) {
		expect( ( await page.request.get( href ) ).status() ).toBe( 200 );
	}
} );

test( 'preloads follow the active variation', async ( { page } ) => {
	apply( 'coral' );
	try {
		await page.goto( '/' );
		const hrefs = await page
			.locator( 'link[rel="preload"][as="font"]' )
			.evaluateAll( ( links ) => links.map( ( link ) => link.href ) );
		expect( fileNames( hrefs ) ).toEqual( [
			'figtree.woff2',
			'fraunces.woff2',
		] );
	} finally {
		apply( 'coral' );
	}
} );

test( 'blocked font files leave layout stable', async ( { page } ) => {
	const errors = [];
	page.on( 'console', ( message ) => {
		if (
			message.type() === 'error' &&
			! /woff2|Failed to load resource/.test( message.text() )
		) {
			errors.push( message.text() );
		}
	} );
	page.on( 'pageerror', ( error ) => errors.push( error.message ) );
	await page.route( '**/*.woff2', ( route ) => route.abort() );
	await page.addInitScript( () => {
		window.__cls = 0;
		new PerformanceObserver( ( list ) => {
			for ( const entry of list.getEntries() ) {
				if ( ! entry.hadRecentInput ) {
					window.__cls += entry.value;
				}
			}
		} ).observe( { type: 'layout-shift', buffered: true } );
	} );
	await page.goto( '/' );
	await page.waitForLoadState( 'networkidle' );
	const statuses = await page.evaluate( async () => {
		await document.fonts.ready;
		return [ ...document.fonts ].map( ( face ) => [
			face.family.replace( /"/g, '' ),
			face.status,
		] );
	} );
	expect( statuses ).toContainEqual( [ 'Figtree', 'error' ] );
	expect( statuses ).not.toContainEqual( [ 'Figtree', 'loaded' ] );
	await expect( page.locator( 'main' ) ).toBeVisible();
	expect( errors ).toEqual( [] );
	expect( await page.evaluate( () => window.__cls ) ).toBeLessThanOrEqual(
		0.05
	);
} );
