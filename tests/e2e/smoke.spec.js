import { test, expect } from '@playwright/test';
import { execSync } from 'node:child_process';
/* global getComputedStyle */

const apply = ( slug ) =>
	execSync( `bash bin/apply-variation.sh ${ slug }`, { stdio: 'pipe' } );

test( 'home renders with landmarks and a skip link first in tab order', async ( {
	page,
} ) => {
	const response = await page.goto( '/' );
	expect( response.status() ).toBe( 200 );
	await expect( page.locator( 'main' ) ).toHaveCount( 1 );
	await expect( page.locator( 'header' ) ).toHaveCount( 1 );
	await expect( page.locator( 'footer' ) ).toHaveCount( 1 );
	await page.keyboard.press( 'Tab' );
	await expect( page.locator( ':focus' ) ).toHaveClass( /skip-link/ );
} );

test( 'only the header and announcement modules load on the front page', async ( {
	page,
} ) => {
	await page.goto( '/' );
	const sources = await page
		.locator( 'script[src*="/themes/keel/"]' )
		.evaluateAll( ( nodes ) =>
			nodes.map(
				( node ) => node.src.split( '/' ).pop().split( '?' )[ 0 ]
			)
		);
	expect( sources.sort() ).toEqual( [
		'announcement.js',
		'carousel.js',
		'header.js',
	] );
} );

test( 'no external requests', async ( { page } ) => {
	const external = [];
	page.on( 'request', ( request ) => {
		const url = new URL( request.url() );
		if (
			/^https?:$/.test( url.protocol ) &&
			url.hostname !== 'localhost'
		) {
			external.push( request.url() );
		}
	} );
	await page.goto( '/' );
	await page.waitForLoadState( 'networkidle' );
	expect( external ).toEqual( [] );
} );

test( 'applying the Coral variation changes the primary color token', async ( {
	page,
} ) => {
	apply( 'coral' );
	try {
		await page.goto( '/' );
		const value = await page.evaluate( () =>
			getComputedStyle( document.documentElement )
				.getPropertyValue( '--wp--preset--color--primary' )
				.trim()
		);
		expect( value.toUpperCase() ).toBe( '#B9452F' );
	} finally {
		apply( 'harbor' );
	}
} );

test( 'applying Night switches to a dark colour scheme', async ( { page } ) => {
	apply( 'night' );
	try {
		await page.goto( '/' );
		expect(
			await page.evaluate(
				() => getComputedStyle( document.documentElement ).colorScheme
			)
		).toBe( 'dark' );
		expect(
			await page.evaluate(
				() => getComputedStyle( document.body ).backgroundColor
			)
		).toBe( 'rgb(15, 23, 36)' );
	} finally {
		apply( 'clinic' );
	}
} );
