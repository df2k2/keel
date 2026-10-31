<?php
/**
 * Title: Mini list: posts
 * Slug: keel/mini-list-posts
 * Categories: keel/blog
 * Keywords: mini list, posts, query, sidebar, related
 * Viewport Width: 600
 * Inserter: yes
 * Block Types: core/query
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:query {"queryId":31,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"keel-mini-list"} -->
<div class="wp-block-query keel-mini-list">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
		<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile">
			<!-- wp:column {"verticalAlignment":"center","width":"72px"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:72px">
				<!-- wp:post-featured-image {"isLink":true,"width":"72px","height":"72px","className":"is-style-soft"} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"md"} /-->

				<!-- wp:post-date {"fontSize":"sm"} /-->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	<!-- /wp:post-template -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Nothing to list yet.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
