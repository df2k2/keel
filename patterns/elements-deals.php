<?php
/**
 * Title: Elements: prices and deals
 * Slug: keel/elements-deals
 * Categories: keel/pages
 * Keywords: elements, pricing, plans, deals, tickets
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"deals"} -->
	<h2 class="wp-block-heading" id="deals"><?php esc_html_e( 'Prices and deals', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'The pricing table with its popular tag, and deal cards on the ticket style with was and now prices.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'keel/pricing-table (.keel-tag)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/pricing-table"} /-->

	<?php echo Keel\Theme\element_label( 'keel/deal-card' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"28rem","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"keel/deal-card"} /-->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'keel/deals-grid' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/deals-grid"} /-->
</div>
<!-- /wp:group -->
