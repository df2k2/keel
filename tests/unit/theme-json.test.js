import { test } from 'node:test';
import assert from 'node:assert/strict';
import { read, SLUGS } from './helpers.js';

const theme = JSON.parse( read( 'theme.json' ) );

test( 'theme.json declares version 3 and the twelve palette slugs', () => {
	assert.equal( theme.version, 3 );
	assert.deepEqual(
		theme.settings.color.palette.map( ( c ) => c.slug ),
		SLUGS
	);
} );

test( 'seven fluid font sizes and eight spacing sizes', () => {
	assert.deepEqual(
		theme.settings.typography.fontSizes.map( ( s ) => s.slug ),
		[ 'xs', 'sm', 'md', 'lg', 'xl', 'xxl', 'xxxl' ]
	);
	assert.equal( theme.settings.typography.fluid, true );
	assert.deepEqual(
		theme.settings.spacing.spacingSizes.map( ( s ) => s.slug ),
		[ '10', '20', '30', '40', '50', '60', '70', '80' ]
	);
	assert.equal( theme.settings.spacing.spacingScale.steps, 0 );
} );

test( 'custom tokens exist', () => {
	for ( const key of [
		'radius',
		'shadow',
		'border',
		'focus',
		'typography',
	] ) {
		assert.ok( theme.settings.custom[ key ], `custom.${ key } missing` );
	}
} );
