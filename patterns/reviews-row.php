<?php
/**
 * Title: Reviews row
 * Slug: keel/reviews-row
 * Categories: keel/testimonials
 * Keywords: reviews, testimonials, stars, row
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_star    = get_theme_file_uri( 'assets/icons/star.svg' );
$keel_reviews = array(
	array( __( 'We followed the two-day plan to the letter and still found an hour for the sandbar. The tide note saved us.', 'keel' ), __( 'Maya R.', 'keel' ), __( 'Visited in March, review via Google', 'keel' ) ),
	array( __( 'The listing said quiet and it was quiet. Breakfast on the deck with the pelicans, every morning.', 'keel' ), __( 'Tom and Ines', 'keel' ), __( 'Stayed four nights, review via the site', 'keel' ) ),
	array( __( 'Booked the sunrise paddle on a whim. Best thing we did all week, and the kids still talk about the dolphins.', 'keel' ), __( 'The Okafor family', 'keel' ), __( 'Visited in April, review via Tripadvisor', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'What visitors say', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $keel_reviews as $keel_review ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<?php for ( $keel_i = 0; $keel_i < 5; $keel_i++ ) : ?>
					<!-- wp:image {"lightbox":{"enabled":false},"width":"18px","height":"18px","sizeSlug":"full","className":"keel-icon keel-rating__star"} -->
					<figure class="wp-block-image size-full is-resized keel-icon keel-rating__star"><img src="<?php echo esc_url( $keel_star ); ?>" alt="" style="width:18px;height:18px"/></figure>
					<!-- /wp:image -->
					<?php endfor; ?>
				</div>
				<!-- /wp:group -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html( $keel_review[0] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"keel-card-footer","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group keel-card-footer">
					<!-- wp:paragraph {"fontSize":"sm"} -->
					<p class="has-sm-font-size"><strong><?php echo esc_html( $keel_review[1] ); ?></strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"className":"is-style-small-print"} -->
					<p class="is-style-small-print"><?php echo esc_html( $keel_review[2] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
