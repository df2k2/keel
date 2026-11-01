<?php
/**
 * Title: Author box
 * Slug: keel/author-box
 * Categories: keel/blog
 * Keywords: author, bio, post
 * Viewport Width: 1000
 * Inserter: yes
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"className":"is-style-surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-surface">
	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size"><?php esc_html_e( 'Written by', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:post-author-name {"isLink":true,"fontSize":"lg","style":{"typography":{"fontWeight":"700"}}} /-->

	<!-- wp:post-author-biography /-->
</div>
<!-- /wp:group -->
