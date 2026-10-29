<?php
/**
 * Title: Before and after
 * Slug: keel/before-after
 * Categories: keel/trust
 * Keywords: before, after, results, gallery
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-square.svg' );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"className":"keel-before-after","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull keel-before-after" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Real results', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"full","className":"is-style-framed"} -->
			<figure class="wp-block-image size-full is-style-framed"><img src="<?php echo esc_url( $keel_image ); ?>" alt="<?php esc_attr_e( 'Before the work: the original condition', 'keel' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Before', 'keel' ); ?></figcaption></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"full","className":"is-style-framed"} -->
			<figure class="wp-block-image size-full is-style-framed"><img src="<?php echo esc_url( $keel_image ); ?>" alt="<?php esc_attr_e( 'After the work: the finished result', 'keel' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'After', 'keel' ); ?></figcaption></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size"><?php esc_html_e( 'Photos shared with the written consent of the people involved. Results vary from case to case.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
