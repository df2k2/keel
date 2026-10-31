<?php
/**
 * Title: Rail of cards
 * Slug: keel/rail-cards
 * Categories: keel/cards
 * Keywords: rail, carousel, scroll, cards, listings
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
$keel_cards = array(
	array( __( 'Beach', 'keel' ), __( 'Harbor Point Beach', 'keel' ), __( 'A calm lagoon behind the reef, warm shallows for small children and shade under the sea grapes.', 'keel' ), __( 'From', 'keel' ), '$48', array( array( 'clock', __( '2 hours', 'keel' ) ), array( 'map-pin', __( 'Harbor district', 'keel' ) ), array( 'star', __( '4.9 (312)', 'keel' ) ) ) ),
	array( __( 'Tour', 'keel' ), __( 'Sunrise paddle on the inlet', 'keel' ), __( 'Two hours on glassy water before the wind picks up, with a guide who knows every sandbar.', 'keel' ), __( 'Per person', 'keel' ), '$65', array( array( 'clock', __( 'Half day', 'keel' ) ), array( 'map-pin', __( 'Town dock', 'keel' ) ), array( 'star', __( '5.0 (41)', 'keel' ) ) ) ),
	array( __( 'Food', 'keel' ), __( 'The Boathouse Kitchen', 'keel' ), __( 'Fish from the morning boats, a long deck and a short menu that changes with the catch.', 'keel' ), __( 'Mains from', 'keel' ), '$24', array( array( 'clock', __( 'Noon to 10 pm', 'keel' ) ), array( 'map-pin', __( 'Riverside', 'keel' ) ), array( 'star', __( '4.7 (820)', 'keel' ) ) ) ),
	array( __( 'Rental', 'keel' ), __( 'Old Town Bike Hire', 'keel' ), __( 'Comfortable cruisers, child seats and a map of the quiet lanes, open every day of the season.', 'keel' ), __( 'Per day', 'keel' ), '$28', array( array( 'clock', __( '9 am to 6 pm', 'keel' ) ), array( 'map-pin', __( 'Old town', 'keel' ) ), array( 'star', __( '4.9 (233)', 'keel' ) ) ) ),
	array( __( 'Stay', 'keel' ), __( 'The Boathouse Inn', 'keel' ), __( 'Twelve rooms over the water, breakfast on the deck and bikes at the door.', 'keel' ), __( 'Per night', 'keel' ), '$210', array( array( 'map-pin', __( 'Riverside', 'keel' ) ), array( 'star', __( '4.8 (96)', 'keel' ) ), array( 'clock', __( 'Check-in from 3 pm', 'keel' ) ) ) ),
);
?>
<!-- wp:group {"align":"wide","className":"is-style-rail","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"stretch"}} -->
<div class="wp-block-group alignwide is-style-rail">
	<?php
	foreach ( $keel_cards as $keel_card ) :
		$keel_meta = $keel_card[5];
		?>
	<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group is-style-card">
		<!-- wp:cover {"url":"<?php echo esc_url( $keel_image ); ?>","dimRatio":0,"contentPosition":"top left","className":"keel-card__media","style":{"dimensions":{"aspectRatio":"4/3"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-cover has-custom-content-position is-position-top-left keel-card__media" style="aspect-ratio:4/3;"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $keel_image ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container">
			<!-- wp:paragraph {"className":"keel-tag"} -->
			<p class="keel-tag"><?php echo esc_html( $keel_card[0] ); ?></p>
			<!-- /wp:paragraph -->
		</div></div>
		<!-- /wp:cover -->

		<!-- wp:heading {"level":3,"fontSize":"lg"} -->
		<h3 class="wp-block-heading has-lg-font-size"><a href="#listing"><?php echo esc_html( $keel_card[1] ); ?></a></h3>
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
		<p style="font-size:0.9375rem"><?php echo esc_html( $keel_card[2] ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group keel-card-footer">
			<!-- wp:paragraph {"className":"keel-price"} -->
			<p class="keel-price"><span class="keel-price__label"><?php echo esc_html( $keel_card[3] ); ?></span> <?php echo esc_html( $keel_card[4] ); ?></p>
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
	</div>
	<!-- /wp:group -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
