<?php
/**
 * Title: Page: listings
 * Slug: keel/page-listings
 * Categories: keel/layouts
 * Keywords: page, listings, query, child pages, filter
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: A listings index: filter chips and a Query Loop of the pages beneath it shown as listing cards with enhanced pagination. Set the Parents filter of the Query Loop to the page itself.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"level":1,"className":"is-style-accent","fontSize":"xxxl"} -->
	<h1 class="wp-block-heading is-style-accent has-xxxl-font-size">
	<?php
	/* translators: 1: opening em tag, 2: closing em tag. */
	printf( esc_html__( 'Where to %1$seat, stay and play%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'Every listing is a page of its own beneath this one. The grid below reads them in; add a page and it appears here.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:pattern {"slug":"keel/filter-chips"} /-->

	<!-- wp:query {"queryId":35,"query":{"perPage":6,"pages":0,"offset":0,"postType":"page","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"enhancedPagination":true,"align":"wide","className":"keel-listings"} -->
	<div class="wp-block-query alignwide keel-listings">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:group {"className":"keel-card__media keel-stamp-holder","layout":{"type":"constrained"}} -->
				<div class="wp-block-group keel-card__media keel-stamp-holder">
					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->

					<!-- wp:paragraph {"className":"keel-tag keel-corner"} -->
					<p class="keel-tag keel-corner"><?php esc_html_e( 'Listing', 'keel' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->

				<!-- wp:post-excerpt {"excerptLength":18} /-->

				<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
				<div class="wp-block-group keel-card-footer">
					<!-- wp:paragraph {"className":"keel-price"} -->
					<p class="keel-price"><span class="keel-price__label"><?php esc_html_e( 'From', 'keel' ); ?></span> $48</p>
					<!-- /wp:paragraph -->

					<!-- wp:read-more {"content":"<?php esc_attr_e( 'See listing', 'keel' ); ?>","className":"keel-read-more-button"} /-->
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
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'No listings yet. Add a page beneath this one and set the Parents filter of this Query Loop to this page.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->

	<!-- wp:group {"className":"is-style-callout-info","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-callout-info">
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Prices and hours change with the season. Each listing shows the current ones; the chips above filter by kind.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
