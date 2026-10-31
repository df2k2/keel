import { test } from 'node:test';
import assert from 'node:assert/strict';
import { existsSync, readdirSync } from 'node:fs';
import { join } from 'node:path';
import { read } from './helpers.js';

const TEMPLATES = [
	'index',
	'front-page',
	'home',
	'single',
	'page',
	'page-no-title',
	'page-landing',
	'page-service',
	'page-location',
	'archive',
	'search',
	'404',
	'attachment',
	'single-cover',
	'single-sidebar',
	'single-minimal',
	'author',
];
const PARTS = [
	'header',
	'header-centered',
	'header-transparent',
	'header-utility',
	'header-sticky',
	'header-actions',
	'footer',
	'footer-minimal',
	'footer-big',
	'cta-band',
	'mobile-cta-bar',
	'announcement-bar',
	'post-meta',
	'comments',
	'floating-cta',
];
const CUSTOM = {
	'page-no-title': [ 'Page without title', [ 'page' ] ],
	'page-landing': [ 'Landing page', [ 'page' ] ],
	'page-service': [ 'Service page', [ 'page' ] ],
	'page-location': [ 'Location page', [ 'page' ] ],
	'single-cover': [ 'Post: cover', [ 'post' ] ],
	'single-sidebar': [ 'Post: with sidebar', [ 'post' ] ],
	'single-minimal': [ 'Post: minimal', [ 'post' ] ],
};
const TRANSPARENT = [ 'front-page', 'page-no-title', 'single-cover' ];

const partRefs = ( html ) =>
	[
		...html.matchAll( /<!-- wp:template-part \{[^}]*"slug":"([a-z-]+)"/g ),
	].map( ( match ) => match[ 1 ] );

test( 'seventeen templates with a main landmark and the expected parts', () => {
	for ( const name of TEMPLATES ) {
		const path = `templates/${ name }.html`;
		assert.ok( existsSync( path ), `${ path } missing` );
		const html = read( path );
		assert.match( html, /"tagName":"main"/, `${ name } has no main` );
		assert.match( html, /"anchor":"main"/, `${ name } main has no anchor` );
		const refs = partRefs( html );
		const headers = refs.filter( ( ref ) => ref.startsWith( 'header' ) );
		const footers = refs.filter( ( ref ) => ref.startsWith( 'footer' ) );
		if ( name === 'page-landing' ) {
			assert.deepEqual( headers, [], 'landing has no header' );
			assert.deepEqual( footers, [ 'footer-minimal' ] );
		} else {
			assert.equal( headers.length, 1, `${ name } header count` );
			assert.equal( footers.length, 1, `${ name } footer count` );
			assert.equal(
				headers[ 0 ],
				TRANSPARENT.includes( name ) ? 'header-transparent' : 'header',
				`${ name } header part`
			);
		}
		for ( const ref of refs ) {
			assert.ok( PARTS.includes( ref ), `${ name } references ${ ref }` );
		}
	}
} );

test( 'theme.json lists the custom templates and the fourteen parts', () => {
	const theme = JSON.parse( read( 'theme.json' ) );
	assert.deepEqual(
		Object.fromEntries(
			theme.customTemplates.map( ( entry ) => [
				entry.name,
				[ entry.title, entry.postTypes ],
			] )
		),
		CUSTOM
	);
	for ( const entry of theme.customTemplates ) {
		assert.ok( existsSync( `templates/${ entry.name }.html` ) );
	}
	assert.deepEqual(
		theme.templateParts.map( ( part ) => part.name ).sort(),
		[ ...PARTS ].sort()
	);
	for ( const part of theme.templateParts ) {
		assert.ok( existsSync( `parts/${ part.name }.html` ), part.name );
	}
	assert.deepEqual(
		readdirSync( 'parts' )
			.map( ( file ) => file.replace( '.html', '' ) )
			.sort(),
		[ ...PARTS ].sort()
	);
} );

test( 'templates and parts are core-only and offline', () => {
	for ( const dir of [ 'templates', 'parts' ] ) {
		for ( const file of readdirSync( dir ) ) {
			const html = read( join( dir, file ) );
			for ( const match of html.matchAll( /<!-- wp:([a-z0-9-]+)\//g ) ) {
				assert.equal( match[ 1 ], 'core', `${ dir }/${ file }` );
			}
			for ( const bad of [ 'http', '<script', 'wp:html' ] ) {
				assert.ok(
					! html.includes( bad ),
					`${ dir }/${ file } contains ${ bad }`
				);
			}
			// Text belongs in patterns, where it is translatable; templates and parts only compose.
			// Text sits between a tag's closing bracket and the next tag; block comments hold JSON, not text.
			assert.doesNotMatch(
				html,
				/>\s*[A-Za-z][^<]*</,
				`${ dir }/${ file } carries literal text`
			);
		}
	}
} );
