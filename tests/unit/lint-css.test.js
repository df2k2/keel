import { test } from 'node:test';
import assert from 'node:assert/strict';
import { spawnSync } from 'node:child_process';
import { read, scanPhysicalCss } from './helpers.js';

test( 'stylelint rejects physical properties', () => {
	const result = spawnSync( 'npx', [
		'stylelint',
		'tests/fixtures/css/physical.css',
	] );
	assert.notEqual( result.status, 0 );
	assert.match(
		String( result.stdout ) + String( result.stderr ),
		/csstools\/use-logical/
	);
} );

test( 'built CSS keeps logical properties, so right-to-left sites mirror', () => {
	assert.deepEqual( scanPhysicalCss( 'build/css' ), [] );
	assert.match( read( 'build/css/keel.css' ), /inset-inline-start:/ );
	assert.match(
		read( 'build/css/blocks/list.css' ),
		/padding-inline-start:/
	);
} );

test( 'scanner catches physical declarations and skips inline SVG and logical ones', () => {
	assert.deepEqual(
		scanPhysicalCss( 'tests/fixtures/css-physical' ).map( ( hit ) =>
			hit.replace( /^.*: /, '' )
		),
		[
			'padding-left:',
			'margin-right:',
			'left:',
			'border-left-width:',
			'text-align:left',
			'float:right',
			'border-top-left-radius:',
			'border-bottom-right-radius:',
			'scroll-margin-left:',
			'scroll-padding-right:',
		]
	);
} );
