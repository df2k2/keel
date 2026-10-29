<?php
/**
 * Title: Blog: list
 * Slug: keel/blog-list
 * Categories: keel/blog
 * Keywords: blog, posts, list
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
	<!-- wp:heading {"level":1} -->
	<h1 class="wp-block-heading"><?php esc_html_e( 'Latest posts', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":10,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide"} -->
<div class="wp-block-query alignwide">
		<!-- wp:post-template {"layout":{"type":"default"}} -->
			<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","className":"is-style-soft"} /-->

				<!-- wp:post-title {"isLink":true,"level":2,"fontSize":"xl"} /-->

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"fontSize":"sm"} -->
				<div class="wp-block-group has-sm-font-size">
					<!-- wp:post-date /-->
					<!-- wp:post-terms {"term":"category"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-excerpt {"moreText":"<?php esc_attr_e( 'Read more', 'keel' ); ?>","excerptLength":30} /-->
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
