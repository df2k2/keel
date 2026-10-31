<?php
/**
 * Title: Page: legal
 * Slug: keel/page-legal
 * Categories: keel/layouts
 * Keywords: page, legal, privacy, terms, contents
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: A legal page: the title, a contents box with anchors and six headed sections of placeholder copy.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"44rem"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"level":1,"className":"is-style-accent","fontSize":"xxxl"} -->
	<h1 class="wp-block-heading is-style-accent has-xxxl-font-size">
	<?php
	/* translators: 1: opening em tag, 2: closing em tag. */
	printf( esc_html__( 'Privacy %1$spolicy%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"is-style-small-print"} -->
	<p class="is-style-small-print"><?php esc_html_e( 'Last updated: 1 March 2027', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:pattern {"slug":"keel/legal-contents"} /-->

	<!-- wp:heading {"level":2,"anchor":"what-we-collect"} -->
	<h2 class="wp-block-heading" id="what-we-collect"><?php esc_html_e( 'What we collect', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Replace this paragraph with your own wording. Keep the heading, so the contents list above still points to the right place, and say what you do in plain words.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2,"anchor":"how-we-use-it"} -->
	<h2 class="wp-block-heading" id="how-we-use-it"><?php esc_html_e( 'How we use it', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Replace this paragraph with your own wording. Keep the heading, so the contents list above still points to the right place, and say what you do in plain words.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2,"anchor":"cookies"} -->
	<h2 class="wp-block-heading" id="cookies"><?php esc_html_e( 'Cookies', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Replace this paragraph with your own wording. Keep the heading, so the contents list above still points to the right place, and say what you do in plain words.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2,"anchor":"sharing"} -->
	<h2 class="wp-block-heading" id="sharing"><?php esc_html_e( 'Who we share it with', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Replace this paragraph with your own wording. Keep the heading, so the contents list above still points to the right place, and say what you do in plain words.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2,"anchor":"your-rights"} -->
	<h2 class="wp-block-heading" id="your-rights"><?php esc_html_e( 'Your rights', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Replace this paragraph with your own wording. Keep the heading, so the contents list above still points to the right place, and say what you do in plain words.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2,"anchor":"contact"} -->
	<h2 class="wp-block-heading" id="contact"><?php esc_html_e( 'How to reach us', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Replace this paragraph with your own wording. Keep the heading, so the contents list above still points to the right place, and say what you do in plain words.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
