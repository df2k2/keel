import { test } from 'node:test';
import assert from 'node:assert/strict';
import { scanBuiltCss } from './helpers.js';

test( 'built CSS contains no external url()', () => {
	assert.deepEqual( scanBuiltCss( 'build/css' ), [] );
} );

test( 'scanner catches http, https and protocol-relative urls', () => {
	assert.equal( scanBuiltCss( 'tests/fixtures/css' ).length, 3 );
} );
