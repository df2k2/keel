<?php
/**
 * Title: Elements: callouts
 * Slug: keel/elements-callouts
 * Categories: keel/pages
 * Keywords: elements, callouts, info, warm, success, error
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"callouts"} -->
	<h2 class="wp-block-heading" id="callouts"><?php esc_html_e( 'Callouts', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Four group styles with a coloured edge, a tint and an icon: info, warm, success and error.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'group .is-style-callout-info, -warm, -success, -error' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/callouts"} /-->
</div>
<!-- /wp:group -->
