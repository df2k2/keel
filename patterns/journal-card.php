<?php
/**
 * Title: Journal card
 * Slug: keel/journal-card
 * Categories: keel/blog
 * Keywords: journal, post, card, query, category
 * Viewport Width: 480
 * Inserter: yes
 * Block Types: core/query
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:query {"queryId":32,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"keel-journal"} -->
<div class="wp-block-query keel-journal">
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

	<!-- wp:query-no-results -->
		<!-- wp:pattern {"slug":"keel/no-results"} /-->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
