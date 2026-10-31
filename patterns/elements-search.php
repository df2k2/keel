<?php
/**
 * Title: Elements: search
 * Slug: keel/elements-search
 * Categories: keel/pages
 * Keywords: elements, search, panel, tabs, compact, flat
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"search"} -->
	<h2 class="wp-block-heading" id="search"><?php esc_html_e( 'Search', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'The search panel: core Tabs holding a Search block and filter chips. The compact and flat styles are the panel without the card.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'keel/search-panel' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/search-panel"} /-->

	<?php echo Keel\Theme\element_label( '.is-style-search-panel-compact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"className":"is-style-search-panel-compact","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-search-panel-compact">
		<!-- wp:search {"label":"<?php esc_attr_e( 'Search places, compact', 'keel' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Where to?', 'keel' ); ?>","buttonText":"<?php esc_attr_e( 'Search', 'keel' ); ?>","buttonPosition":"button-inside"} /-->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( '.is-style-search-panel-flat' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"className":"is-style-search-panel-flat","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-search-panel-flat">
		<!-- wp:search {"label":"<?php esc_attr_e( 'Search places, flat', 'keel' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'Where to?', 'keel' ); ?>","buttonText":"<?php esc_attr_e( 'Search', 'keel' ); ?>","buttonPosition":"button-inside"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
