<?php
/**
 * Title: Page: landing offer
 * Slug: keel/page-landing-offer
 * Categories: keel/layouts
 * Keywords: page, landing, offer, campaign, layout
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_avatar = get_theme_file_uri( 'assets/images/placeholder-avatar.svg' );
?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size"><strong><?php esc_html_e( 'Rated 4.9 from 2,300 reviews', 'keel' ); ?></strong> · <?php esc_html_e( 'Same-week appointments', 'keel' ); ?> · <?php esc_html_e( '0% payment plans', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/hero-booking"} /-->

<!-- wp:pattern {"slug":"keel/features-icons"} /-->

<!-- wp:pattern {"slug":"keel/payment-plan-band"} /-->

<!-- wp:pattern {"slug":"keel/before-after"} /-->

<!-- wp:pattern {"slug":"keel/media-text-steps"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"36rem"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"className":"is-style-card","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group is-style-card">
		<!-- wp:image {"lightbox":{"enabled":false},"width":"96px","height":"96px","sizeSlug":"full","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( $keel_avatar ); ?>" alt="" style="width:96px;height:96px"/></figure>
		<!-- /wp:image -->

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":2,"fontSize":"lg"} -->
			<h2 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'You will see Jordan Lee', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Lead specialist, 20 years of experience, rated 4.9 from 310 reviews.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/testimonials-grid"} /-->

<!-- wp:pattern {"slug":"keel/offer-card"} /-->

<!-- wp:pattern {"slug":"keel/contact-shell"} /-->

<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"36rem"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:paragraph {"align":"center","className":"is-style-lead"} -->
	<p class="has-text-align-center is-style-lead"><?php esc_html_e( 'Still thinking about it? Book the free assessment. The decision stays yours.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
