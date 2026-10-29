import { test } from 'node:test';
import assert from 'node:assert/strict';
import { spawnSync } from 'node:child_process';
import {
	contrastRatio,
	checkPalette,
	loadPalette,
} from '../../bin/check-contrast.js';
import { pairs, read } from './helpers.js';

test( 'contrastRatio matches WCAG for black on white', () => {
	assert.ok( Math.abs( contrastRatio( '#000000', '#FFFFFF' ) - 21 ) < 0.01 );
} );

test( 'Harbor palette passes every pair', () => {
	assert.deepEqual( checkPalette( loadPalette( 'theme.json' ), pairs ), [] );
} );

test( 'a failing pair is reported with its ratio', () => {
	const palette = loadPalette( 'tests/fixtures/palette-fails.json' );
	const failures = checkPalette( palette, pairs );
	assert.equal( failures.length, 2 );
	assert.equal( failures[ 0 ].fg, 'border' );
	assert.equal( failures[ 0 ].reason, 'ratio' );
	assert.ok( failures[ 0 ].ratio < 3 );
} );

test( 'a missing slug fails with reason missing', () => {
	const palette = loadPalette( 'tests/fixtures/palette-missing-slug.json' );
	const failures = checkPalette( palette, pairs );
	assert.ok(
		failures.some(
			( f ) =>
				f.reason === 'missing' &&
				( f.fg === 'accent' || f.bg === 'accent' )
		)
	);
} );

test( 'CLI exits 1 on the failing fixture and 0 on the theme', () => {
	const bad = spawnSync( 'node', [
		'bin/check-contrast.js',
		'--theme',
		'tests/fixtures/palette-fails.json',
		'--styles',
		'tests/fixtures/empty',
	] );
	assert.equal( bad.status, 1 );
	assert.match( String( bad.stdout ), /FAIL .*border on base/ );
	const good = spawnSync( 'node', [
		'bin/check-contrast.js',
		'--theme',
		'theme.json',
		'--styles',
		'tests/fixtures/empty',
	] );
	assert.equal( good.status, 0 );
	assert.ok( read( 'tests/contrast-pairs.json' ).length > 0 );
} );

test( 'three-digit hex expands and a non-hex color fails with reason invalid', () => {
	assert.ok( Math.abs( contrastRatio( '#FFF', '#000' ) - 21 ) < 0.01 );
	const palette = { ...loadPalette( 'theme.json' ), accent: 'rgb(1, 2, 3)' };
	const failures = checkPalette( palette, pairs );
	assert.ok(
		failures.some(
			( f ) =>
				f.reason === 'invalid' &&
				( f.fg === 'accent' || f.bg === 'accent' )
		),
		'rgb() must be reported as invalid, not silently passed'
	);
} );
