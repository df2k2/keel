<?php
/**
 * Title: Mobile CTA bar
 * Slug: keel/mobile-cta-bar
 * Categories: keel/cta
 * Keywords: mobile, bar, call, book
 * Viewport Width: 1400
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"className":"keel-mobile-cta-bar","layout":{"type":"constrained"}} -->
<div class="wp-block-group keel-mobile-cta-bar">
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"keel-cta-call"} -->
		<div class="wp-block-button keel-cta-call"><a class="wp-block-button__link wp-element-button" href="tel:+15555550100"><?php esc_html_e( 'Call', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"keel-cta-text"} -->
		<div class="wp-block-button keel-cta-text"><a class="wp-block-button__link wp-element-button" href="sms:+15555550100"><?php esc_html_e( 'Text', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"keel-cta-book"} -->
		<div class="wp-block-button keel-cta-book"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Book', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"keel-cta-directions"} -->
		<div class="wp-block-button keel-cta-directions"><a class="wp-block-button__link wp-element-button" href="#location"><?php esc_html_e( 'Directions', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
