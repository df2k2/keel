<?php
/**
 * Title: Press kit
 * Slug: keel/press-kit
 * Categories: keel/company
 * Keywords: press, media, downloads, logo, photos
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-square.svg' );
$keel_rows  = array(
	array( __( 'Logo pack', 'keel' ), __( 'SVG and PNG, light and dark, 2 MB', 'keel' ) ),
	array( __( 'Photo library', 'keel' ), __( 'Forty images, credited, free for editorial use, 180 MB', 'keel' ) ),
	array( __( 'Fact sheet', 'keel' ), __( 'Who we are, the numbers and the people, 1 page', 'keel' ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"44rem"}} -->
<div class="wp-block-group">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Press kit', 'keel' ); ?></h2>
	<!-- /wp:heading -->

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
				<h3 class="wp-block-heading has-md-font-size"><a href="#download"><?php echo esc_html( $keel_row[0] ); ?></a></h3>
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

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Press enquiries: ', 'keel' ); ?><a href="mailto:press@example.com">press@example.com</a>. <?php esc_html_e( 'Same-day replies on weekdays.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
