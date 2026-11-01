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
WP_CLI::success( 'templates: 17 templates and 14 parts resolve.' );
