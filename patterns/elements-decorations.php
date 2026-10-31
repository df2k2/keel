<?php
/**
 * Title: Elements: decorations
 * Slug: keel/elements-decorations
 * Categories: keel/pages
 * Keywords: elements, stamp, route, ghost, paper, dot grid, marquee
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"decorations"} -->
	<h2 class="wp-block-heading" id="decorations"><?php esc_html_e( 'Decorations', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'The travel-poster details: a stamp, a dashed route, a ghost word behind a heading, paper and dot-grid surfaces, and a marquee that never duplicates its content.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( '.keel-stamp' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"keel-stamp"} -->
		<p class="keel-stamp"><?php esc_html_e( 'Top pick', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-stamp"} -->
		<p class="keel-stamp"><?php esc_html_e( 'New', 'keel' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"keel-stamp"} -->
		<p class="keel-stamp"><?php esc_html_e( 'Since 2009', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'separator .is-style-route' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:separator {"className":"is-style-route"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-route"/>
	<!-- /wp:separator -->

	<?php echo Keel\Theme\element_label( 'heading .is-style-ghost' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:heading {"level":3,"className":"is-style-ghost"} -->
	<h3 class="wp-block-heading is-style-ghost"><?php esc_html_e( 'Explore', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Six places, one coast', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<?php echo Keel\Theme\element_label( 'group .is-style-paper' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"className":"is-style-paper","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-paper">
		<!-- wp:paragraph {"className":""} -->
		<p class=""><?php esc_html_e( 'A paper grain over the surface colour, for a note or an aside.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'group .is-style-dot-grid' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"className":"is-style-dot-grid","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-dot-grid">
		<!-- wp:paragraph {"className":""} -->
		<p class=""><?php esc_html_e( 'A dot grid on the base colour, wider than the textured style.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'keel/marquee-band (group .is-style-marquee)' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/marquee-band"} /-->
</div>
<!-- /wp:group -->
