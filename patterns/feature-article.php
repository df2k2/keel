<?php
/**
 * Title: Feature article
 * Slug: keel/feature-article
 * Categories: keel/blog
 * Keywords: journal, featured, sticky, cover, post
 * Viewport Width: 1400
 * Inserter: yes
 * Block Types: core/query
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:query {"queryId":34,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"align":"wide","className":"keel-feature-article"} -->
<div class="wp-block-query alignwide keel-feature-article">
	<!-- wp:post-template {"layout":{"type":"default"}} -->
		<!-- wp:cover {"useFeaturedImage":true,"dimRatio":60,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":60,"minHeightUnit":"vh","contentPosition":"bottom left","className":"keel-journal-card__media","style":{"border":{"radius":"var:custom|radius|lg"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-cover has-custom-content-position is-position-bottom-left keel-journal-card__media" style="border-radius:var(--wp--custom--radius--lg);min-height:60vh"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-60 has-background-dim"></span><div class="wp-block-cover__inner-container">
			<!-- wp:paragraph {"className":"keel-eyebrow"} -->
			<p class="keel-eyebrow"><?php esc_html_e( 'Featured', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:post-title {"isLink":true,"level":2,"fontSize":"xxl"} /-->

			<!-- wp:post-excerpt {"excerptLength":28} /-->

			<!-- wp:read-more {"content":"<?php esc_attr_e( 'Read the story', 'keel' ); ?>"} /-->
		</div></div>
		<!-- /wp:cover -->
	<!-- /wp:post-template -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Make a post sticky and it appears here as the feature.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
