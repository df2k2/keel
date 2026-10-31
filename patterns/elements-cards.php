<?php
/**
 * Title: Elements: cards
 * Slug: keel/elements-cards
 * Categories: keel/pages
 * Keywords: elements, cards, listing, row, tile, mini list, ticket, polaroid
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"cards"} -->
	<h2 class="wp-block-heading" id="cards"><?php esc_html_e( 'Cards', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Every card is a Stack: in a row they share a height and the footer sits on the bottom edge. The photo bleeds to the edges through keel-card__media.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'keel/card-listing' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"24rem","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"keel/card-listing"} /-->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'keel/card-listing-amenities' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"24rem","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"keel/card-listing-amenities"} /-->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'keel/card-row (media-text .is-style-card)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"44rem","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"keel/card-row"} /-->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'keel/tile (cover .is-style-tile)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/tile"} /-->

	<?php echo Keel\Theme\element_label( 'keel/mini-list' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"36rem","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"keel/mini-list"} /-->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'keel/ticket (group .is-style-ticket)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"28rem","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"keel/ticket"} /-->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'keel/polaroid-trio (image .is-style-polaroid)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/polaroid-trio"} /-->
</div>
<!-- /wp:group -->
