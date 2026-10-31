<?php
/**
 * Title: Page: contact with map
 * Slug: keel/page-contact-map
 * Categories: keel/layouts
 * Keywords: page, contact, map, hours
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: A contact page: an intro, the contact shell beside a map card, and the hours table with a callout.
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
	printf( esc_html__( 'Say %1$shello%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'Questions, corrections, a tip about a place we have missed: all welcome.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"58%"} -->
	<div class="wp-block-column" style="flex-basis:58%">
		<!-- wp:pattern {"slug":"keel/contact-shell"} /-->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"42%"} -->
	<div class="wp-block-column" style="flex-basis:42%">
		<!-- wp:pattern {"slug":"keel/map-card"} /-->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:pattern {"slug":"keel/contact-hours"} /-->
</div>
<!-- /wp:group -->
