<?php
/**
 * Title: Tile
 * Slug: keel/tile
 * Categories: keel/cards
 * Keywords: tile, cover, photo, stamp, region
 * Viewport Width: 480
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-portrait.svg' );
?>
<!-- wp:group {"layout":{"type":"constrained","contentSize":"22rem","justifyContent":"left"}} -->
<div class="wp-block-group">
	<!-- wp:cover {"url":"<?php echo esc_url( $keel_image ); ?>","dimRatio":0,"contentPosition":"bottom left","className":"is-style-tile","layout":{"type":"constrained"}} -->
	<div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-tile"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $keel_image ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"keel-tag"} -->
			<p class="keel-tag"><?php echo esc_html( __( 'Region', 'keel' ) ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"keel-stamp"} -->
			<p class="keel-stamp"><?php echo esc_html( __( 'Top pick', 'keel' ) ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":3,"fontSize":"xl"} -->
			<h3 class="wp-block-heading has-xl-font-size"><a href="#place"><?php echo esc_html( __( 'Harbor district', 'keel' ) ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php echo esc_html( __( '12 places to see', 'keel' ) ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div></div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->
