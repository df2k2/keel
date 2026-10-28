<?php
/**
 * Applies a style variation from styles/<slug>.json to the site's global styles.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/bin/apply-variation.php <slug>
 *
 * @package Keel
 */

/** @var string[] $args Positional arguments passed by wp eval-file. */
$keel_slug = isset( $args[0] ) ? sanitize_key( $args[0] ) : '';
$keel_file = get_stylesheet_directory() . '/styles/' . $keel_slug . '.json';
if ( '' === $keel_slug || ! file_exists( $keel_file ) ) {
	WP_CLI::error( 'Usage: apply-variation.php <slug>, where styles/<slug>.json exists.' );
}
$keel_data = json_decode( (string) file_get_contents( $keel_file ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local theme file.
if ( ! is_array( $keel_data ) ) {
	WP_CLI::error( "styles/{$keel_slug}.json is not valid JSON." );
}
$keel_config  = array(
	'version'                     => WP_Theme_JSON::LATEST_SCHEMA,
	'isGlobalStylesUserThemeJSON' => true,
	'settings'                    => $keel_data['settings'] ?? array(),
	'styles'                      => $keel_data['styles'] ?? array(),
);
$keel_post_id = WP_Theme_JSON_Resolver::get_user_global_styles_post_id();
// WP-CLI runs without a user, so core's tax_input is skipped when it creates the post; attach the theme term explicitly.
wp_set_object_terms( $keel_post_id, wp_get_theme()->get_stylesheet(), 'wp_theme' );
$keel_result = wp_update_post(
	wp_slash(
		array(
			'ID'           => $keel_post_id,
			'post_content' => wp_json_encode( $keel_config, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP ),
		)
	),
	true
);
if ( is_wp_error( $keel_result ) ) {
	WP_CLI::error( $keel_result->get_error_message() );
}
WP_Theme_JSON_Resolver::clean_cached_data();
wp_cache_flush();
WP_CLI::success( "Applied {$keel_slug} to global styles post {$keel_post_id}." );
