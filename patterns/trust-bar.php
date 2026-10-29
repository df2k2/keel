<?php
/**
 * Title: Trust bar
 * Slug: keel/trust-bar
 * Categories: keel/trust
 * Keywords: trust, badges, reviews
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/shield.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image -->

				<!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph -->
					<p><strong><?php esc_html_e( 'Licensed and insured', 'keel' ); ?></strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"sm"} -->
					<p class="has-sm-font-size"><?php esc_html_e( 'Fully covered on every job', 'keel' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/star.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image -->

				<!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph -->
					<p><strong><?php esc_html_e( '4.9 rating', 'keel' ); ?></strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"sm"} -->
					<p class="has-sm-font-size"><?php esc_html_e( 'From more than 300 reviews', 'keel' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/clock.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image -->

				<!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph -->
					<p><strong><?php esc_html_e( 'Same-day service', 'keel' ); ?></strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"sm"} -->
					<p class="has-sm-font-size"><?php esc_html_e( 'Call before noon, seen today', 'keel' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/check.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image -->

				<!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph -->
					<p><strong><?php esc_html_e( 'Workmanship guarantee', 'keel' ); ?></strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"sm"} -->
					<p class="has-sm-font-size"><?php esc_html_e( 'Two years on every repair', 'keel' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
