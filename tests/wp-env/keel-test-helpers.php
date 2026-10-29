<?php
/**
 * Plugin Name: Keel test helpers
 * Description: Development-only switches for the Keel test suite: ?keel_locale=es_ES forces a locale and ?keel_rtl=1 forces right-to-left. Loaded by wp-env as a must-use plugin; never shipped.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG ) {
	return;
}

/**
 * Reads a test switch from the query string.
 *
 * @param string $name Query variable.
 * @return string Sanitised value, or an empty string.
 */
function keel_test_switch( string $name ): string {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only, debug-only test switch.
	$value = isset( $_GET[ $name ] ) ? sanitize_text_field( wp_unslash( $_GET[ $name ] ) ) : '';
	return (string) preg_replace( '/[^A-Za-z0-9_]/', '', $value );
}

add_filter(
	'locale',
	static function ( string $locale ): string {
		$forced = keel_test_switch( 'keel_locale' );
		return '' !== $forced ? $forced : $locale;
	}
);

add_action(
	'init',
	static function (): void {
		if ( '1' === keel_test_switch( 'keel_rtl' ) && isset( $GLOBALS['wp_locale'] ) ) {
			$GLOBALS['wp_locale']->text_direction = 'rtl';
		}
	}
);
