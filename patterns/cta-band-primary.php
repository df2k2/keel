<?php
/**
 * Title: CTA band: primary
 * Slug: keel/cta-band-primary
 * Categories: keel/cta
 * Keywords: cta, call to action, band
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","backgroundColor":"primary","textColor":"primary-contrast","className":"keel-band","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull keel-band has-primary-contrast-color has-primary-background-color has-text-color has-background">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Ready to get started?', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
	<p class="has-text-align-center has-lg-font-size"><?php esc_html_e( 'Book online in two minutes or call us for a same-day quote.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"base","textColor":"primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" href="#contact"><?php esc_html_e( 'Book a visit', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="tel:+15555550100"><?php esc_html_e( 'Call (555) 555-0100', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
