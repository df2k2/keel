<?php
/**
 * Title: Mini list
 * Slug: keel/mini-list
 * Categories: keel/cards
 * Keywords: mini list, compact, rows, thumbnails
 * Viewport Width: 600
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-square.svg' );
$keel_rows  = array(
	array( __( 'Low tide at the sandbar', 'keel' ), __( 'Harbor district · 15 min walk', 'keel' ) ),
	array( __( 'The Saturday market', 'keel' ), __( 'Riverside green · Saturdays from 8 am', 'keel' ) ),
	array( __( 'Lighthouse climb', 'keel' ), __( 'North beach · $8, book ahead', 'keel' ) ),
);
?>
<!-- wp:group {"className":"keel-mini-list","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group keel-mini-list">
	<?php foreach ( $keel_rows as $keel_row ) : ?>
	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile">
		<!-- wp:column {"verticalAlignment":"center","width":"72px"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:72px">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"72px","height":"72px","sizeSlug":"full","className":"is-style-soft"} -->
			<figure class="wp-block-image size-full is-resized is-style-soft"><img src="<?php echo esc_url( $keel_image ); ?>" alt="" style="width:72px;height:72px"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":3,"fontSize":"md"} -->
			<h3 class="wp-block-heading has-md-font-size"><a href="#listing"><?php echo esc_html( $keel_row[0] ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php echo esc_html( $keel_row[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
