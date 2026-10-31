<?php
/**
 * Title: Elements: itinerary and steps
 * Slug: keel/elements-itinerary-steps
 * Categories: keel/pages
 * Keywords: elements, itinerary, days, steps, timeline
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"itinerary-steps"} -->
	<h2 class="wp-block-heading" id="itinerary-steps"><?php esc_html_e( 'Itinerary and steps', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'A day-by-day plan on the Accordion with day badges, numbered steps in a row and the timeline.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'keel/itinerary (.keel-day)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/itinerary"} /-->

	<?php echo Keel\Theme\element_label( 'keel/steps-row' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/steps-row"} /-->

	<?php echo Keel\Theme\element_label( 'keel/timeline' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/timeline"} /-->
</div>
<!-- /wp:group -->
