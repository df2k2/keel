<?php
/**
 * Title: Review card
 * Slug: keel/review-card
 * Categories: keel/testimonials
 * Keywords: review, stars, quote, source, card
 * Viewport Width: 480
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_star = get_theme_file_uri( 'assets/icons/star.svg' );
?>
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
	<p><?php echo esc_html( __( 'We followed the two-day plan to the letter and still found an hour for the sandbar. The tide note saved us.', 'keel' ) ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"keel-card-footer","style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group keel-card-footer">
		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><strong><?php echo esc_html( __( 'Maya R.', 'keel' ) ); ?></strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"is-style-small-print"} -->
		<p class="is-style-small-print"><?php echo esc_html( __( 'Visited in March, review via Google', 'keel' ) ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
