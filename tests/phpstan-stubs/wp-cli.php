<?php
/**
 * Minimal WP-CLI stub for PHPStan. php-stubs/wp-cli-stubs requires wordpress-stubs 6.x,
 * which conflicts with the 7.1 stubs this theme targets, so only the two methods bin/ uses are declared.
 *
 * @package Keel
 */

// phpcs:disable

class WP_CLI {
	/**
	 * @param string $message
	 * @return void
	 */
	public static function success( $message ) {}

	/**
	 * @param string|\WP_Error $message
	 * @return never
	 */
	public static function error( $message ) {
		exit( 1 );
	}
}
