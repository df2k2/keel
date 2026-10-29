import { test } from 'node:test';
import assert from 'node:assert/strict';
import { spawnSync } from 'node:child_process';
import { mkdtempSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join } from 'node:path';
import { read } from './helpers.js';

test( 'the prepare script succeeds outside a git checkout', () => {
	const script = JSON.parse( read( 'package.json' ) ).scripts.prepare;
	const dir = mkdtempSync( join( tmpdir(), 'keel-nogit-' ) );
	const result = spawnSync( 'sh', [ '-c', script ], {
		cwd: dir,
		env: { ...process.env, GIT_CEILING_DIRECTORIES: tmpdir() },
	} );
	assert.equal( result.status, 0, String( result.stderr ) );
} );
