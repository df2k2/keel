<?php
/**
 * Title: Tickets list
 * Slug: keel/tickets-list
 * Categories: keel/cards
 * Keywords: tickets, events, list, month
 * Viewport Width: 700
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_tickets = array(
	array( '14', __( 'Saturday 14 March, 7 pm', 'keel' ), __( 'Harbor night market', 'keel' ), __( 'Riverside green · Free entry, tickets for the tastings', 'keel' ), __( 'From', 'keel' ), '$12' ),
	array( '21', __( 'Saturday 21 March, 6 am', 'keel' ), __( 'Sunrise regatta', 'keel' ), __( 'North beach · Watch from the pier for free', 'keel' ), __( 'Entry', 'keel' ), '$40' ),
	array( '28', __( 'Saturday 28 March, 10 am', 'keel' ), __( 'Old town walking tour', 'keel' ), __( 'Meets at the clock tower · Ninety minutes', 'keel' ), __( 'Per person', 'keel' ), '$15' ),
);
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group">
	<?php foreach ( $keel_tickets as $keel_ticket ) : ?>
	<!-- wp:group {"className":"is-style-ticket","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group is-style-ticket">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"keel-day"} -->
			<p class="keel-day"><?php echo esc_html( $keel_ticket[0] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"keel-eyebrow"} -->
				<p class="keel-eyebrow"><?php echo esc_html( $keel_ticket[1] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><a href="#event"><?php echo esc_html( $keel_ticket[2] ); ?></a></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php echo esc_html( $keel_ticket[3] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group keel-card-footer">
			<!-- wp:paragraph {"className":"keel-price"} -->
			<p class="keel-price"><span class="keel-price__label"><?php echo esc_html( $keel_ticket[4] ); ?></span> <?php echo esc_html( $keel_ticket[5] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"fontSize":"sm"} -->
				<div class="wp-block-button has-custom-font-size has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#tickets"><?php echo esc_html( __( 'Get tickets', 'keel' ) ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
