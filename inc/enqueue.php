<?php
/**
 * Front-end stylesheet.
 *
 * @package Keel
 */

namespace Keel\Theme;

defined( 'ABSPATH' ) || exit;

/**
 * Enqueues the compiled theme stylesheet.
 *
 * @return void
 */
function enqueue_styles(): void {
	wp_enqueue_style( 'keel', get_theme_file_uri( 'build/css/keel.css' ), array(), KEEL_VERSION );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_styles' );
