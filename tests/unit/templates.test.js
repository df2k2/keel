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
];
const PARTS = [
	'header',
	'header-centered',
	'header-transparent',
	'footer',
	'footer-minimal',
	'cta-band',
	'mobile-cta-bar',
	'announcement-bar',
	'post-meta',
	'comments',
];
const CUSTOM = {
	'page-no-title': 'Page without title',
	'page-landing': 'Landing page',
	'page-service': 'Service page',
	'page-location': 'Location page',
};
const TRANSPARENT = [ 'front-page', 'page-no-title' ];

const partRefs = ( html ) =>
	[
		...html.matchAll( /<!-- wp:template-part \{[^}]*"slug":"([a-z-]+)"/g ),
	].map( ( match ) => match[ 1 ] );

test( 'thirteen templates with a main landmark and the expected parts', () => {
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

test( 'theme.json lists the custom templates and the ten parts', () => {
	const theme = JSON.parse( read( 'theme.json' ) );
	assert.deepEqual(
		Object.fromEntries(
			theme.customTemplates.map( ( entry ) => [
				entry.name,
				entry.title,
			] )
		),
		CUSTOM
	);
	for ( const entry of theme.customTemplates ) {
		assert.ok( existsSync( `templates/${ entry.name }.html` ) );
		assert.deepEqual( entry.postTypes, [ 'page' ] );
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
		}
	}
} );
