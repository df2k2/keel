<?php
/**
 * Title: Showcase: demos row
 * Slug: keel-demo/showcase-demos
 * Description: The dental practice demo, the next packs, a pattern teaser and the style guide teaser.
 * Inserter: no
 *
 * @package KeelDemo
 */

defined( 'ABSPATH' ) || exit;

$keel_demo_dental_shot = file_exists( plugin_dir_path( Keel_Demo\FILE ) . 'assets/dental.jpg' ) ? plugins_url( 'assets/dental.jpg', Keel_Demo\FILE ) : '';
$keel_demo_teasers     = array(
	array( 'hero', __( 'Heroes', 'keel-demo' ), __( 'Image, split, video, text and booking openings.', 'keel-demo' ) ),
	array( 'services', __( 'Services', 'keel-demo' ), __( 'Grids with prices, tiles, tabs and the service detail.', 'keel-demo' ) ),
	array( 'pricing', __( 'Pricing', 'keel-demo' ), __( 'Price tables, comparison table, payment plans and offers.', 'keel-demo' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Demos', 'keel-demo' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<?php if ( '' !== $keel_demo_dental_shot ) : ?>
				<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","className":"is-style-soft"} -->
				<figure class="wp-block-image size-full is-style-soft"><img src="<?php echo esc_url( $keel_demo_dental_shot ); ?>" alt="<?php esc_attr_e( 'The Bright Harbor Dental home page', 'keel-demo' ); ?>" style="aspect-ratio:16/9;object-fit:cover" width="600" height="450" loading="lazy" decoding="async"/></figure>
				<!-- /wp:image -->
				<?php endif; ?>

				<!-- wp:paragraph {"className":"keel-eyebrow"} -->
				<p class="keel-eyebrow"><?php esc_html_e( 'Dental pack', 'keel-demo' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading"><?php esc_html_e( 'Bright Harbor Dental', 'keel-demo' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'A complete, fictional practice site: home, treatments, two service pages, dentists and a profile, prices and plans, reviews, location, contact, an offer landing page and FAQ, all from the twenty-one dental patterns that ship in the theme.', 'keel-demo' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/dental/' ) ); ?>"><?php esc_html_e( 'Open the dental demo', 'keel-demo' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-bordered">
				<!-- wp:paragraph {"className":"keel-eyebrow"} -->
				<p class="keel-eyebrow"><?php esc_html_e( 'Next', 'keel-demo' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'More vertical packs', 'keel-demo' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'The dental pack sets the shape: sections with the vertical\'s copy and prices, pages that compose them. Home services and legal practices are next in line.', 'keel-demo' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-surface","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface">
				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'The living style guide', 'keel-demo' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Colours with contrast ratios, type, spacing, shape, every block style: read from the active variation each time the page renders.', 'keel-demo' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="<?php echo esc_url( home_url( '/style-guide/' ) ); ?>"><?php esc_html_e( 'Open the style guide', 'keel-demo' ); ?></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Patterns', 'keel-demo' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $keel_demo_teasers as $keel_demo_teaser ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><a href="<?php echo esc_url( home_url( '/patterns/' . $keel_demo_teaser[0] . '/' ) ); ?>"><?php echo esc_html( $keel_demo_teaser[1] ); ?></a></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html( $keel_demo_teaser[2] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><a href="<?php echo esc_url( home_url( '/patterns/' ) ); ?>"><?php esc_html_e( 'All seventeen categories', 'keel-demo' ); ?></a></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
