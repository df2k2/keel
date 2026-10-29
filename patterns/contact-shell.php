<?php
/**
 * Title: Contact shell
 * Slug: keel/contact-shell
 * Categories: keel/contact
 * Keywords: contact, form, address
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Get in touch', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-bordered">
				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Insert your form block here. Keel ships no forms of its own; any form plugin that outputs standard blocks will inherit these styles.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Address', 'keel' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( '123 Harbor Street, Suite 4', 'keel' ); ?><br><?php esc_html_e( 'Stuart, FL 34994', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Hours', 'keel' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Monday to Friday: 8am to 6pm', 'keel' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Saturday: 9am to 1pm', 'keel' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Phone', 'keel' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><a href="tel:+15555550100">(555) 555-0100</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
