<?php
/**
 * Title: Event grid
 * Slug: keel/event-grid
 * Categories: keel/blog
 * Keywords: events, grid, dates, query
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
	<h2 class="wp-block-heading"><?php esc_html_e( 'Upcoming events', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":24,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"asc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:group {"className":"keel-date-badge","layout":{"type":"constrained"}} -->
				<div class="wp-block-group keel-date-badge">
					<!-- wp:post-date {"format":"M j"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"lg"} /-->

				<!-- wp:post-excerpt {"excerptLength":16} /-->

				<!-- wp:read-more {"content":"<?php esc_attr_e( 'Event details', 'keel' ); ?>"} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'No events scheduled. Check back soon.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
