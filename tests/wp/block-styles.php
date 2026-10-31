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
	'core/button'             => array( 'secondary', 'ghost', 'pill', 'small', 'large', 'light', 'outline-light', 'soft', 'glass', 'link', 'icon-phone', 'icon-search', 'icon-arrow', 'icon-map', 'icon-calendar' ),
	'core/group'              => array( 'card', 'surface', 'band', 'bordered', 'textured', 'wave-bottom', 'ticket', 'rail', 'paper', 'dot-grid', 'marquee', 'callout-info', 'callout-warm', 'callout-success', 'callout-error', 'search-panel-compact', 'search-panel-flat' ),
	'core/image'              => array( 'soft', 'framed', 'polaroid' ),
	'core/media-text'         => array( 'card' ),
	'core/list'               => array( 'checkmarks', 'two-column', 'crosses' ),
	'core/quote'              => array( 'testimonial' ),
	'core/separator'          => array( 'short', 'wave', 'route' ),
	'core/navigation'         => array( 'pill', 'underline' ),
	'core/navigation-submenu' => array( 'wide' ),
	'core/navigation-link'    => array( 'highlight' ),
	'core/details'            => array( 'faq' ),
	'core/columns'            => array( 'equal-cards' ),
	'core/cover'              => array( 'band', 'gradient-overlay', 'tile' ),
	'core/table'              => array( 'striped', 'compact', 'scroll' ),
	'core/heading'            => array( 'eyebrow', 'accent', 'ghost' ),
	'core/paragraph'          => array( 'lead', 'eyebrow-rule', 'small-print' ),
	'core/accordion'          => array( 'faq' ),
	'core/tabs'               => array( 'boxed', 'pills' ),
	'core/gallery'            => array( 'mosaic' ),
);
$keel_registry = WP_Block_Styles_Registry::get_instance();
foreach ( $keel_expected as $keel_block => $keel_names ) {
	$keel_registered = array_keys( $keel_registry->get_registered_styles_for_block( $keel_block ) );
	$keel_missing    = array_diff( $keel_names, $keel_registered );
	if ( array() !== $keel_missing ) {
		WP_CLI::error( $keel_block . ' is missing styles: ' . implode( ', ', $keel_missing ) . ' (registered: ' . implode( ', ', $keel_registered ) . ')' );
	}
}
$keel_eyebrow = $keel_registry->get_registered( 'core/heading', 'eyebrow' );
if ( 'uppercase' !== ( $keel_eyebrow['style_data']['typography']['textTransform'] ?? '' ) ) {
	WP_CLI::error( 'core/heading eyebrow must set style_data.typography.textTransform to uppercase.' );
}
$keel_secondary = $keel_registry->get_registered( 'core/button', 'secondary' );
if ( 'var:preset|color|accent' !== ( $keel_secondary['style_data']['color']['background'] ?? '' ) ) {
	WP_CLI::error( 'core/button secondary must set style_data.color.background to var:preset|color|accent.' );
}
$keel_total = 0;
foreach ( $keel_expected as $keel_names ) {
	$keel_total += count( $keel_names );
}
WP_CLI::success( sprintf( 'block-styles: %d keel styles registered across %d blocks.', $keel_total, count( $keel_expected ) ) );
