<?php
/**
 * Title: Offer card
 * Slug: keel/offer-card
 * Categories: keel/pricing
 * Keywords: offer, promotion, discount, card
 * Viewport Width: 800
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"36rem"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-bordered">
		<!-- wp:paragraph {"className":"keel-eyebrow"} -->
		<p class="keel-eyebrow"><?php esc_html_e( 'New patient offer', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php esc_html_e( 'First check-up for $49', 'keel' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Includes the full inspection and a written plan, a $120 value. One per household.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><strong><?php esc_html_e( 'Ends 31 March', 'keel' ); ?></strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Claim the offer', 'keel' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
