<?php
/**
 * Title: Page: journal
 * Slug: keel/page-journal
 * Categories: keel/layouts
 * Keywords: page, journal, magazine, posts, layout
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: A magazine home: the sticky feature article, category chips, the journal grid with enhanced pagination and a subscribe row.
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
	printf( esc_html__( 'The %1$sjournal%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'Stories from the water, the markets and the quiet lanes, from the people who live here.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/feature-article"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:pattern {"slug":"keel/filter-chips"} /-->

	<!-- wp:pattern {"slug":"keel/journal-grid"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"surface","className":"keel-band","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull keel-band has-surface-background-color has-background">
	<!-- wp:pattern {"slug":"keel/subscribe-inline"} /-->
</div>
<!-- /wp:group -->
