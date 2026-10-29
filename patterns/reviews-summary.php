<?php
/**
 * Title: Reviews summary
 * Slug: keel/reviews-summary
 * Categories: keel/testimonials
 * Keywords: reviews, rating, stars
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-card">
		<!-- wp:columns {"verticalAlignment":"center"} -->
		<div class="wp-block-columns are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%">
				<!-- wp:paragraph {"align":"center","className":"keel-stat__number"} -->
				<p class="has-text-align-center keel-stat__number">4.9</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
				<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/star.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
				<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/star.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
				<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/star.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
				<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/star.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
				<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/star.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
				<!-- /wp:image -->
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Rated 4.9 out of 5 from 312 reviews on Google and Yelp.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"25%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:25%">
				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-ghost"} -->
					<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#reviews"><?php esc_html_e( 'Read our reviews', 'keel' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
