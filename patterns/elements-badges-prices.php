<?php
/**
 * Title: Elements: badges and prices
 * Slug: keel/elements-badges-prices
 * Categories: keel/pages
 * Keywords: elements, badges, chips, tags, status, rating, prices
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"badges-prices"} -->
	<h2 class="wp-block-heading" id="badges-prices"><?php esc_html_e( 'Badges and prices', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Small labels and the price formats. Chips are quiet, badges carry colour, tags sit on photos, status labels say what is left.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( '.keel-chip, .keel-badge' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"keel-chip"} -->
		<p class="keel-chip"><?php esc_html_e( 'Free parking', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-chip"} -->
		<p class="keel-chip"><?php esc_html_e( 'Lifeguard in season', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-badge"} -->
		<p class="keel-badge"><?php esc_html_e( 'Open now', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( '.keel-status, --success, --warning, --accent' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"keel-status"} -->
		<p class="keel-status"><?php esc_html_e( 'New', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-status keel-status--success"} -->
		<p class="keel-status keel-status--success"><?php esc_html_e( 'Guaranteed', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-status keel-status--warning"} -->
		<p class="keel-status keel-status--warning"><?php esc_html_e( '3 seats left', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-status keel-status--accent"} -->
		<p class="keel-status keel-status--accent"><?php esc_html_e( 'Save 20%', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( '.keel-tag on a tile' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/tile"} /-->

	<?php echo Keel\Theme\element_label( 'keel/rating' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/rating"} /-->

	<?php echo Keel\Theme\element_label( 'keel/price-formats' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/price-formats"} /-->
</div>
<!-- /wp:group -->
