import { test } from 'node:test';
import assert from 'node:assert/strict';
import { checkPalette, loadPalette } from '../../bin/check-contrast.js';
import { pairs, read, SLUGS } from './helpers.js';

test( 'each variation declares exactly the theme palette slugs and passes contrast', () => {
	for ( const file of [
		'harbor',
		'clinic',
		'slate',
		'coral',
		'palm',
		'night',
		'contrast',
	] ) {
		const variation = JSON.parse( read( `styles/${ file }.json` ) );
		assert.equal( variation.version, 3, `${ file } version` );
		assert.ok( variation.title, `${ file } title` );
		assert.deepEqual(
			variation.settings.color.palette.map( ( c ) => c.slug ),
			SLUGS,
			`${ file } slugs`
		);
		assert.deepEqual(
			checkPalette( loadPalette( `styles/${ file }.json` ), pairs ),
			[],
			`${ file } contrast`
		);
		assert.deepEqual(
			variation.settings.typography.fontFamilies.map( ( f ) => f.slug ),
			[ 'body', 'display', 'serif' ],
			`${ file } font families`
		);
		assert.equal(
			variation.styles?.elements?.heading?.typography?.fontWeight,
			[ 'coral', 'palm' ].includes( file ) ? '500' : undefined,
			`${ file } heading weight`
		);
	}
} );
