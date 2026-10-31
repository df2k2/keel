<?php
/**
 * Title: Tiles grid
 * Slug: keel/tiles-grid
 * Categories: keel/cards
 * Keywords: tiles, grid, regions, covers
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-portrait.svg' );
$keel_tiles = array(
	array( __( 'Region', 'keel' ), __( 'Harbor district', 'keel' ), __( '12 places to see', 'keel' ), __( 'Top pick', 'keel' ) ),
	array( __( 'Region', 'keel' ), __( 'North beach', 'keel' ), __( '8 places to see', 'keel' ), '' ),
	array( __( 'Region', 'keel' ), __( 'River bend', 'keel' ), __( '9 places to see', 'keel' ), '' ),
	array( __( 'Region', 'keel' ), __( 'Old town', 'keel' ), __( '15 places to see', 'keel' ), __( 'New', 'keel' ) ),
	array( __( 'Region', 'keel' ), __( 'The islands', 'keel' ), __( '6 places to see', 'keel' ), '' ),
	array( __( 'Region', 'keel' ), __( 'Inland trails', 'keel' ), __( '7 places to see', 'keel' ), '' ),
);
?>
<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"16rem"}} -->
<div class="wp-block-group alignwide">
	<?php foreach ( $keel_tiles as $keel_tile ) : ?>
	<!-- wp:cover {"url":"<?php echo esc_url( $keel_image ); ?>","dimRatio":0,"contentPosition":"bottom left","className":"is-style-tile","layout":{"type":"constrained"}} -->
	<div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-tile"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $keel_image ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"keel-tag"} -->
			<p class="keel-tag"><?php echo esc_html( $keel_tile[0] ); ?></p>
			<!-- /wp:paragraph -->
			<?php if ( '' !== $keel_tile[3] ) : ?>
			<!-- wp:paragraph {"className":"keel-stamp"} -->
			<p class="keel-stamp"><?php echo esc_html( $keel_tile[3] ); ?></p>
			<!-- /wp:paragraph -->
			<?php endif; ?>
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":3,"fontSize":"xl"} -->
			<h3 class="wp-block-heading has-xl-font-size"><a href="#place"><?php echo esc_html( $keel_tile[1] ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php echo esc_html( $keel_tile[2] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div></div>
	<!-- /wp:cover -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
