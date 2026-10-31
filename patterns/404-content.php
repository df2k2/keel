<?php
/**
 * Title: 404 content
 * Slug: keel/404-content
 * Categories: keel/pages
 * Keywords: 404, not found, search
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: 404
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:heading {"level":1,"fontSize":"xxxl"} -->
	<h1 class="wp-block-heading has-xxxl-font-size"><?php esc_html_e( 'Page not found', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"lg"} -->
	<p class="has-lg-font-size"><?php esc_html_e( 'The page you were looking for has moved or never existed. Try a search, or head back to the start.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:pattern {"slug":"keel/search-panel"} /-->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to the home page', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-ghost"} -->
		<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Contact us', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
