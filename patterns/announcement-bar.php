<?php
/**
 * Title: Announcement bar
 * Slug: keel/announcement-bar
 * Categories: keel/cta
 * Keywords: announcement, notice, bar
 * Viewport Width: 1400
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"className":"keel-announcement","layout":{"type":"constrained"}} -->
<div class="wp-block-group keel-announcement">
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Now booking spring maintenance visits.', 'keel' ); ?> <a href="#contact"><?php esc_html_e( 'Reserve yours', 'keel' ); ?></a></p>
	<!-- /wp:paragraph -->

	<!-- wp:button {"tagName":"button","type":"button","className":"keel-announcement__dismiss"} -->
	<div class="wp-block-button keel-announcement__dismiss"><button class="wp-block-button__link wp-element-button" type="button">&times;</button></div>
	<!-- /wp:button -->
</div>
<!-- /wp:group -->
