<?php
/**
 * Title: Hero: video poster
 * Slug: keel/hero-video
 * Categories: keel/hero
 * Keywords: hero, video, poster
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
?>
<!-- wp:cover {"url":"<?php echo esc_url( $keel_image ); ?>","dimRatio":60,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":60,"minHeightUnit":"vh","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:60vh"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $keel_image ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:heading {"level":1,"fontSize":"xxxl"} -->
	<h1 class="wp-block-heading has-xxxl-font-size"><?php esc_html_e( 'See how we work', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"lg"} -->
	<p class="has-lg-font-size"><?php esc_html_e( 'Two minutes with our team, from the first call to the final walkthrough.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:image {"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/play.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#video"><?php esc_html_e( 'Watch the video', 'keel' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
