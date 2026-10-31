<?php
/**
 * Title: Elements: stats, facts and media
 * Slug: keel/elements-stats-media
 * Categories: keel/pages
 * Keywords: elements, stats, facts, map, gallery, mosaic
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"stats-media"} -->
	<h2 class="wp-block-heading" id="stats-media"><?php esc_html_e( 'Stats, facts and media', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Numbers in the serif at the display size, a facts bar with icons, a map card with no embed, and the mosaic gallery.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'keel/stats-band (.keel-stat--display)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/stats-band"} /-->

	<?php echo Keel\Theme\element_label( 'keel/facts-bar' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/facts-bar"} /-->

	<?php echo Keel\Theme\element_label( 'keel/map-card' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"40rem","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"keel/map-card"} /-->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'keel/listing-gallery (gallery .is-style-mosaic)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/listing-gallery"} /-->
</div>
<!-- /wp:group -->
