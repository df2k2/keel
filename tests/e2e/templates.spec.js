import { test, expect } from '@playwright/test';
/* global getComputedStyle */

const PAGES = [
	[ '/', 200, true ],
	[ '/home/', 200, true ],
	[ '/service/', 200, true ],
	[ '/location/', 200, true ],
	[ '/landing/', 200, false ],
	[ '/contact/', 200, true ],
	[ '/transparent-plain/', 200, true ],
	[ '/accessibility-statement/', 200, true ],
	[ '/blog/', 200, true ],
	[ '/spring-maintenance-checklist/', 200, true ],
	[ '/?s=keel', 200, true ],
	[ '/category/news/', 200, true ],
	[ '/this-page-does-not-exist/', 404, true ],
	[ '/patterns/', 200, true ],
	[ '/style-guide/', 200, true ],
	[ '/why-keel/', 200, true ],
	[ '/block-styles/', 200, true ],
	[ '/dental/', 200, true ],
	[ '/dental/pricing/', 200, true ],
	[ '/dental/implants-offer/', 200, false ],
];

for ( const [ path, status, hasHeader ] of PAGES ) {
	test( `${ path } renders one h1 with landmarks and no external requests`, async ( {
		page,
	} ) => {
		const external = [];
		const errors = [];
		page.on( 'request', ( request ) => {
			const url = new URL( request.url() );
			if (
				/^https?:$/.test( url.protocol ) &&
				url.hostname !== 'localhost'
			) {
				external.push( request.url() );
			}
		} );
		page.on( 'pageerror', ( error ) => errors.push( error.message ) );
		const response = await page.goto( path );
		expect( response.status() ).toBe( status );
		await expect( page.locator( 'h1' ) ).toHaveCount( 1 );
		await expect( page.locator( 'main' ) ).toHaveCount( 1 );
		await expect( page.locator( 'footer' ) ).toHaveCount( 1 );
		await expect( page.locator( 'header' ) ).toHaveCount(
			hasHeader ? 1 : 0
		);
		expect( external ).toEqual( [] );
		expect( errors ).toEqual( [] );
	} );
}

test( 'the landing template loads no JavaScript at all', async ( { page } ) => {
	await page.goto( '/landing/' );
	expect(
		await page.locator( 'script:not([type="speculationrules"])' ).count()
	).toBe( 0 );
} );

test( 'header becomes solid after scrolling and transparent only over a cover', async ( {
	page,
} ) => {
	await page.goto( '/home/' );
	const header = page.locator( 'header.keel-header' );
	await expect( header ).not.toHaveClass( /is-scrolled/ );
	expect(
		await header.evaluate(
			( el ) => getComputedStyle( el ).backgroundColor
		)
	).toBe( 'rgba(0, 0, 0, 0)' );
	await page.evaluate( () => window.scrollTo( 0, 400 ) );
	await expect( header ).toHaveClass( /is-scrolled/ );
	await page.goto( '/transparent-plain/' );
	// The solid header is the base colour of whichever variation is applied.
	const base = await page.evaluate( () => {
		const probe = document.createElement( 'div' );
		probe.style.backgroundColor = getComputedStyle(
			document.documentElement
		).getPropertyValue( '--wp--preset--color--base' );
		document.body.append( probe );
		const color = getComputedStyle( probe ).backgroundColor;
		probe.remove();
		return color;
	} );
	expect(
		await page
			.locator( 'header.keel-header' )
			.evaluate( ( el ) => getComputedStyle( el ).backgroundColor )
	).toBe( base );
} );

test( 'announcement bar dismisses for the session', async ( { page } ) => {
	await page.goto( '/' );
	const bar = page.locator(
		'.wp-block-template-part:has(.keel-announcement)'
	);
	await expect( bar ).toBeVisible();
	await page.getByRole( 'button', { name: 'Dismiss announcement' } ).click();
	await expect( bar ).toBeHidden();
	await page.reload();
	await expect( bar ).toBeHidden();
} );

test( 'carousel controls advance the track', async ( { page } ) => {
	await page.goto( '/home/' );
	const track = page.locator( '.keel-carousel__track' );
	await track.scrollIntoViewIfNeeded();
	const next = page.getByRole( 'button', { name: 'Next testimonial' } );
	await expect( next ).toBeVisible();
	const before = await track.evaluate( ( el ) => el.scrollLeft );
	await next.click();
	await expect
		.poll( () => track.evaluate( ( el ) => el.scrollLeft ) )
		.toBeGreaterThan( before );
} );

test( 'the page behind the open mobile menu is inert', async ( { page } ) => {
	await page.setViewportSize( { width: 390, height: 844 } );
	await page.goto( '/service/' );
	await page.getByRole( 'button', { name: 'Open menu' } ).click();
	await expect( page.locator( 'main' ) ).toHaveAttribute( 'inert', '' );
	await page.keyboard.press( 'Escape' );
	await expect( page.locator( 'main' ) ).not.toHaveAttribute( 'inert', '' );
} );
