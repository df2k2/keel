<?php
/**
 * Asserts the theme's block style registrations.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/tests/wp/block-styles.php
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_expected = array(
	'core/button'     => array( 'secondary', 'ghost', 'pill' ),
	'core/group'      => array( 'card', 'surface', 'band', 'bordered' ),
	'core/image'      => array( 'soft', 'framed' ),
	'core/list'       => array( 'checkmarks' ),
	'core/quote'      => array( 'testimonial' ),
	'core/separator'  => array( 'short', 'wave' ),
	'core/navigation' => array( 'pill', 'underline' ),
	'core/details'    => array( 'faq' ),
	'core/columns'    => array( 'equal-cards' ),
	'core/cover'      => array( 'band' ),
);
$keel_registry = WP_Block_Styles_Registry::get_instance();
foreach ( $keel_expected as $keel_block => $keel_names ) {
	$keel_registered = array_keys( $keel_registry->get_registered_styles_for_block( $keel_block ) );
	$keel_missing    = array_diff( $keel_names, $keel_registered );
	if ( array() !== $keel_missing ) {
		WP_CLI::error( $keel_block . ' is missing styles: ' . implode( ', ', $keel_missing ) . ' (registered: ' . implode( ', ', $keel_registered ) . ')' );
	}
}
$keel_secondary = $keel_registry->get_registered( 'core/button', 'secondary' );
if ( 'var:preset|color|accent' !== ( $keel_secondary['style_data']['color']['background'] ?? '' ) ) {
	WP_CLI::error( 'core/button secondary must set style_data.color.background to var:preset|color|accent.' );
}
WP_CLI::success( 'block-styles: 18 keel styles registered across 10 blocks.' );
