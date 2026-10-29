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

/**
 * Drops the legacy emoji detection script and its external SVG fallback: every supported browser
 * renders emoji natively, and static pages must load no JavaScript at all.
 *
 * @return void
 */
function disable_emoji_script(): void {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', __NAMESPACE__ . '\\disable_emoji_script' );

/**
 * Prints a plain HTML skip link right after the body opens, so it exists without JavaScript,
 * and drops core's script-injected one.
 *
 * @return void
 */
function print_skip_link(): void {
	printf(
		'<a class="skip-link screen-reader-text" href="#main">%s</a>',
		esc_html__( 'Skip to content', 'keel' )
	);
}
add_action( 'wp_body_open', __NAMESPACE__ . '\\print_skip_link' );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_block_template_skip_link' );
remove_action( 'wp_footer', 'the_block_template_skip_link' );

/**
 * Keeps the comment form title at heading level 2 so the outline never skips a level.
 *
 * @param array<string, mixed> $defaults Comment form defaults.
 * @return array<string, mixed> Defaults with an h2 reply title.
 */
function comment_form_title_level( array $defaults ): array {
	$defaults['title_reply_before'] = '<h2 id="reply-title" class="comment-reply-title">';
	$defaults['title_reply_after']  = '</h2>';
	return $defaults;
}
add_filter( 'comment_form_defaults', __NAMESPACE__ . '\\comment_form_title_level' );
