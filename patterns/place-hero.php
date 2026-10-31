<?php
/**
 * Title: Place hero
 * Slug: keel/place-hero
 * Categories: keel/places
 * Keywords: place, hero, cover, stamp, region
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
?>
<!-- wp:cover {"url":"<?php echo esc_url( $keel_image ); ?>","dimRatio":55,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":64,"minHeightUnit":"vh","contentPosition":"bottom left","align":"full","className":"keel-place-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-left keel-place-hero" style="min-height:64vh"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $keel_image ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-55 has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"keel-tag"} -->
		<p class="keel-tag"><?php esc_html_e( 'Region', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-stamp"} -->
		<p class="keel-stamp"><?php esc_html_e( 'Top pick', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"level":1,"className":"is-style-accent","fontSize":"display"} -->
	<h1 class="wp-block-heading is-style-accent has-display-font-size">
	<?php
	/* translators: 1: opening em tag, 2: closing em tag. */
	printf( esc_html__( 'Harbor district, %1$swhere the town meets the water%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"lg"} -->
	<p class="has-lg-font-size"><?php esc_html_e( 'Working docks, the Saturday market, a beach ten minutes from the coffee, and the best sunset bench in the county.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-light"} -->
		<div class="wp-block-button is-style-light"><a class="wp-block-button__link wp-element-button" href="#things-to-do"><?php esc_html_e( 'Things to do here', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline-light"} -->
		<div class="wp-block-button is-style-outline-light"><a class="wp-block-button__link wp-element-button" href="#map"><?php esc_html_e( 'See the map', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div></div>
<!-- /wp:cover -->
