import { test } from 'node:test';
import assert from 'node:assert/strict';
import { spawnSync } from 'node:child_process';

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
