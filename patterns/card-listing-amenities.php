<?php
/**
 * Title: Card: listing with amenities
 * Slug: keel/card-listing-amenities
 * Categories: keel/cards
 * Keywords: card, listing, stay, amenities, chips, price
 * Viewport Width: 480
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image     = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
$keel_meta      = array(
	array( 'map-pin', __( 'Riverside', 'keel' ) ),
	array( 'star', __( '4.8 (96)', 'keel' ) ),
	array( 'clock', __( 'Check-in from 3 pm', 'keel' ) ),
);
$keel_amenities = array( __( 'Wi-Fi', 'keel' ), __( 'Parking', 'keel' ), __( 'Pool', 'keel' ), __( 'Pets welcome', 'keel' ) );
?>
<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-card">
	<!-- wp:cover {"url":"<?php echo esc_url( $keel_image ); ?>","dimRatio":0,"contentPosition":"top left","className":"keel-card__media","style":{"dimensions":{"aspectRatio":"4/3"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-cover has-custom-content-position is-position-top-left keel-card__media" style="aspect-ratio:4/3;"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $keel_image ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container">
		<!-- wp:paragraph {"className":"keel-tag"} -->
		<p class="keel-tag"><?php echo esc_html( __( 'Stay', 'keel' ) ); ?></p>
		<!-- /wp:paragraph -->
	</div></div>
	<!-- /wp:cover -->

	<!-- wp:heading {"level":3,"fontSize":"lg"} -->
	<h3 class="wp-block-heading has-lg-font-size"><a href="#listing"><?php echo esc_html( __( 'The Boathouse Inn', 'keel' ) ); ?></a></h3>
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

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<?php foreach ( $keel_amenities as $keel_amenity ) : ?>
		<!-- wp:paragraph {"className":"keel-chip"} -->
		<p class="keel-chip"><?php echo esc_html( $keel_amenity ); ?></p>
		<!-- /wp:paragraph -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"}}} -->
	<p style="font-size:0.9375rem"><?php echo esc_html( __( 'Twelve rooms over the water, breakfast on the deck and bikes at the door.', 'keel' ) ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group keel-card-footer">
		<!-- wp:paragraph {"className":"keel-price"} -->
		<p class="keel-price"><span class="keel-price__label"><?php echo esc_html( __( 'Per night', 'keel' ) ); ?></span> <?php echo esc_html( '$210' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"fontSize":"sm"} -->
			<div class="wp-block-button has-custom-font-size has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#rates"><?php echo esc_html( __( 'Check rates', 'keel' ) ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
