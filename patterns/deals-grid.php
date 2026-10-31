<?php
/**
 * Title: Deals grid
 * Slug: keel/deals-grid
 * Categories: keel/pricing
 * Keywords: deals, offers, grid, discounts
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_deals = array(
	array( __( 'Save 20%', 'keel' ), __( 'Midweek paddle', 'keel' ), __( 'Tuesday to Thursday departures through March, same guide, same route.', 'keel' ), '$65', '$52', __( 'per person', 'keel' ) ),
	array( __( 'Third night free', 'keel' ), __( 'Stay longer at the inn', 'keel' ), __( 'Book two nights at the Boathouse Inn and the third is on the house, until the end of April.', 'keel' ), '$630', '$420', __( 'for three nights', 'keel' ) ),
	array( __( 'Kids free', 'keel' ), __( 'Family market tour', 'keel' ), __( 'One adult ticket brings two children along on Saturday mornings.', 'keel' ), '$45', '$15', __( 'per family', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Deals this season', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $keel_deals as $keel_deal ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-ticket","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group is-style-ticket">
				<!-- wp:paragraph {"className":"keel-status keel-status--accent"} -->
				<p class="keel-status keel-status--accent"><?php echo esc_html( $keel_deal[0] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><a href="#deal"><?php echo esc_html( $keel_deal[1] ); ?></a></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p style="font-size:0.9375rem"><?php echo esc_html( $keel_deal[2] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
				<div class="wp-block-group keel-card-footer">
					<!-- wp:paragraph {"className":"keel-price"} -->
					<p class="keel-price"><s><?php echo esc_html( $keel_deal[3] ); ?></s> <?php echo esc_html( $keel_deal[4] ); ?> <span class="keel-price__label"><?php echo esc_html( $keel_deal[5] ); ?></span></p>
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
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
