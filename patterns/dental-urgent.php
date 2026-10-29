<?php
/**
 * Title: Dental: emergency band
 * Slug: keel/dental-urgent
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, emergency, urgent, same day
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","backgroundColor":"accent","textColor":"accent-contrast","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|accent-contrast"}}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-accent-contrast-color has-accent-background-color has-text-color has-background has-link-color" id="emergency" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"fontSize":"lg"} -->
		<p class="has-lg-font-size"><strong><?php esc_html_e( 'Toothache or a knocked-out tooth?', 'keel' ); ?></strong> <?php esc_html_e( 'Same-day emergency slots are held every morning.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"base","textColor":"contrast"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button" href="tel:+15555550100"><?php esc_html_e( 'Call (555) 555-0100 now', 'keel' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
