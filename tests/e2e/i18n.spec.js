import { test, expect } from '@playwright/test';

const PAGES = [ '/', '/service/', '/landing/', '/location/', '/blog/' ];

for ( const [ path, patternHeading ] of [
	[ '/', true ],
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
		await expect(
			page.getByText( 'Solicitar presupuesto' ).first()
		).toBeVisible();
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
		await page.setViewportSize( { width: 360, height: 780 } );
		await page.goto( `${ path }?keel_rtl=1` );
		expect( await page.locator( 'html' ).getAttribute( 'dir' ) ).toBe(
			'rtl'
		);
		expect(
			await page.evaluate( () => document.documentElement.scrollWidth )
		).toBeLessThanOrEqual( 360 );
	} );
}

test( 'rtl mirrors the carousel controls and the menu still opens', async ( {
	page,
} ) => {
	await page.setViewportSize( { width: 360, height: 780 } );
	await page.goto( '/?keel_rtl=1' );
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
