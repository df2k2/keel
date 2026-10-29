<?php
/**
 * Title: Page: style guide
 * Slug: keel/styleguide
 * Categories: keel/layouts
 * Keywords: style guide, colours, typography, spacing, block styles
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
	'colours'      => __( 'Colours', 'keel' ),
	'typography'   => __( 'Typography', 'keel' ),
	'spacing'      => __( 'Spacing', 'keel' ),
	'shape'        => __( 'Shape', 'keel' ),
	'buttons'      => __( 'Buttons', 'keel' ),
	'forms'        => __( 'Forms', 'keel' ),
	'block-styles' => __( 'Block styles', 'keel' ),
	'icons'        => __( 'Icons', 'keel' ),
	'variations'   => __( 'Variations', 'keel' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"level":1} -->
	<h1 class="wp-block-heading"><?php esc_html_e( 'Style guide', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'A living reference: every value on this page is read from the active variation and your Styles edits when the page renders.', 'keel' ); ?></p>
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

<!-- wp:pattern {"slug":"keel/styleguide-colors"} /-->

<!-- wp:pattern {"slug":"keel/styleguide-typography"} /-->

<!-- wp:pattern {"slug":"keel/styleguide-spacing"} /-->

<!-- wp:pattern {"slug":"keel/styleguide-shape"} /-->

<!-- wp:pattern {"slug":"keel/styleguide-buttons"} /-->

<!-- wp:pattern {"slug":"keel/styleguide-forms"} /-->

<!-- wp:pattern {"slug":"keel/styleguide-block-styles"} /-->

<!-- wp:pattern {"slug":"keel/styleguide-icons"} /-->

<!-- wp:pattern {"slug":"keel/styleguide-variations"} /-->
