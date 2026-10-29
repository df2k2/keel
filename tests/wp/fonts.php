<?php
/**
 * Asserts the font preload list under the theme default.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/tests/wp/fonts.php
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_expected = array( 'figtree.woff2', 'bricolage-grotesque.woff2' );
$keel_actual   = Keel\Theme\font_files_to_preload();
if ( $keel_expected !== $keel_actual ) {
	WP_CLI::error( 'font_files_to_preload() returned ' . wp_json_encode( $keel_actual ) . ', expected ' . wp_json_encode( $keel_expected ) );
}
WP_CLI::success( 'fonts: preload list is ' . implode( ', ', $keel_actual ) );
