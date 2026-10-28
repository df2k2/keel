<?php
/**
 * Theme setup.
 *
 * @package Keel
 */

namespace Keel\Theme;

defined( 'ABSPATH' ) || exit;

/**
 * Registers theme supports and the editor stylesheet.
 *
 * @return void
 */
function setup(): void {
	load_theme_textdomain( 'keel', get_template_directory() . '/languages' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'build/css/editor.css' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

add_filter( 'should_load_separate_core_block_assets', '__return_true' );
