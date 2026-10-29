import { test, expect } from '@playwright/test';
import AxeBuilder from '@axe-core/playwright';
/* global getComputedStyle */

const PAGES = [
	'/',
	'/service/',
	'/location/',
	'/blog/',
	'/spring-maintenance-checklist/',
	'/this-page-does-not-exist/',
];
const TAGS = [
	'wcag2a',
	'wcag2aa',
	'wcag21a',
	'wcag21aa',
	'wcag22aa',
	'best-practice',
];

const describe = ( results ) =>
	results.violations.map(
		( violation ) =>
			`${ violation.id }: ${ violation.nodes
				.map( ( node ) => node.target.join( ' ' ) )
				.join( ', ' ) }`
	);

for ( const path of PAGES ) {
	test( `axe finds no violations on ${ path }`, async ( { page } ) => {
		await page.goto( path );
		const results = await new AxeBuilder( { page } )
			.withTags( TAGS )
			.analyze();
		expect( describe( results ) ).toEqual( [] );
	} );
}

test( 'axe finds no violations with the mobile menu open', async ( {
	page,
} ) => {
	await page.setViewportSize( { width: 390, height: 844 } );
	await page.goto( '/' );
	await page.getByRole( 'button', { name: 'Open menu' } ).click();
	const results = await new AxeBuilder( { page } ).withTags( TAGS ).analyze();
	expect( describe( results ) ).toEqual( [] );
} );

test( 'keyboard journey: skip link, menu, accordion, carousel, lightbox', async ( {
	page,
} ) => {
	await page.setViewportSize( { width: 390, height: 844 } );
	await page.goto( '/' );
	await page.keyboard.press( 'Tab' );
	await expect( page.locator( ':focus' ) ).toHaveClass( /skip-link/ );
	await page.keyboard.press( 'Enter' );
	await page.keyboard.press( 'Tab' );
	expect(
		await page.evaluate(
			() => document.querySelector( ':focus' )?.closest( 'main' ) !== null
		)
	).toBe( true );

	const toggle = page.getByRole( 'button', { name: 'Open menu' } );
	await toggle.focus();
	await page.keyboard.press( 'Enter' );
	await expect(
		page.locator(
			'.wp-block-navigation__responsive-container.is-menu-open'
		)
	).toBeVisible();
	await page.keyboard.press( 'Escape' );
	await expect( toggle ).toBeFocused();

	const summary = page
		.locator( '.wp-block-details.is-style-faq summary' )
		.first();
	await summary.focus();
	await page.keyboard.press( 'Enter' );
	await expect(
		page.locator( '.wp-block-details.is-style-faq[open]' )
	).toHaveCount( 1 );
	await page.keyboard.press( 'Space' );
	await expect(
		page.locator( '.wp-block-details.is-style-faq[open]' )
	).toHaveCount( 0 );

	const track = page.locator( '.keel-carousel__track' );
	const next = page.getByRole( 'button', { name: 'Next testimonial' } );
	await next.focus();
	const before = await track.evaluate( ( el ) => el.scrollLeft );
	await page.keyboard.press( 'Enter' );
	await expect
		.poll( () => track.evaluate( ( el ) => el.scrollLeft ) )
		.toBeGreaterThan( before );

	await page.goto( '/location/' );
	const trigger = page
		.locator( '.wp-block-gallery .lightbox-trigger' )
		.first();
	await trigger.focus();
	await page.keyboard.press( 'Enter' );
	await expect( page.locator( '.wp-lightbox-overlay.active' ) ).toBeVisible();
	// Core moves focus into the dialog after it opens; Escape is handled there, so wait for that.
	await expect(
		page.locator( '.wp-lightbox-overlay.active :focus' )
	).toHaveCount( 1 );
	await page.keyboard.press( 'Escape' );
	await expect( page.locator( '.wp-lightbox-overlay.active' ) ).toHaveCount(
		0
	);
	await expect( trigger ).toBeFocused();
} );

test( 'targets are at least 24 by 24 and focus is visible', async ( {
	page,
} ) => {
	await page.setViewportSize( { width: 390, height: 844 } );
	await page.goto( '/' );
	const small = await page
		.locator( 'a, button, summary, input' )
		.evaluateAll( ( elements ) =>
			elements
				.filter( ( el ) => {
					const rect = el.getBoundingClientRect();
					const inline = getComputedStyle( el ).display === 'inline';
					const hidden =
						el.classList.contains( 'screen-reader-text' );
					return (
						! inline &&
						! hidden &&
						rect.width > 0 &&
						rect.height > 0 &&
						( rect.width < 24 || rect.height < 24 )
					);
				} )
				.map( ( el ) => el.outerHTML.slice( 0, 80 ) )
		);
	expect( small ).toEqual( [] );
	await page.keyboard.press( 'Tab' );
	await page.keyboard.press( 'Tab' );
	const ring = await page.evaluate( () => {
		const style = getComputedStyle( document.querySelector( ':focus' ) );
		return [ style.outlineStyle, parseFloat( style.outlineWidth ) ];
	} );
	expect( ring[ 0 ] ).not.toBe( 'none' );
	expect( ring[ 1 ] ).toBeGreaterThanOrEqual( 2 );
} );
