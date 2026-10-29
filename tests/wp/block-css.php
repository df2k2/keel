<?php
/**
 * Asserts that per-block stylesheets are enqueued only when their block renders.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/tests/wp/block-css.php
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

do_blocks( '<!-- wp:details {"summary":"x"} --><details class="wp-block-details"><summary>x</summary></details><!-- /wp:details -->' );
if ( ! wp_style_is( 'keel-block-details', 'enqueued' ) ) {
	WP_CLI::error( 'keel-block-details was not enqueued after rendering a Details block.' );
}
if ( wp_style_is( 'keel-block-quote', 'enqueued' ) ) {
	WP_CLI::error( 'keel-block-quote was enqueued without a Quote block on the page.' );
}
WP_CLI::success( 'block-css: details stylesheet enqueued on render, quote stylesheet not.' );
