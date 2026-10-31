<?php
/**
 * Title: Page: listing
 * Slug: keel/page-listing
 * Categories: keel/layouts
 * Keywords: page, listing, gallery, price card, reviews
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: One listing: breadcrumb, title and meta, a mosaic gallery, the body beside a sticky price card, what is included, reviews, a map and more listings.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_meta = array(
	array( 'map-pin', __( 'Riverside, Harbor district', 'keel' ) ),
	array( 'star', __( '4.8 (96 reviews)', 'keel' ) ),
	array( 'clock', __( 'Check-in from 3 pm', 'keel' ) ),
);
?>
<!-- wp:pattern {"slug":"keel/breadcrumb-row"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40)">
	<!-- wp:paragraph {"className":"keel-eyebrow"} -->
	<p class="keel-eyebrow"><?php esc_html_e( 'Stay', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"className":"is-style-accent","fontSize":"xxxl"} -->
	<h1 class="wp-block-heading is-style-accent has-xxxl-font-size">
	<?php
	/* translators: 1: opening em tag, 2: closing em tag. */
	printf( esc_html__( 'The Boathouse %1$sInn%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:group {"className":"keel-meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group keel-meta">
		<?php foreach ( $keel_meta as $keel_item ) : ?>
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"14px","height":"14px","sizeSlug":"full","className":"keel-icon"} -->
			<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_item[0] . '.svg' ) ); ?>" alt="" style="width:14px;height:14px"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html( $keel_item[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:pattern {"slug":"keel/listing-gallery"} /-->
</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"62%"} -->
	<div class="wp-block-column" style="flex-basis:62%">
		<!-- wp:heading {"level":2} -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'About the inn', 'keel' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Twelve rooms over the water in a boathouse that stored nets until 1998. Floors creak, windows open, breakfast is on the deck and the bikes by the door are yours for the stay.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'The water-side rooms face the inlet and the sunrise; the garden rooms are quieter and a little bigger. Either way you are six minutes from the market and ten from the beach.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"38%"} -->
	<div class="wp-block-column" style="flex-basis:38%">
		<!-- wp:pattern {"slug":"keel/listing-price-card"} /-->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:pattern {"slug":"keel/listing-included"} /-->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/reviews-row"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"anchor":"map","layout":{"type":"constrained","contentSize":"40rem"}} -->
	<div class="wp-block-group" id="map">
		<!-- wp:pattern {"slug":"keel/map-card"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'More places to stay', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:pattern {"slug":"keel/rail-cards"} /-->
</div>
<!-- /wp:group -->
