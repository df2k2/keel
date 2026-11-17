import { test, expect } from '@playwright/test';

const PAGES = [
	'/',
	'/home/',
	'/service/',
	'/landing/',
	'/location/',
	'/contact/',
	'/blog/',
	'/spring-maintenance-checklist/',
	'/a-day-on-the-water/',
	'/dental/',
	'/dental/pricing/',
	'/elements/',
	'/journal/',
	'/listings/',
	'/listings/harbor-view-inn/',
	'/places/harbor-district/',
	'/events/',
	'/deals/',
	'/?s=keel',
	'/this-page-does-not-exist/',
];
const WIDTHS = [ 360, 768, 1280 ];

/**
 * Appends a query switch to a path that may already carry a query string.
 *
 * @param {string} path  Path, with or without a query string.
 * @param {string} query Switch to append, such as keel_rtl=1.
 * @return {string} The path with the switch.
 */
const withSwitch = ( path, query ) =>
	`${ path }${ path.includes( '?' ) ? '&' : '?' }${ query }`;

/**
 * Left and right edges of the first element matching a selector, with the viewport width.
 *
 * @param {import('@playwright/test').Page} page     Page.
 * @param {string}                          selector Selector.
 * @return {Promise<{left:number, right:number, width:number}>} Edges.
 */
const edges = ( page, selector ) =>
	page
		.locator( selector )
		.first()
		.evaluate( ( el ) => {
			const rect = el.getBoundingClientRect();
			return {
				left: rect.left,
				right: rect.right,
				width: document.documentElement.clientWidth,
			};
		} );

for ( const [ path, patternHeading ] of [
	[ '/home/', true ],
	[ '/', false ],
	[ '/service/', false ],
	[ '/landing/', true ],
] ) {
	test( `spanish copy does not overflow at 360px on ${ path }`, async ( {
		page,
	} ) => {
		await page.setViewportSize( { width: 360, height: 780 } );
		await page.goto( path );
		const english = await page.locator( 'h1' ).innerText();
		await page.goto( `${ path }?keel_locale=es_ES` );
		expect( await page.locator( 'html' ).getAttribute( 'lang' ) ).toBe(
			'es-ES'
		);
		if ( patternHeading ) {
			expect( await page.locator( 'h1' ).innerText() ).not.toBe(
				english
			);
		}
		await expect( page.getByText( 'Saltar al contenido' ) ).toHaveCount(
			1
		);
		expect(
			await page.evaluate( () => document.documentElement.scrollWidth )
		).toBeLessThanOrEqual( 360 );
		const clipped = await page
			.locator( '.wp-block-button__link' )
			.evaluateAll( ( links ) =>
				links
					.filter(
						( link ) => link.scrollWidth > link.clientWidth + 1
					)
					.map( ( link ) => link.textContent.trim() )
			);
		expect( clipped ).toEqual( [] );
	} );
}

for ( const path of PAGES ) {
	test( `rtl page has no horizontal overflow on ${ path }`, async ( {
		page,
	} ) => {
		for ( const width of WIDTHS ) {
			await page.setViewportSize( { width, height: 780 } );
			await page.goto( withSwitch( path, 'keel_rtl=1' ) );
			expect( await page.locator( 'html' ).getAttribute( 'dir' ) ).toBe(
				'rtl'
			);
			expect(
				await page.evaluate(
					() => document.documentElement.scrollWidth
				),
				`${ path } at ${ width }px`
			).toBeLessThanOrEqual( width );
		}
	} );
}

test( 'the rtl switch renders what an rtl site gets: core rtl stylesheets load', async ( {
	page,
} ) => {
	await page.goto( '/home/?keel_rtl=1' );
	await expect(
		page.locator( 'link[rel="stylesheet"][href*="-rtl."]' ).first()
	).toBeAttached();
} );

// Each selector names a box that sits on the start edge. Mirrored means its right-to-left position is
// the reflection of its left-to-right one; a physical left or right anywhere in its chain breaks that.
for ( const [ path, selector, width ] of [
	[ '/', 'header .wp-block-site-title', 1280 ],
	[ '/service/', '.wp-block-list.is-style-checkmarks li', 360 ],
	[ '/journal/', '.keel-corner', 1280 ],
	[ '/listings/harbor-view-inn/', '.keel-card__media .keel-tag', 1280 ],
	[ '/a-day-on-the-water/', '.keel-post-cover .wp-block-post-title', 1280 ],
	[ '/elements/', '.keel-justify-start > .is-style-card', 1280 ],
	[ '/elements/', '.is-style-callout-info > p', 360 ],
	[ '/elements/', '.wp-block-list.keel-timeline li', 360 ],
] ) {
	test( `rtl mirrors ${ selector } on ${ path }`, async ( { page } ) => {
		await page.emulateMedia( { reducedMotion: 'reduce' } );
		await page.setViewportSize( { width, height: 900 } );
		await page.goto( path );
		const ltr = await edges( page, selector );
		await page.goto( withSwitch( path, 'keel_rtl=1' ) );
		const rtl = await edges( page, selector );
		expect( Math.abs( rtl.left - ( ltr.width - ltr.right ) ) ).toBeLessThan(
			2
		);
		expect( Math.abs( rtl.right - ( ltr.width - ltr.left ) ) ).toBeLessThan(
			2
		);
	} );
}

test( 'rtl mirrors the carousel controls and the menu still opens', async ( {
	page,
} ) => {
	await page.setViewportSize( { width: 360, height: 780 } );
	await page.goto( '/home/?keel_rtl=1' );
	const prev = await page
		.getByRole( 'button', { name: 'Previous testimonial' } )
		.boundingBox();
	const next = await page
		.getByRole( 'button', { name: 'Next testimonial' } )
		.boundingBox();
	expect( prev.x ).toBeGreaterThan( next.x );
	await page.getByRole( 'button', { name: 'Open menu' } ).click();
	await expect(
		page.locator(
			'.wp-block-navigation__responsive-container.is-menu-open'
		)
	).toBeVisible();
} );
