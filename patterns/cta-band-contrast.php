<?php
/**
 * Title: CTA band: contrast
 * Slug: keel/cta-band-contrast
 * Categories: keel/cta
 * Keywords: cta, call to action, dark band
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","className":"is-style-band","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-band">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Still have questions?', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
	<p class="has-text-align-center has-lg-font-size"><?php esc_html_e( 'Talk to a real person. No call centres, no bots.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-secondary"} -->
		<div class="wp-block-button is-style-secondary"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Contact us', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
