<?php
/**
 * Title: Listing: included and not included
 * Slug: keel/listing-included
 * Categories: keel/places
 * Keywords: listing, included, excluded, checks, crosses
 * Viewport Width: 1000
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_included = array( __( 'Breakfast on the deck', 'keel' ), __( 'Two bikes per room', 'keel' ), __( 'Kayaks at the dock', 'keel' ), __( 'Parking at the door', 'keel' ), __( 'Late checkout on Sundays', 'keel' ) );
$keel_excluded = array( __( 'Dinner (the kitchen next door is open late)', 'keel' ), __( 'Boat tours', 'keel' ), __( 'Pets in the water-side rooms', 'keel' ), __( 'Airport transfers', 'keel' ) );
?>
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:heading {"level":3,"fontSize":"lg"} -->
		<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Included', 'keel' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:list {"className":"is-style-checkmarks"} -->
		<ul class="wp-block-list is-style-checkmarks">
			<?php foreach ( $keel_included as $keel_item ) : ?>
			<!-- wp:list-item -->
			<li><?php echo esc_html( $keel_item ); ?></li>
			<!-- /wp:list-item -->
			<?php endforeach; ?>
		</ul>
		<!-- /wp:list -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:heading {"level":3,"fontSize":"lg"} -->
		<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Not included', 'keel' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:list {"className":"is-style-crosses"} -->
		<ul class="wp-block-list is-style-crosses">
			<?php foreach ( $keel_excluded as $keel_item ) : ?>
			<!-- wp:list-item -->
			<li><?php echo esc_html( $keel_item ); ?></li>
			<!-- /wp:list-item -->
			<?php endforeach; ?>
		</ul>
		<!-- /wp:list -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
