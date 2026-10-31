<?php
/**
 * Title: Deal card
 * Slug: keel/deal-card
 * Categories: keel/pricing
 * Keywords: deal, offer, discount, ticket, price
 * Viewport Width: 480
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"className":"is-style-ticket","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-ticket">
	<!-- wp:paragraph {"className":"keel-status keel-status--accent"} -->
	<p class="keel-status keel-status--accent"><?php echo esc_html( __( 'Save 20%', 'keel' ) ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":3,"fontSize":"lg"} -->
	<h3 class="wp-block-heading has-lg-font-size"><a href="#deal"><?php echo esc_html( __( 'Midweek paddle', 'keel' ) ); ?></a></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"}}} -->
	<p style="font-size:0.9375rem"><?php echo esc_html( __( 'Tuesday to Thursday departures through March, same guide, same route.', 'keel' ) ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group keel-card-footer">
		<!-- wp:paragraph {"className":"keel-price"} -->
		<p class="keel-price"><s><?php echo esc_html( '$65' ); ?></s> <?php echo esc_html( '$52' ); ?> <span class="keel-price__label"><?php echo esc_html( __( 'per person', 'keel' ) ); ?></span></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"fontSize":"sm"} -->
			<div class="wp-block-button has-custom-font-size has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#deal"><?php esc_html_e( 'Claim deal', 'keel' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
