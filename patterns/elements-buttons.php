<?php
/**
 * Title: Elements: buttons
 * Slug: keel/elements-buttons
 * Categories: keel/pages
 * Keywords: elements, buttons, states, hover, focus
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_buttons = array(
	array( '', __( 'Default', 'keel' ), __( 'Primary fill. Hover and active darken the fill toward the contrast colour; focus shows the two-tone ring.', 'keel' ) ),
	array( 'is-style-outline', __( 'Outline (core)', 'keel' ), __( 'Core style: a border in the current text colour and no fill.', 'keel' ) ),
	array( 'is-style-secondary', __( 'Secondary', 'keel' ), __( 'Accent fill for the second action on a page.', 'keel' ) ),
	array( 'is-style-ghost', __( 'Ghost', 'keel' ), __( 'Primary text and border on a transparent background, for quiet actions.', 'keel' ) ),
	array( 'is-style-pill', __( 'Pill', 'keel' ), __( 'The default button with the pill radius.', 'keel' ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"buttons"} -->
	<h2 class="wp-block-heading" id="buttons"><?php esc_html_e( 'Buttons', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Every button is at least 44 pixels tall. Hover, focus and active states come from theme.json and the focus ring, so they follow the variation.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"14rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_buttons as $keel_button ) : ?>
		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button <?php echo '' !== $keel_button[0] ? '{"className":"' . esc_attr( $keel_button[0] ) . '"} ' : ''; ?>-->
				<div class="wp-block-button <?php echo esc_attr( $keel_button[0] ); ?>"><a class="wp-block-button__link wp-element-button" href="#buttons"><?php echo esc_html( $keel_button[1] ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php echo esc_html( $keel_button[2] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Every style, every size', 'keel' ); ?></h3>
	<!-- /wp:heading -->
	<?php echo Keel\Theme\element_label( 'keel/button-row' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/button-row"} /-->
</div>
<!-- /wp:group -->
