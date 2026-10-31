<?php
/**
 * Title: Facts bar
 * Slug: keel/facts-bar
 * Categories: keel/trust
 * Keywords: facts, figures, band, icons, numbers
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_facts = array(
	array( 'calendar', __( 'Nov to Apr', 'keel' ), __( 'Best season', 'keel' ) ),
	array( 'clock', __( 'Low 70s', 'keel' ), __( 'Water temperature', 'keel' ) ),
	array( 'map-pin', __( '14 miles', 'keel' ), __( 'Of beaches', 'keel' ) ),
	array( 'star', '4.9', __( 'Visitor rating', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","className":"is-style-band keel-facts-bar","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-band keel-facts-bar" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_facts as $keel_fact ) : ?>
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"28px","height":"28px","sizeSlug":"full","className":"keel-icon"} -->
			<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_fact[0] . '.svg' ) ); ?>" alt="" style="width:28px;height:28px"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"keel-price"} -->
				<p class="keel-price"><?php echo esc_html( $keel_fact[1] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php echo esc_html( $keel_fact[2] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
