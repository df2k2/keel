<?php
/**
 * The per-request variation switcher: ?variation=<slug> renders the site in that style variation,
 * and a tiny script module remembers the choice for the visitor's later clicks.
 *
 * @package KeelDemo
 */

namespace Keel_Demo;

defined( 'ABSPATH' ) || exit;

/**
 * The requested variation slug, only when styles/<slug>.json exists in the active theme.
 *
 * @return string|null Slug, or null for no or an unknown request.
 */
function active_variation_slug(): ?string {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- A read-only display choice for this request; nothing is stored or changed.
	$raw = isset( $_GET['variation'] ) ? sanitize_key( wp_unslash( $_GET['variation'] ) ) : '';
	if ( '' === $raw || 1 !== preg_match( '/^[a-z0-9-]{1,40}$/', $raw ) ) {
		return null;
	}
	return file_exists( get_stylesheet_directory() . '/styles/' . $raw . '.json' ) ? $raw : null;
}

/**
 * Lays the requested variation's settings and styles over the user origin for this request.
 *
 * @param \WP_Theme_JSON_Data $data User-origin theme.json data.
 * @return \WP_Theme_JSON_Data Same data when no valid variation is requested.
 */
function filter_user_data( \WP_Theme_JSON_Data $data ): \WP_Theme_JSON_Data {
	$slug = active_variation_slug();
	if ( null === $slug || is_admin() ) {
		return $data;
	}
	static $variation = array();
	if ( ! isset( $variation[ $slug ] ) ) {
		$json               = file_get_contents( get_stylesheet_directory() . '/styles/' . $slug . '.json' ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local theme file.
		$decoded            = false === $json ? null : json_decode( $json, true );
		$variation[ $slug ] = is_array( $decoded ) ? $decoded : array();
	}
	if ( array() === $variation[ $slug ] ) {
		return $data;
	}
	return $data->update_with(
		array(
			'version'  => \WP_Theme_JSON::LATEST_SCHEMA,
			'settings' => $variation[ $slug ]['settings'] ?? array(),
			'styles'   => $variation[ $slug ]['styles'] ?? array(),
		)
	);
}
add_filter( 'wp_theme_json_data_user', __NAMESPACE__ . '\\filter_user_data' );

/**
 * Registers the switcher module; it is enqueued only when the variations strip renders.
 *
 * @return void
 */
function register_switcher_module(): void {
	wp_register_script_module(
		'keel-demo-switcher',
		plugins_url( 'build/switcher.js', FILE ),
		array( '@wordpress/interactivity' ),
		VERSION
	);
}
add_action( 'init', __NAMESPACE__ . '\\register_switcher_module' );

/**
 * Whether a parsed block carries a class name.
 *
 * @param array<string, mixed> $block      Parsed block.
 * @param string               $class_name Class to look for.
 * @return bool
 */
function block_has_class( array $block, string $class_name ): bool {
	$classes = $block['attrs']['className'] ?? '';
	if ( ! is_string( $classes ) ) {
		return false;
	}
	$list = preg_split( '/\s+/', trim( $classes ) );
	return is_array( $list ) && in_array( $class_name, $list, true );
}

/**
 * Makes the variations strip an interactive region and loads the module.
 *
 * @param string               $content Rendered group.
 * @param array<string, mixed> $block   Parsed block.
 * @return string
 */
function filter_variations_group( string $content, array $block ): string {
	if ( ! block_has_class( $block, 'keel-demo-variations' ) ) {
		return $content;
	}
	wp_enqueue_script_module( 'keel-demo-switcher' );
	$processor = new \WP_HTML_Tag_Processor( $content );
	if ( $processor->next_tag() ) {
		$processor->set_attribute( 'data-wp-interactive', 'keel-demo/switcher' );
		$processor->set_attribute( 'data-wp-init', 'callbacks.init' );
	}
	return wp_interactivity_process_directives( $processor->get_updated_html() );
}
add_filter( 'render_block_core/group', __NAMESPACE__ . '\\filter_variations_group', 10, 2 );

/**
 * Wires the "View this site in …" buttons to the store with the slug from their link.
 *
 * @param string               $content Rendered button.
 * @param array<string, mixed> $block   Parsed block.
 * @return string
 */
function filter_variation_button( string $content, array $block ): string {
	if ( ! block_has_class( $block, 'keel-demo-variation' ) ) {
		return $content;
	}
	$processor = new \WP_HTML_Tag_Processor( $content );
	if ( ! $processor->next_tag( array( 'tag_name' => 'a' ) ) ) {
		return $content;
	}
	$href  = (string) $processor->get_attribute( 'href' );
	$query = wp_parse_url( $href, PHP_URL_QUERY );
	$args  = array();
	if ( is_string( $query ) ) {
		parse_str( $query, $args );
	}
	$slug = isset( $args['variation'] ) && is_string( $args['variation'] ) ? sanitize_key( $args['variation'] ) : '';
	$processor->set_attribute( 'data-wp-context', wp_json_encode( array( 'slug' => $slug ) ) );
	$processor->set_attribute( 'data-wp-on--click', 'actions.choose' );
	return $processor->get_updated_html();
}
add_filter( 'render_block_core/button', __NAMESPACE__ . '\\filter_variation_button', 10, 2 );
