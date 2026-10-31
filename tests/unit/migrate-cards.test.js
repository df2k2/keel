import { test } from 'node:test';
import assert from 'node:assert/strict';
import { migrateCards } from '../../bin/migrate-cards.js';

const STACK = {
	type: 'flex',
	orientation: 'vertical',
	justifyContent: 'stretch',
};
const GAP = 'var:preset|spacing|30';
const card = ( attrs ) =>
	`<!-- wp:group ${ attrs } -->\n<div class="wp-block-group is-style-card">\n<!-- wp:paragraph --><p>x</p><!-- /wp:paragraph -->\n</div>\n<!-- /wp:group -->`;
const attrsOf = ( output ) =>
	JSON.parse( /<!-- wp:group (\{.*?\}) -->/.exec( output )[ 1 ] );

test( 'a constrained card becomes a Stack with the card gap and an untouched wrapper', () => {
	const { output, changed } = migrateCards(
		card( '{"className":"is-style-card","layout":{"type":"constrained"}}' )
	);
	assert.equal( changed, 1 );
	assert.deepEqual( attrsOf( output ), {
		className: 'is-style-card',
		style: { spacing: { blockGap: GAP } },
		layout: STACK,
	} );
	assert.ok(
		output.includes( '<div class="wp-block-group is-style-card">' )
	);
} );

test( 'other attributes such as align survive', () => {
	const { output } = migrateCards(
		card(
			'{"align":"wide","className":"is-style-card","layout":{"type":"constrained"}}'
		)
	);
	assert.equal( attrsOf( output ).align, 'wide' );
	assert.deepEqual( attrsOf( output ).layout, STACK );
} );

test( 'an existing style is merged, and an existing blockGap is kept', () => {
	const padded = migrateCards(
		card(
			'{"className":"is-style-card","style":{"spacing":{"padding":{"top":"0"}}},"layout":{"type":"constrained"}}'
		)
	);
	assert.deepEqual( attrsOf( padded.output ).style, {
		spacing: { padding: { top: '0' }, blockGap: GAP },
	} );
	const gapped = migrateCards(
		card(
			'{"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}}'
		)
	);
	assert.equal(
		attrsOf( gapped.output ).style.spacing.blockGap,
		'var:preset|spacing|20'
	);
} );

test( 'flex-row cards, non-card groups and PHP-built attributes are left alone', () => {
	for ( const source of [
		card(
			'{"className":"is-style-card","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}}'
		),
		card( '{"layout":{"type":"constrained"}}' ),
		card(
			'{"className":"\' . $class . \'","layout":{"type":"constrained"}}'
		),
	] ) {
		const { output, changed } = migrateCards( source );
		assert.equal( changed, 0 );
		assert.equal( output, source );
	}
} );

test( 'every card in a source is counted', () => {
	const two = `${ card(
		'{"className":"is-style-card","layout":{"type":"constrained"}}'
	) }\n${ card(
		'{"className":"keel-reveal is-style-card","layout":{"type":"constrained"}}'
	) }`;
	assert.equal( migrateCards( two ).changed, 2 );
} );
