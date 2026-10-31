<?php
/**
 * Title: Elements: tabs, filters and accordion
 * Slug: keel/elements-tabs-filters
 * Categories: keel/pages
 * Keywords: elements, tabs, pills, filters, chips, accordion
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"tabs-filters"} -->
	<h2 class="wp-block-heading" id="tabs-filters"><?php esc_html_e( 'Tabs, filters and accordion', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Pill tabs, a row of filter chips with an active state, and the FAQ accordion.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'tabs .is-style-pills' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:tabs {"className":"is-style-pills"} -->
	<div class="wp-block-tabs is-style-pills">
		<!-- wp:tab-list -->
		<div role="tablist" class="wp-block-tab-list"><button type="button" role="tab"><?php esc_html_e( 'Overview', 'keel' ); ?></button><button type="button" role="tab"><?php esc_html_e( 'Details', 'keel' ); ?></button><button type="button" role="tab"><?php esc_html_e( 'Reviews', 'keel' ); ?></button></div>
		<!-- /wp:tab-list -->

		<!-- wp:tab-panels -->
		<div class="wp-block-tab-panels">
			<!-- wp:tab-panel {"label":"<?php esc_attr_e( 'Overview', 'keel' ); ?>"} -->
			<section role="tabpanel" tabindex="0" class="wp-block-tab-panel"><!-- wp:paragraph --><p><?php esc_html_e( 'Pill tabs: the selected one is filled in the primary colour.', 'keel' ); ?></p><!-- /wp:paragraph --></section>
			<!-- /wp:tab-panel -->

			<!-- wp:tab-panel {"label":"<?php esc_attr_e( 'Details', 'keel' ); ?>"} -->
			<section role="tabpanel" tabindex="0" class="wp-block-tab-panel"><!-- wp:paragraph --><p><?php esc_html_e( 'Core Tabs with the pills style.', 'keel' ); ?></p><!-- /wp:paragraph --></section>
			<!-- /wp:tab-panel -->

			<!-- wp:tab-panel {"label":"<?php esc_attr_e( 'Reviews', 'keel' ); ?>"} -->
			<section role="tabpanel" tabindex="0" class="wp-block-tab-panel"><!-- wp:paragraph --><p><?php esc_html_e( 'Nothing loads until a tab is chosen.', 'keel' ); ?></p><!-- /wp:paragraph --></section>
			<!-- /wp:tab-panel -->
		</div>
		<!-- /wp:tab-panels -->
	</div>
	<!-- /wp:tabs -->

	<?php echo Keel\Theme\element_label( 'keel/filter-chips (.keel-chip.is-active)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/filter-chips"} /-->

	<?php echo Keel\Theme\element_label( 'keel/faq-accordion' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->
</div>
<!-- /wp:group -->
