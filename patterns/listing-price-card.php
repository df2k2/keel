<?php
/**
 * Title: Listing price card
 * Slug: keel/listing-price-card
 * Categories: keel/places
 * Keywords: listing, price, sticky, book, card
 * Viewport Width: 480
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_meta = array(
	array( 'star', __( '4.8 (96 reviews)', 'keel' ) ),
	array( 'map-pin', __( 'Riverside, 6 min walk to the market', 'keel' ) ),
);
?>
<!-- wp:group {"className":"is-style-card","style":{"position":{"type":"sticky","top":"1rem"},"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-card">
	<!-- wp:paragraph {"className":"keel-price"} -->
	<p class="keel-price">$210 <span class="keel-price__label"><?php esc_html_e( 'per night', 'keel' ); ?></span></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"keel-meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group keel-meta">
		<?php foreach ( $keel_meta as $keel_item ) : ?>
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"14px","height":"14px","sizeSlug":"full","className":"keel-icon"} -->
			<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_item[0] . '.svg' ) ); ?>" alt="" style="width:14px;height:14px"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html( $keel_item[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"width":100,"className":"is-style-icon-calendar"} -->
		<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-icon-calendar"><a class="wp-block-button__link wp-element-button" href="#book"><?php esc_html_e( 'Check availability', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"width":100,"className":"is-style-soft"} -->
		<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-soft"><a class="wp-block-button__link wp-element-button" href="#message"><?php esc_html_e( 'Message the host', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:paragraph {"className":"is-style-small-print"} -->
	<p class="is-style-small-print"><?php esc_html_e( 'Free cancellation up to seven days before arrival. No booking fees on this site.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
