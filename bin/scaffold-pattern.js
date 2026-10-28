#!/usr/bin/env node
/**
 * Scaffolds a block pattern file with the wordpress.org file header.
 *
 * Usage: node bin/scaffold-pattern.js <category> <slug> "<Title>"
 */
import { existsSync, mkdirSync, writeFileSync } from 'node:fs';
import { join } from 'node:path';
import { fileURLToPath } from 'node:url';

/** Pattern categories the theme registers (without the keel/ prefix). */
export const CATEGORIES = [
	'hero',
	'trust',
	'services',
	'process',
	'team',
	'testimonials',
	'pricing',
	'faq',
	'location',
	'gallery',
	'cta',
	'contact',
	'footer',
	'blog',
	'pages',
];

const SLUG = /^[a-z0-9]+(-[a-z0-9]+)*$/;

/**
 * Writes patterns/<slug>.php under root and returns its path.
 *
 * @param {{category:string, slug:string, title:string, root?:string}} options Pattern options.
 * @return {string} The written file path.
 */
export function scaffoldPattern( { category, slug, title, root = '.' } ) {
	if ( ! CATEGORIES.includes( category ) ) {
		throw new Error(
			`Unknown category "${ category }". Use one of: ${ CATEGORIES.join( ', ' ) }`
		);
	}
	if ( ! SLUG.test( slug ) ) {
		throw new Error(
			`Invalid slug "${ slug }": use lowercase letters, digits and single hyphens`
		);
	}
	const dir = join( root, 'patterns' );
	const path = join( dir, `${ slug }.php` );
	if ( existsSync( path ) ) {
		throw new Error( `${ path } already exists` );
	}
	mkdirSync( dir, { recursive: true } );
	writeFileSync( path, template( { category, slug, title } ) );
	return path;
}

function template( { category, slug, title } ) {
	return `<?php
/**
 * Title: ${ title }
 * Slug: keel/${ slug }
 * Categories: keel/${ category }
 * Keywords: ${ category }
 * Viewport Width: 1200
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( '${ title.replace( /'/g, "\\'" ) }', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Replace this placeholder text.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
`;
}

if (
	process.argv[ 1 ] &&
	fileURLToPath( import.meta.url ) === process.argv[ 1 ]
) {
	const [ category, slug, title ] = process.argv.slice( 2 );
	if ( ! category || ! slug || ! title ) {
		process.stderr.write(
			'usage: node bin/scaffold-pattern.js <category> <slug> "<Title>"\n'
		);
		process.exit( 2 );
	}
	try {
		process.stdout.write(
			`${ scaffoldPattern( { category, slug, title } ) }\n`
		);
	} catch ( error ) {
		process.stderr.write( `${ error.message }\n` );
		process.exit( 1 );
	}
}
