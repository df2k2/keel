<?php
/**
 * Title: Card: row
 * Slug: keel/card-row
 * Categories: keel/cards
 * Keywords: card, row, media and text, horizontal, listing
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
$keel_meta  = array(
	array( 'clock', __( 'Half day', 'keel' ) ),
	array( 'map-pin', __( 'Departs from the town dock', 'keel' ) ),
	array( 'star', __( '5.0 (41)', 'keel' ) ),
);
?>
<!-- wp:media-text {"mediaType":"image","mediaWidth":42,"imageFill":true,"className":"is-style-card"} -->
<div class="wp-block-media-text is-stacked-on-mobile is-image-fill-element is-style-card" style="grid-template-columns:42% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( $keel_image ); ?>" alt="" class="size-full"/></figure><div class="wp-block-media-text__content">
	<!-- wp:paragraph {"className":"keel-tag"} -->
	<p class="keel-tag"><?php echo esc_html( __( 'Tour', 'keel' ) ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":3,"fontSize":"lg"} -->
	<h3 class="wp-block-heading has-lg-font-size"><a href="#listing"><?php echo esc_html( __( 'Sunrise paddle on the inlet', 'keel' ) ); ?></a></h3>
	<!-- /wp:heading -->

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

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"}}} -->
	<p style="font-size:0.9375rem"><?php echo esc_html( __( 'Two hours on glassy water before the wind picks up, with a guide who knows every sandbar.', 'keel' ) ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group keel-card-footer">
		<!-- wp:paragraph {"className":"keel-price"} -->
		<p class="keel-price"><span class="keel-price__label"><?php echo esc_html( __( 'Per person', 'keel' ) ); ?></span> <?php echo esc_html( '$65' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"fontSize":"sm"} -->
			<div class="wp-block-button has-custom-font-size has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#book"><?php echo esc_html( __( 'Book', 'keel' ) ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:media-text -->
