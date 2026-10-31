<?php
/**
 * Title: Page: visitor information
 * Slug: keel/page-visitor-info
 * Categories: keel/layouts
 * Keywords: page, visitor, information, seasons, safety, faq
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: Visitor information: an intro, callouts for seasons and safety, the best-time table and questions.
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
	printf( esc_html__( 'Before you %1$sarrive%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'The practical page: when to come, what to bring, what to watch for and who to call.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:pattern {"slug":"keel/callouts"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'The best time to visit', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:pattern {"slug":"keel/table-best-time"} /-->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->
