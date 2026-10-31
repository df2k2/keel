<?php
/**
 * Title: Page: events
 * Slug: keel/page-events
 * Categories: keel/layouts
 * Keywords: page, events, months, tickets, submit
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: The events page: an intro, three months of tickets and a callout for submitting an event.
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
	printf( esc_html__( 'What is %1$son%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'Markets, regattas, walks and music, listed by month. Free unless a price is shown.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:heading {"level":2,"anchor":"march"} -->
	<h2 class="wp-block-heading" id="march"><?php esc_html_e( 'March', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:pattern {"slug":"keel/tickets-list"} /-->

	<!-- wp:heading {"level":2,"anchor":"april"} -->
	<h2 class="wp-block-heading" id="april"><?php esc_html_e( 'April', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:pattern {"slug":"keel/tickets-list"} /-->

	<!-- wp:heading {"level":2,"anchor":"may"} -->
	<h2 class="wp-block-heading" id="may"><?php esc_html_e( 'May', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:pattern {"slug":"keel/tickets-list"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"className":"is-style-callout-warm","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-callout-warm">
		<!-- wp:paragraph -->
		<p><strong><?php esc_html_e( 'Running something?', 'keel' ); ?></strong> <?php esc_html_e( 'Send us the date, the place and a line about it and we will list it for free.', 'keel' ); ?> <a href="#submit"><?php esc_html_e( 'Submit an event', 'keel' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
