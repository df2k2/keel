<?php
/**
 * Title: Category tiles
 * Slug: keel/category-tiles
 * Categories: keel/services
 * Keywords: categories, tiles, icons, links
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_tiles = array(
	array( 'check', __( 'Check-ups', 'keel' ), '#services' ),
	array( 'shield', __( 'Protection', 'keel' ), '#plans' ),
	array( 'clock', __( 'Same day', 'keel' ), '#urgent' ),
	array( 'star', __( 'Premium', 'keel' ), '#premium' ),
	array( 'map-pin', __( 'Locations', 'keel' ), '#location' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center","fontSize":"xl"} -->
	<h2 class="wp-block-heading has-text-align-center has-xl-font-size"><?php esc_html_e( 'Browse by category', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"11rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_tiles as $keel_tile ) : ?>
		<!-- wp:group {"className":"is-style-bordered","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group is-style-bordered">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"32px","height":"32px","sizeSlug":"full","className":"keel-icon"} -->
			<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_tile[0] . '.svg' ) ); ?>" alt="" style="width:32px;height:32px"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><a href="<?php echo esc_url( $keel_tile[2] ); ?>"><strong><?php echo esc_html( $keel_tile[1] ); ?></strong></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
