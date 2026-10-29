<?php
/**
 * Title: Newsletter band
 * Slug: keel/newsletter-band
 * Categories: keel/cta
 * Keywords: newsletter, subscribe, email, form
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
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Seasonal tips, once a month', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Short, useful and easy to leave. No sales pressure.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained","contentSize":"36rem"}} -->
	<div class="wp-block-group is-style-bordered">
		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><?php esc_html_e( 'Insert your newsletter form block here: a name field, an email field and a consent box. Keel ships no forms of its own.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Subscribe', 'keel' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
