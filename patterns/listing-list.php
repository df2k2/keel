<?php
/**
 * Title: Listing list
 * Slug: keel/listing-list
 * Categories: keel/blog
 * Keywords: listing, list, rows, query
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
	<h2 class="wp-block-heading"><?php esc_html_e( 'All listings', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":23,"query":{"perPage":8,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
	<div class="wp-block-query">
		<!-- wp:post-template -->
			<!-- wp:group {"className":"is-style-bordered","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group is-style-bordered">
				<!-- wp:post-featured-image {"isLink":true,"width":"12rem","aspectRatio":"4/3","className":"is-style-soft"} /-->

				<!-- wp:group {"layout":{"type":"constrained"}} -->
				<div class="wp-block-group">
					<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->

					<!-- wp:post-excerpt {"excerptLength":24} /-->

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
