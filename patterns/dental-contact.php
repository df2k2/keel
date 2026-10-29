<?php
/**
 * Title: Dental page: contact
 * Slug: keel/dental-contact
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, page, contact, hours, directions
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_map = get_theme_file_uri( 'assets/images/placeholder-map.svg' );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1} -->
	<h1 class="wp-block-heading"><?php esc_html_e( 'Contact and directions', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'Call, book online or send a message. A person answers the phone during opening hours, and messages are answered within one working day.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"55%"} -->
		<div class="wp-block-column" style="flex-basis:55%">
			<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-bordered">
				<!-- wp:heading {"level":2,"fontSize":"lg"} -->
				<h2 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Send a message', 'keel' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Insert your form block here: name, email, phone, preferred time, message and a consent box. Keel ships no forms of its own; any form plugin that outputs standard blocks inherits these styles.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"full","className":"is-style-framed"} -->
			<figure class="wp-block-image size-full is-style-framed"><img src="<?php echo esc_url( $keel_map ); ?>" alt="<?php esc_attr_e( 'Map placeholder: 123 Harbor Street, Suite 4, Stuart, Florida', 'keel' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Free parking behind the building. The entrance is level, with a ramp from the car park.', 'keel' ); ?></figcaption></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"45%"} -->
		<div class="wp-block-column" style="flex-basis:45%">
			<!-- wp:heading {"level":2,"fontSize":"lg"} -->
			<h2 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Address', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Bright Harbor Dental', 'keel' ); ?><br><?php esc_html_e( '123 Harbor Street, Suite 4', 'keel' ); ?><br><?php esc_html_e( 'Stuart, FL 34994', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"fontSize":"lg"} -->
			<h2 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Hours', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Monday, Wednesday, Friday: 7 am to 5 pm', 'keel' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Tuesday and Thursday: 7 am to 7 pm', 'keel' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Saturday: 8 am to 1 pm', 'keel' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Sunday: closed, emergency line open', 'keel' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:heading {"level":2,"fontSize":"lg"} -->
			<h2 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Phone', 'keel' ); ?></h2>
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

<!-- wp:pattern {"slug":"keel/dental-urgent"} /-->

<!-- wp:pattern {"slug":"keel/dental-disclaimer"} /-->
