<?php
/**
 * Title: Rating
 * Slug: keel/rating
 * Categories: keel/elements
 * Keywords: rating, stars, reviews, score
 * Viewport Width: 480
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_star = get_theme_file_uri( 'assets/icons/star.svg' );
?>
<!-- wp:group {"className":"keel-rating","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group keel-rating">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<?php for ( $keel_i = 0; $keel_i < 5; $keel_i++ ) : ?>
		<!-- wp:image {"lightbox":{"enabled":false},"width":"18px","height":"18px","sizeSlug":"full","className":"keel-icon keel-rating__star"} -->
		<figure class="wp-block-image size-full is-resized keel-icon keel-rating__star"><img src="<?php echo esc_url( $keel_star ); ?>" alt="" style="width:18px;height:18px"/></figure>
		<!-- /wp:image -->
		<?php endfor; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"keel-price"} -->
	<p class="keel-price">4.9</p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size"><?php esc_html_e( '312 reviews', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
