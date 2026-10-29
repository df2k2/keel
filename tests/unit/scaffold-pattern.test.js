import { test } from 'node:test';
import assert from 'node:assert/strict';
import { mkdtempSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join } from 'node:path';
import { scaffoldPattern, CATEGORIES } from '../../bin/scaffold-pattern.js';
import { read } from './helpers.js';

const tmp = mkdtempSync( join( tmpdir(), 'keel-scaffold-' ) );

test( 'scaffold writes a pattern file with the wordpress.org header', () => {
	const path = scaffoldPattern( {
		category: 'hero',
		slug: 'hero-split',
		title: 'Hero: split',
		root: tmp,
	} );
	assert.equal( path, join( tmp, 'patterns', 'hero-split.php' ) );
	const source = read( path );
	for ( const line of [
		'Title: Hero: split',
		'Slug: keel/hero-split',
		'Categories: keel/hero',
		'Keywords:',
		'Viewport Width: 1200',
		'Inserter: yes',
	] ) {
		assert.ok( source.includes( line ), `missing "${ line }"` );
	}
	assert.ok( source.includes( "defined( 'ABSPATH' ) || exit;" ) );
	assert.ok( CATEGORIES.includes( 'hero' ) && CATEGORIES.length === 15 );
} );

test( 'invalid slug or unknown category is refused', () => {
	assert.throws(
		() =>
			scaffoldPattern( {
				category: 'hero',
				slug: 'Hero Split',
				title: 'x',
				root: tmp,
			} ),
		/slug/
	);
	assert.throws(
		() =>
			scaffoldPattern( {
				category: 'nope',
				slug: 'ok',
				title: 'x',
				root: tmp,
			} ),
		/category/
	);
} );

test( 'existing file is never overwritten', () => {
	scaffoldPattern( {
		category: 'cta',
		slug: 'cta-band',
		title: 'x',
		root: tmp,
	} );
	assert.throws(
		() =>
			scaffoldPattern( {
				category: 'cta',
				slug: 'cta-band',
				title: 'x',
				root: tmp,
			} ),
		/exists/
	);
} );

test( 'title with a backslash and a quote is escaped for the PHP string', () => {
	const path = scaffoldPattern( {
		category: 'hero',
		slug: 'hero-quote',
		title: "Bob's \\ Hero",
		root: tmp,
	} );
	assert.ok(
		read( path ).includes( "esc_html_e( 'Bob\\'s \\\\ Hero', 'keel' )" )
	);
} );
