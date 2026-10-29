<?php
/**
 * Title: Post navigation
 * Slug: keel/post-navigation
 * Categories: keel/blog
 * Keywords: previous, next, navigation, post
 * Viewport Width: 1000
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"top":{"color":"var:preset|color|border","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--border);border-top-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:post-navigation-link {"type":"previous","showTitle":true,"label":"<?php esc_attr_e( 'Previous', 'keel' ); ?>","arrow":"chevron"} /-->

	<!-- wp:post-navigation-link {"showTitle":true,"label":"<?php esc_attr_e( 'Next', 'keel' ); ?>","arrow":"chevron"} /-->
</div>
<!-- /wp:group -->
