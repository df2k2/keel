<?php
/**
 * Title: Elements: rails
 * Slug: keel/elements-rails
 * Categories: keel/pages
 * Keywords: elements, rail, carousel, scroll snap
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"rails"} -->
	<h2 class="wp-block-heading" id="rails"><?php esc_html_e( 'Rails', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'A scroll-snap row of cards with no buttons and no script: swipe, scroll, or tab through the links.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'keel/rail-cards (group .is-style-rail)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/rail-cards"} /-->
</div>
<!-- /wp:group -->
