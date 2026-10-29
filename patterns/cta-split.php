<?php
/**
 * Title: CTA: split
 * Slug: keel/cta-split
 * Categories: keel/cta
 * Keywords: cta, call to action, card
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"wide","className":"is-style-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide is-style-card">
	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%">
			<!-- wp:heading {"level":3,"fontSize":"xl"} -->
			<h3 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'Get a free, written quote this week', 'keel' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Tell us what you need and a specialist will confirm a time within one business day.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Request a quote', 'keel' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
