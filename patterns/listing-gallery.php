<?php
/**
 * Title: Listing gallery
 * Slug: keel/listing-gallery
 * Categories: keel/places
 * Keywords: listing, gallery, mosaic, photos
 * Viewport Width: 1200
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_wide   = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
$keel_square = get_theme_file_uri( 'assets/images/placeholder-square.svg' );
$keel_alts   = array( __( 'The inn from the water at dusk', 'keel' ), __( 'A room with the window open to the river', 'keel' ), __( 'Breakfast laid out on the deck', 'keel' ), __( 'Bikes lined up by the door', 'keel' ), __( 'The dock at low tide', 'keel' ) );
?>
<!-- wp:gallery {"linkTo":"none","align":"wide","className":"is-style-mosaic"} -->
<figure class="wp-block-gallery alignwide has-nested-images columns-default is-cropped is-style-mosaic">
	<?php foreach ( $keel_alts as $keel_i => $keel_alt ) : ?>
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
	<figure class="wp-block-image size-large"><img src="<?php echo esc_url( 0 === $keel_i % 2 ? $keel_wide : $keel_square ); ?>" alt="<?php echo esc_attr( $keel_alt ); ?>"/></figure>
	<!-- /wp:image -->
	<?php endforeach; ?>
</figure>
<!-- /wp:gallery -->
