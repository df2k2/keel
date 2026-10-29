<?php
/**
 * Title: Hero: image
 * Slug: keel/hero-image
 * Categories: keel/hero
 * Keywords: hero, cover, image
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
	<h1 class="wp-block-heading has-xxxl-font-size"><?php esc_html_e( 'Trusted local service, done right the first time', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"lg"} -->
	<p class="has-lg-font-size"><?php esc_html_e( 'Licensed, insured and local. Tell us what you need and we will be in touch today.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Get a quote', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#services"><?php esc_html_e( 'See services', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div></div>
<!-- /wp:cover -->
