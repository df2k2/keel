<?php
/**
 * Title: Elements: newsletter and footer
 * Slug: keel/elements-footer
 * Categories: keel/pages
 * Keywords: elements, newsletter, subscribe, footer
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"footer"} -->
	<h2 class="wp-block-heading" id="footer"><?php esc_html_e( 'Newsletter and footer', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'The one-row subscribe and the big footer: brand, two link columns, contact and hours, and a legal row.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'keel/subscribe-inline' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/subscribe-inline"} /-->

	<?php echo Keel\Theme\element_label( 'keel/footer-big' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/footer-big"} /-->
</div>
<!-- /wp:group -->
