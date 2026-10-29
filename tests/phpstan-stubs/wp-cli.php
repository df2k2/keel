<?php
/**
 * Minimal WP-CLI stub for PHPStan. php-stubs/wp-cli-stubs requires wordpress-stubs 6.x,
 * which conflicts with the 7.1 stubs this theme targets, so only the methods bin/ and examples/keel-demo use are declared.
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
	 * @param string $message
	 * @return void
	 */
	public static function log( $message ) {}

	/**
	 * @param string $message
	 * @return void
	 */
	public static function line( $message = '' ) {}

	/**
	 * @param string $message
	 * @return void
	 */
	public static function warning( $message ) {}

	/**
	 * @param string                 $name
	 * @param callable|class-string  $callable
	 * @param array<string, mixed>   $args
	 * @return bool
	 */
	public static function add_command( $name, $callable, $args = array() ) {
		return true;
	}

	/**
	 * @param string|\WP_Error $message
	 * @return never
	 */
	public static function error( $message ) {
		exit( 1 );
	}
}
