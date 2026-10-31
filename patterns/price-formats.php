<?php
/**
 * Title: Price formats
 * Slug: keel/price-formats
 * Categories: keel/elements
 * Keywords: prices, from, per person, per night, was now
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"keel-price"} -->
		<p class="keel-price"><span class="keel-price__label"><?php esc_html_e( 'From', 'keel' ); ?></span> $48</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-price"} -->
		<p class="keel-price">$120 <span class="keel-price__label"><?php esc_html_e( 'per person', 'keel' ); ?></span></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-price"} -->
		<p class="keel-price">$210 <span class="keel-price__label"><?php esc_html_e( 'per night', 'keel' ); ?></span></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-price"} -->
		<p class="keel-price"><s>$95</s> $79 <span class="keel-price__label"><?php esc_html_e( 'this month', 'keel' ); ?></span></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"is-style-small-print"} -->
	<p class="is-style-small-print"><?php esc_html_e( 'Prices are samples. Replace them with yours, and say what they include.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
