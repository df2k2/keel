<?php
/**
 * Title: Page: elements
 * Slug: keel/elements
 * Categories: keel/layouts
 * Keywords: elements, colours, typography, spacing, block styles
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_sections = array(
	'colours'         => __( 'Colours', 'keel' ),
	'typography'      => __( 'Typography', 'keel' ),
	'spacing'         => __( 'Spacing', 'keel' ),
	'shape'           => __( 'Shape', 'keel' ),
	'buttons'         => __( 'Buttons', 'keel' ),
	'badges-prices'   => __( 'Badges and prices', 'keel' ),
	'forms'           => __( 'Forms', 'keel' ),
	'search'          => __( 'Search', 'keel' ),
	'cards'           => __( 'Cards', 'keel' ),
	'people'          => __( 'Journal, team and reviews', 'keel' ),
	'decorations'     => __( 'Decorations', 'keel' ),
	'tabs-filters'    => __( 'Tabs, filters and accordion', 'keel' ),
	'itinerary-steps' => __( 'Itinerary and steps', 'keel' ),
	'deals'           => __( 'Prices and deals', 'keel' ),
	'callouts'        => __( 'Callouts', 'keel' ),
	'tables'          => __( 'Tables', 'keel' ),
	'rails'           => __( 'Rails', 'keel' ),
	'pagination'      => __( 'Pagination and breadcrumbs', 'keel' ),
	'stats-media'     => __( 'Stats, facts and media', 'keel' ),
	'footer'          => __( 'Newsletter and footer', 'keel' ),
	'block-styles'    => __( 'Block styles', 'keel' ),
	'icons'           => __( 'Icons', 'keel' ),
	'variations'      => __( 'Variations', 'keel' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"level":1} -->
	<h1 class="wp-block-heading"><?php esc_html_e( 'Elements', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'Every element the theme ships, named with the class, style or pattern that makes it, and read from the active variation each time the page renders.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-buttons">
		<?php foreach ( $keel_sections as $keel_anchor => $keel_label ) : ?>
		<!-- wp:button {"className":"is-style-ghost","fontSize":"sm"} -->
		<div class="wp-block-button has-custom-font-size is-style-ghost has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#<?php echo esc_attr( $keel_anchor ); ?>"><?php echo esc_html( $keel_label ); ?></a></div>
		<!-- /wp:button -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/elements-colors"} /-->

<!-- wp:pattern {"slug":"keel/elements-typography"} /-->

<!-- wp:pattern {"slug":"keel/elements-spacing"} /-->

<!-- wp:pattern {"slug":"keel/elements-shape"} /-->

<!-- wp:pattern {"slug":"keel/elements-buttons"} /-->

<!-- wp:pattern {"slug":"keel/elements-badges-prices"} /-->

<!-- wp:pattern {"slug":"keel/elements-forms"} /-->

<!-- wp:pattern {"slug":"keel/elements-search"} /-->

<!-- wp:pattern {"slug":"keel/elements-cards"} /-->

<!-- wp:pattern {"slug":"keel/elements-people"} /-->

<!-- wp:pattern {"slug":"keel/elements-decorations"} /-->

<!-- wp:pattern {"slug":"keel/elements-tabs-filters"} /-->

<!-- wp:pattern {"slug":"keel/elements-itinerary-steps"} /-->

<!-- wp:pattern {"slug":"keel/elements-deals"} /-->

<!-- wp:pattern {"slug":"keel/elements-callouts"} /-->

<!-- wp:pattern {"slug":"keel/elements-tables"} /-->

<!-- wp:pattern {"slug":"keel/elements-rails"} /-->

<!-- wp:pattern {"slug":"keel/elements-pagination"} /-->

<!-- wp:pattern {"slug":"keel/elements-stats-media"} /-->

<!-- wp:pattern {"slug":"keel/elements-footer"} /-->

<!-- wp:pattern {"slug":"keel/elements-block-styles"} /-->

<!-- wp:pattern {"slug":"keel/elements-icons"} /-->

<!-- wp:pattern {"slug":"keel/elements-variations"} /-->
