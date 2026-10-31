<?php
/**
 * Title: Blog: grid
 * Slug: keel/blog-grid
 * Categories: keel/blog
 * Keywords: blog, posts, grid, cards
 * Viewport Width: 1400
 * Inserter: yes
 * Block Types: core/query
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:query {"queryId":11,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"enhancedPagination":true,"align":"wide"} -->
<div class="wp-block-query alignwide">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","className":"is-style-soft"} /-->

				<!-- wp:post-title {"isLink":true,"level":2,"fontSize":"lg"} /-->

				<!-- wp:post-date {"fontSize":"sm"} /-->

				<!-- wp:post-excerpt {"moreText":"<?php esc_attr_e( 'Read more', 'keel' ); ?>","excerptLength":20} /-->
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
