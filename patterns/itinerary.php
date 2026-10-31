<?php
/**
 * Title: Itinerary
 * Slug: keel/itinerary
 * Categories: keel/process
 * Keywords: itinerary, days, plan, accordion, trip
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_days = array(
	array( '1', __( 'Day 1: Arrive and settle in', 'keel' ), __( 'Check in, walk the harbour front and eat early at the fish counter before the crowd.', 'keel' ), array( __( 'Harbour walk at golden hour', 'keel' ), __( 'Dinner at the Boathouse Kitchen', 'keel' ), __( 'Tide check for tomorrow', 'keel' ) ) ),
	array( '2', __( 'Day 2: On the water', 'keel' ), __( 'A sunrise paddle, a long lunch and the sandbar at low tide.', 'keel' ), array( __( 'Sunrise paddle on the inlet', 'keel' ), __( 'Low tide at the sandbar', 'keel' ), __( 'Sunset from the pier', 'keel' ) ) ),
	array( '3', __( 'Day 3: Old town and home', 'keel' ), __( 'Coffee in the old town, the Saturday market and one last swim.', 'keel' ), array( __( 'The Saturday market', 'keel' ), __( 'Old town walking tour', 'keel' ), __( 'A last swim at Harbor Point Beach', 'keel' ) ) ),
);
?>
<!-- wp:group {"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Three days, done well', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:accordion {"className":"is-style-faq keel-itinerary"} -->
	<div role="group" class="wp-block-accordion is-style-faq keel-itinerary">
		<?php foreach ( $keel_days as $keel_i => $keel_day ) : ?>
			<?php $keel_open = 0 === $keel_i ? '{"openByDefault":true} ' : ''; ?>
		<!-- wp:accordion-item <?php echo $keel_open; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static JSON, no user input. ?>-->
		<div class="wp-block-accordion-item<?php echo 0 === $keel_i ? ' is-open' : ''; ?>">
		<!-- wp:accordion-heading <?php echo $keel_open; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static JSON, no user input. ?>-->
		<h3 class="wp-block-accordion-heading has-icon has-icon-right"><button type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title"><span class="keel-day"><?php echo esc_html( $keel_day[0] ); ?></span> <?php echo esc_html( $keel_day[1] ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
		<!-- /wp:accordion-heading -->

		<!-- wp:accordion-panel <?php echo $keel_open; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static JSON, no user input. ?>-->
		<div role="region" class="wp-block-accordion-panel">
		<!-- wp:paragraph -->
		<p><?php echo esc_html( $keel_day[2] ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:list {"className":"is-style-checkmarks"} -->
		<ul class="wp-block-list is-style-checkmarks">
			<?php foreach ( $keel_day[3] as $keel_stop ) : ?>
		<!-- wp:list-item -->
		<li><?php echo esc_html( $keel_stop ); ?></li>
		<!-- /wp:list-item -->
		<?php endforeach; ?>
		</ul>
		<!-- /wp:list -->
		</div>
		<!-- /wp:accordion-panel -->
		</div>
		<!-- /wp:accordion-item -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:accordion -->
</div>
<!-- /wp:group -->
