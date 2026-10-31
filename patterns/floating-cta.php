<?php
/**
 * Title: Floating call to action
 * Slug: keel/floating-cta
 * Categories: keel/cta
 * Keywords: floating, call, book, fixed, desktop
 * Viewport Width: 1400
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"className":"keel-floating-cta","layout":{"type":"constrained"}} -->
<div class="wp-block-group keel-floating-cta">
	<!-- wp:buttons {"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-icon-phone"} -->
		<div class="wp-block-button is-style-icon-phone"><a class="wp-block-button__link wp-element-button" href="tel:+15555550100"><?php esc_html_e( 'Call', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-icon-calendar"} -->
		<div class="wp-block-button is-style-icon-calendar"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Book', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
