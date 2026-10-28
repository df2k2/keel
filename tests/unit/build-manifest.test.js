import { test } from 'node:test';
import assert from 'node:assert/strict';
import { createHash } from 'node:crypto';
import { buildManifest } from '../../bin/build-manifest.js';
import { read } from './helpers.js';

test( 'manifest is deterministic and hashes correctly', () => {
	const manifest = buildManifest( 'tests/fixtures/pkg', [
		'b.txt',
		'a.txt',
	] );
	assert.deepEqual( Object.keys( manifest.files ), [ 'a.txt', 'b.txt' ] );
	const expected = createHash( 'sha256' )
		.update( read( 'tests/fixtures/pkg/a.txt' ) )
		.digest( 'hex' );
	assert.equal( manifest.files[ 'a.txt' ], expected );
	assert.equal( manifest.name, 'keel' );
	assert.match( manifest.version, /^\d+\.\d+\.\d+/ );
	assert.ok( Date.parse( manifest.generated ) > 0 );
} );
