<?php
/**
 * Asserts the theme's block templates and template parts.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/tests/wp/templates.php
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_templates = get_block_templates( array(), 'wp_template' );
if ( 17 !== count( $keel_templates ) ) {
	WP_CLI::error( 'Expected 17 templates, found ' . count( $keel_templates ) . '.' );
}
$keel_parts = get_block_templates( array(), 'wp_template_part' );
if ( 15 !== count( $keel_parts ) ) {
	WP_CLI::error( 'Expected 15 template parts, found ' . count( $keel_parts ) . '.' );
}
$keel_service = get_block_template( 'keel//page-service' );
if ( ! $keel_service instanceof WP_Block_Template || ! str_contains( $keel_service->content, 'wp:template-part {"slug":"cta-band"' ) ) {
	WP_CLI::error( 'page-service must include the cta-band part.' );
}
if ( ! current_theme_supports( 'custom-logo' ) ) {
	WP_CLI::error( 'The custom-logo tag in style.css needs add_theme_support( \'custom-logo\' ).' );
}
foreach ( array( 'header', 'header-centered', 'header-sticky', 'header-transparent', 'header-utility' ) as $keel_header ) {
	$keel_part = get_block_template( 'keel//' . $keel_header, 'wp_template_part' );
	if ( ! $keel_part instanceof WP_Block_Template || ! str_contains( $keel_part->content, '<!-- wp:site-logo' ) ) {
		WP_CLI::error( $keel_header . ' must print the Site Logo block.' );
	}
}
WP_CLI::success( 'templates: 17 templates and 15 parts resolve, and every header prints the site logo.' );
