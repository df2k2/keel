<?php
/**
 * Asserts the font preload list under the theme default.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/tests/wp/fonts.php
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_actual = Keel\Theme\font_files_to_preload();
// Figtree (body) is always first; the display face follows only when the active variation bundles one.
if ( 'figtree.woff2' !== ( $keel_actual[0] ?? '' ) || count( $keel_actual ) > 2 ) {
	WP_CLI::error( 'font_files_to_preload() returned ' . wp_json_encode( $keel_actual ) . ', expected figtree.woff2 first and at most one display face.' );
}
WP_CLI::success( 'fonts: preload list is ' . implode( ', ', $keel_actual ) );
