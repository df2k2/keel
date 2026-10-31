<?php
/**
 * Title: Deal: featured
 * Slug: keel/deal-featured
 * Categories: keel/events
 * Keywords: deal, featured, offer, media and text
 * Viewport Width: 1200
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
?>
<!-- wp:media-text {"mediaType":"image","mediaWidth":45,"imageFill":true,"align":"wide","className":"is-style-card"} -->
<div class="wp-block-media-text alignwide is-stacked-on-mobile is-image-fill-element is-style-card" style="grid-template-columns:45% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( $keel_image ); ?>" alt="" class="size-full"/></figure><div class="wp-block-media-text__content">
	<!-- wp:paragraph {"className":"keel-status keel-status--accent"} -->
	<p class="keel-status keel-status--accent"><?php esc_html_e( 'This week only', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"className":"is-style-accent"} -->
	<h2 class="wp-block-heading is-style-accent">
	<?php
	/* translators: 1: opening em tag, 2: closing em tag. */
	printf( esc_html__( 'Third night %1$sfree%2$s at the inn', 'keel' ), '<em>', '</em>' );
	?>
	</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Book two nights at the Boathouse Inn before the end of April and stay a third on the house. Breakfast and the bikes included, as always.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group keel-card-footer">
		<!-- wp:paragraph {"className":"keel-price"} -->
		<p class="keel-price"><s>$630</s> $420 <span class="keel-price__label"><?php esc_html_e( 'for three nights', 'keel' ); ?></span></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-icon-arrow"} -->
			<div class="wp-block-button is-style-icon-arrow"><a class="wp-block-button__link wp-element-button" href="#deal"><?php esc_html_e( 'Claim the deal', 'keel' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:media-text -->
