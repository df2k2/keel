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
	'/dental/',
	'/elements/',
	'/journal/',
	'/listings/',
	'/places/harbor-district/',
	'/events/',
	'/a-day-on-the-water/',
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
	await page.goto( '/home/' );
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
	await page.locator( '.wp-lightbox-overlay.active' ).press( 'Escape' );
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

/**
 * Outline style and width of an element, read in the page.
 *
 * @param {import('@playwright/test').Locator} locator Element that should wear the focus ring.
 * @return {Promise<{style:string, width:number}>} Its outline.
 */
const outline = ( locator ) =>
	locator.evaluate( ( el ) => {
		const style = getComputedStyle( el );
		return {
			style: style.outlineStyle,
			width: parseFloat( style.outlineWidth ),
		};
	} );

test( 'dismissing the announcement keeps focus on the page', async ( {
	page,
} ) => {
	await page.goto( '/' );
	const bar = page.getByRole( 'complementary', { name: 'Announcement' } );
	await bar.getByRole( 'button', { name: 'Dismiss announcement' } ).focus();
	await page.keyboard.press( 'Enter' );
	await expect( bar ).toBeHidden();
	expect(
		await page.evaluate( () => {
			// Nothing matches :focus once focus has fallen back to the document.
			const active = document.querySelector( ':focus' );
			return active !== null && active.getClientRects().length > 0;
		} )
	).toBe( true );
} );

test( 'a search field with the button inside shows a ring on its wrapper', async ( {
	page,
} ) => {
	await page.goto( '/elements/' );
	const field = page
		.locator( '.wp-block-search__button-inside .wp-block-search__input' )
		.first();
	await field.focus();
	const ring = await outline(
		field.locator(
			'xpath=ancestor::*[contains(@class,"wp-block-search__inside-wrapper")]'
		)
	);
	expect( ring.style ).not.toBe( 'none' );
	expect( ring.width ).toBeGreaterThanOrEqual( 2 );
} );

test( 'a card photo link shows its ring on the photo, which clips the link', async ( {
	page,
} ) => {
	await page.goto( '/journal/' );
	// A key press first, so the browser treats the focus that follows as keyboard focus.
	await page.keyboard.press( 'Tab' );
	const link = page
		.locator( '.keel-card__media .wp-block-post-featured-image a' )
		.first();
	await link.focus();
	expect(
		await link.evaluate( ( el ) => el.matches( ':focus-visible' ) )
	).toBe( true );
	const ring = await outline(
		link.locator( 'xpath=ancestor::*[contains(@class,"keel-card__media")]' )
	);
	expect( ring.style ).not.toBe( 'none' );
	expect( ring.width ).toBeGreaterThanOrEqual( 2 );
} );

test( 'a card without a featured image still shows its tag', async ( {
	page,
} ) => {
	await page.goto( '/journal/' );
	const tag = page
		.locator( '.keel-card__media:not(:has(img)) > .keel-corner a' )
		.first();
	test.skip( ( await tag.count() ) === 0, 'every seeded post has an image' );
	await tag.scrollIntoViewIfNeeded();
	// Not clipped away: the link is what is painted at its own center.
	expect(
		await tag.evaluate( ( el ) => {
			const rect = el.getBoundingClientRect();
			const top = document.elementFromPoint(
				rect.left + rect.width / 2,
				rect.top + rect.height / 2
			);
			return rect.height > 0 && ( top === el || el.contains( top ) );
		} )
	).toBe( true );
} );

// The photo-less rule must leave a Cover alone. A Cover with a fixed or repeated background saves a div in
// place of its img, and one with a video saves a video, so "no img" is not "no photo".
for ( const [ name, tag, className ] of [
	[ 'fixed', 'div', 'wp-block-cover__image-background has-parallax' ],
	[ 'video', 'video', 'wp-block-cover__video-background' ],
] ) {
	test( `a card's Cover with a ${ name } background keeps its bleed`, async ( {
		page,
	} ) => {
		await page.goto( '/listings/harbor-view-inn/' );
		const media = page
			.locator(
				'.wp-block-group.is-style-card > .wp-block-cover.keel-card__media'
			)
			.first();
		const box = () =>
			media.evaluate( ( el ) => {
				const style = getComputedStyle( el );
				return {
					margin: style.marginInlineStart,
					overflow: style.overflow,
					width: el.getBoundingClientRect().width,
				};
			} );
		const before = await box();
		expect( parseFloat( before.margin ) ).toBeLessThan( 0 );
		await media.evaluate(
			( el, [ tagName, classes ] ) => {
				const background = el.ownerDocument.createElement( tagName );
				background.className = classes;
				el.querySelector( 'img' ).replaceWith( background );
			},
			[ tag, className ]
		);
		expect( await media.locator( 'img' ).count() ).toBe( 0 );
		expect( await box() ).toEqual( before );
	} );
}

test( 'the floating buttons never cover a focused footer link', async ( {
	page,
} ) => {
	await page.setViewportSize( { width: 1280, height: 844 } );
	await page.goto( '/service/' );
	const floating = page.locator( '.keel-floating-cta' );
	await expect( floating ).toBeVisible();
	const links = page.locator( 'footer a' );
	const count = await links.count();
	expect( count ).toBeGreaterThan( 0 );
	for ( let index = 0; index < count; index++ ) {
		const link = links.nth( index );
		await link.focus();
		const overlap = await link.evaluate( ( el ) => {
			const a = el.getBoundingClientRect();
			const b = document
				.querySelector( '.keel-floating-cta' )
				.getBoundingClientRect();
			const x = Math.min( a.right, b.right ) - Math.max( a.left, b.left );
			const y = Math.min( a.bottom, b.bottom ) - Math.max( a.top, b.top );
			return x > 0 && y > 0;
		} );
		expect( overlap, await link.innerText() ).toBe( false );
	}
} );
