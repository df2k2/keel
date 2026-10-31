<?php
/**
 * Title: Page: coming soon
 * Slug: keel/page-coming-soon
 * Categories: keel/layouts
 * Keywords: page, coming soon, launch, subscribe
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: A coming-soon page for the Page without title template: a centred panel with a subscribe row.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"36rem"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:paragraph {"align":"center","className":"keel-eyebrow"} -->
	<p class="has-text-align-center keel-eyebrow"><?php esc_html_e( 'Opening spring 2027', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-accent","fontSize":"xxxl"} -->
	<h1 class="wp-block-heading has-text-align-center is-style-accent has-xxxl-font-size">
	<?php
	/* translators: 1: opening em tag, 2: closing em tag. */
	printf( esc_html__( 'Something good is %1$snearly ready%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"is-style-lead"} -->
	<p class="has-text-align-center is-style-lead"><?php esc_html_e( 'We are building the guide now. Leave your email and we will tell you the day it opens.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-icon-arrow"} -->
		<div class="wp-block-button is-style-icon-arrow"><a class="wp-block-button__link wp-element-button" href="#notify"><?php esc_html_e( 'Tell me when', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

<!-- wp:pattern {"slug":"keel/subscribe-inline"} /-->
</div>
<!-- /wp:group -->
