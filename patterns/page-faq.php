<?php
/**
 * Title: Page: FAQ
 * Slug: keel/page-faq
 * Categories: keel/layouts
 * Keywords: page, faq, questions, layout
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","level":1} -->
	<h1 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Questions and answers', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"is-style-lead"} -->
	<p class="has-text-align-center is-style-lead"><?php esc_html_e( 'The things people ask before they book, answered plainly. Anything missing? Call us.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->

<!-- wp:pattern {"slug":"keel/cta-band-contrast"} /-->
