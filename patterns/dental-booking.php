<?php
/**
 * Title: Dental: booking
 * Slug: keel/dental-booking
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, booking, appointment, call
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","backgroundColor":"primary","textColor":"primary-contrast","className":"keel-band","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull keel-band has-primary-contrast-color has-primary-background-color has-text-color has-background" id="book">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Book in two minutes', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
	<p class="has-text-align-center has-lg-font-size"><?php esc_html_e( 'Choose a dentist and a time online, or call and talk to a person. New patients are seen within the week.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"base","textColor":"primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-base-background-color has-text-color has-background wp-element-button" href="#book"><?php esc_html_e( 'Book online', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="tel:+15555550100"><?php esc_html_e( 'Call (555) 555-0100', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size"><?php esc_html_e( '123 Harbor Street, Suite 4, Stuart, FL 34994. Mon to Fri 7 am to 5 pm, late until 7 pm Tue and Thu, Sat 8 am to 1 pm.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
