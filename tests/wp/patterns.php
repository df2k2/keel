<?php
/**
 * Asserts that every theme pattern is registered and renders.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/tests/wp/patterns.php
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

const KEEL_PATTERNS    = array(
	'hero-image',
	'hero-split',
	'hero-video',
	'hero-text',
	'trust-bar',
	'services-grid-3',
	'services-grid-4',
	'services-grid-6',
	'service-detail',
	'process-steps',
	'stats-band',
);
const KEEL_H1_PATTERNS = array( 'hero-image', 'hero-split', 'hero-video', 'hero-text' );

$keel_registry = WP_Block_Patterns_Registry::get_instance();
foreach ( KEEL_PATTERNS as $keel_slug ) {
	if ( ! $keel_registry->is_registered( 'keel/' . $keel_slug ) ) {
		WP_CLI::error( "keel/{$keel_slug} is not registered." );
	}
	$keel_html = do_blocks( '<!-- wp:pattern {"slug":"keel/' . $keel_slug . '"} /-->' );
	if ( '' === trim( $keel_html ) ) {
		WP_CLI::error( "keel/{$keel_slug} rendered nothing." );
	}
	if ( str_contains( $keel_html, '<!-- wp:' ) ) {
		WP_CLI::error( "keel/{$keel_slug} left block comments in its output." );
	}
	$keel_h1       = substr_count( $keel_html, '<h1' );
	$keel_expected = in_array( $keel_slug, KEEL_H1_PATTERNS, true ) ? 1 : 0;
	if ( $keel_h1 !== $keel_expected ) {
		WP_CLI::error( "keel/{$keel_slug} renders {$keel_h1} h1 elements, expected {$keel_expected}." );
	}
}
WP_CLI::success( count( KEEL_PATTERNS ) . ' patterns registered and rendering.' );
