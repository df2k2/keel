<?php
/**
 * Title: Elements: tables
 * Slug: keel/elements-tables
 * Categories: keel/pages
 * Keywords: elements, tables, departures, best time, scroll
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"tables"} -->
	<h2 class="wp-block-heading" id="tables"><?php esc_html_e( 'Tables', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Two table patterns: departures with status labels and a button column, and the best-time grid on the scroll style that fades at the edge on phones.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'keel/table-departures (table .is-style-striped)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/table-departures"} /-->

	<?php echo Keel\Theme\element_label( 'keel/table-best-time (table .is-style-scroll)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/table-best-time"} /-->
</div>
<!-- /wp:group -->
