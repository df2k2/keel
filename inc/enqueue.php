<?php
/**
 * Front-end stylesheets.
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

/**
 * Registers one stylesheet per core block from build/css/blocks/, loaded only when that block renders.
 *
 * @return void
 */
function enqueue_block_styles(): void {
	$files = glob( get_theme_file_path( 'build/css/blocks/*.css' ) );
	if ( false === $files ) {
		return;
	}
	foreach ( $files as $path ) {
		$name = basename( $path, '.css' );
		wp_enqueue_block_style(
			'core/' . $name,
			array(
				'handle' => 'keel-block-' . $name,
				'src'    => get_theme_file_uri( 'build/css/blocks/' . $name . '.css' ),
				'path'   => $path,
				'ver'    => KEEL_VERSION,
			)
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\\enqueue_block_styles' );
