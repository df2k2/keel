<?php
/**
 * Title: Listing grid
 * Slug: keel/listing-grid
 * Categories: keel/blog
 * Keywords: listing, grid, cards, query
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Latest listings', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":22,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"enhancedPagination":true,"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","className":"is-style-soft"} /-->

				<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->

				<!-- wp:post-excerpt {"excerptLength":18} /-->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"fontSize":"sm"} -->
					<div class="wp-block-button has-custom-font-size has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Enquire', 'keel' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-ghost","fontSize":"sm"} -->
					<div class="wp-block-button has-custom-font-size is-style-ghost has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="tel:+15555550100"><?php esc_html_e( 'Call', 'keel' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
			<!-- wp:query-pagination-previous /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

		<!-- wp:query-no-results -->
			<!-- wp:pattern {"slug":"keel/no-results"} /-->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
