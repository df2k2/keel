<?php
/**
 * Title: Journal grid
 * Slug: keel/journal-grid
 * Categories: keel/blog
 * Keywords: journal, posts, grid, cards, pagination
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
	<!-- wp:query {"queryId":33,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"enhancedPagination":true,"align":"wide","className":"keel-journal"} -->
	<div class="wp-block-query alignwide keel-journal">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"className":"is-style-card keel-journal-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group is-style-card keel-journal-card">
				<!-- wp:group {"className":"keel-card__media keel-journal-card__media keel-stamp-holder","layout":{"type":"constrained"}} -->
				<div class="wp-block-group keel-card__media keel-journal-card__media keel-stamp-holder">
					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->

					<!-- wp:post-terms {"term":"category","className":"keel-tag keel-corner"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->

				<!-- wp:group {"className":"keel-meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group keel-meta">
					<!-- wp:post-date /-->

					<!-- wp:post-author-name {"isLink":true} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-excerpt {"excerptLength":20} /-->
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
