<?php
/**
 * Title: Map card
 * Slug: keel/map-card
 * Categories: keel/location
 * Keywords: map, directions, address, hours, card
 * Viewport Width: 600
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_map = get_theme_file_uri( 'assets/images/placeholder-map.svg' );
?>
<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-card">
	<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","className":"keel-card__media"} -->
	<figure class="wp-block-image size-full keel-card__media"><img src="<?php echo esc_url( $keel_map ); ?>" alt="<?php esc_attr_e( 'Map of the area around the office', 'keel' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
	<!-- /wp:image -->

	<!-- wp:heading {"level":3,"fontSize":"lg"} -->
	<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Find us', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"}}} -->
	<p style="font-size:0.9375rem"><?php esc_html_e( '123 Harbor Street, Suite 4', 'keel' ); ?><br><?php esc_html_e( 'Stuart, FL 34994', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size"><?php esc_html_e( 'Open daily 9 am to 5 pm, closed Tuesdays in summer.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"className":"keel-card-footer"} -->
	<div class="wp-block-buttons keel-card-footer">
		<!-- wp:button {"className":"is-style-icon-map"} -->
		<div class="wp-block-button is-style-icon-map"><a class="wp-block-button__link wp-element-button" href="#directions"><?php esc_html_e( 'Get directions', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:paragraph {"className":"is-style-small-print"} -->
	<p class="is-style-small-print"><?php esc_html_e( 'Paste your map link into the button. The theme embeds no maps, so nothing loads from another site.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
