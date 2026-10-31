<?php
/**
 * Title: Header actions
 * Slug: keel/header-actions
 * Categories: keel/cta
 * Keywords: header, search, button, actions
 * Viewport Width: 600
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-buttons">
	<!-- wp:button {"className":"is-style-icon-search is-style-soft","fontSize":"sm"} -->
	<div class="wp-block-button has-custom-font-size is-style-icon-search is-style-soft has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#search"><?php esc_html_e( 'Search', 'keel' ); ?></a></div>
	<!-- /wp:button -->

	<!-- wp:button {"fontSize":"sm"} -->
	<div class="wp-block-button has-custom-font-size has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#plan"><?php esc_html_e( 'Plan a trip', 'keel' ); ?></a></div>
	<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
