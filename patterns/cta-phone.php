<?php
/**
 * Title: CTA: phone
 * Slug: keel/cta-phone
 * Categories: keel/cta
 * Keywords: cta, phone, call
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","backgroundColor":"surface","className":"keel-band","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull keel-band has-surface-background-color has-background">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Need help today?', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"keel-stat__number"} -->
	<p class="has-text-align-center keel-stat__number"><a href="tel:+15555550100">(555) 555-0100</a></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Lines open 7 days a week. Emergency calls answered around the clock.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
