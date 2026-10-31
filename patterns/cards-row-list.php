<?php
/**
 * Title: Cards: row list
 * Slug: keel/cards-row-list
 * Categories: keel/cards
 * Keywords: cards, rows, list, listings
 * Viewport Width: 1000
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
$keel_rows  = array(
	array( __( 'Tour', 'keel' ), __( 'Sunrise paddle on the inlet', 'keel' ), __( 'Two hours on glassy water before the wind picks up, with a guide who knows every sandbar.', 'keel' ), __( 'Per person', 'keel' ), '$65', array( array( 'clock', __( 'Half day', 'keel' ) ), array( 'map-pin', __( 'Town dock', 'keel' ) ), array( 'star', __( '5.0 (41)', 'keel' ) ) ) ),
	array( __( 'Food', 'keel' ), __( 'The Boathouse Kitchen', 'keel' ), __( 'Fish from the morning boats, a long deck and a short menu that changes with the catch.', 'keel' ), __( 'Mains from', 'keel' ), '$24', array( array( 'clock', __( 'Noon to 10 pm', 'keel' ) ), array( 'map-pin', __( 'Riverside', 'keel' ) ), array( 'star', __( '4.7 (820)', 'keel' ) ) ) ),
	array( __( 'Rental', 'keel' ), __( 'Old Town Bike Hire', 'keel' ), __( 'Comfortable cruisers, child seats and a map of the quiet lanes, open every day of the season.', 'keel' ), __( 'Per day', 'keel' ), '$28', array( array( 'clock', __( '9 am to 6 pm', 'keel' ) ), array( 'map-pin', __( 'Old town', 'keel' ) ), array( 'star', __( '4.9 (233)', 'keel' ) ) ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group">
	<?php
	foreach ( $keel_rows as $keel_row ) :
		$keel_meta = $keel_row[5];
		?>
	<!-- wp:media-text {"mediaType":"image","mediaWidth":42,"imageFill":true,"className":"is-style-card"} -->
	<div class="wp-block-media-text is-stacked-on-mobile is-image-fill-element is-style-card" style="grid-template-columns:42% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( $keel_image ); ?>" alt="" class="size-full"/></figure><div class="wp-block-media-text__content">
		<!-- wp:paragraph {"className":"keel-tag"} -->
		<p class="keel-tag"><?php echo esc_html( $keel_row[0] ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":3,"fontSize":"lg"} -->
		<h3 class="wp-block-heading has-lg-font-size"><a href="#listing"><?php echo esc_html( $keel_row[1] ); ?></a></h3>
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
		<p style="font-size:0.9375rem"><?php echo esc_html( $keel_row[2] ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group keel-card-footer">
			<!-- wp:paragraph {"className":"keel-price"} -->
			<p class="keel-price"><span class="keel-price__label"><?php echo esc_html( $keel_row[3] ); ?></span> <?php echo esc_html( $keel_row[4] ); ?></p>
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
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
