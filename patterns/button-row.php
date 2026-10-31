<?php
/**
 * Title: Button row
 * Slug: keel/button-row
 * Categories: keel/elements
 * Keywords: buttons, styles, sizes, icons
 * Viewport Width: 1200
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_buttons = array(
	array( '', __( 'Book now', 'keel' ) ),
	array( 'is-style-secondary', __( 'Secondary', 'keel' ) ),
	array( 'is-style-ghost', __( 'Ghost', 'keel' ) ),
	array( 'is-style-soft', __( 'Soft', 'keel' ) ),
	array( 'is-style-link', __( 'Link', 'keel' ) ),
	array( 'is-style-small', __( 'Small', 'keel' ) ),
	array( 'is-style-large', __( 'Large', 'keel' ) ),
	array( 'is-style-pill', __( 'Pill', 'keel' ) ),
	array( 'is-style-icon-phone', __( 'Call us', 'keel' ) ),
	array( 'is-style-icon-search', __( 'Search', 'keel' ) ),
	array( 'is-style-icon-arrow', __( 'Explore', 'keel' ) ),
	array( 'is-style-icon-map', __( 'Directions', 'keel' ) ),
	array( 'is-style-icon-calendar', __( 'Book a date', 'keel' ) ),
);
$keel_on_dark = array(
	array( 'is-style-light', __( 'Light', 'keel' ) ),
	array( 'is-style-outline-light', __( 'Outline light', 'keel' ) ),
	array( 'is-style-glass', __( 'Glass', 'keel' ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
	<div class="wp-block-buttons">
		<?php foreach ( $keel_buttons as $keel_button ) : ?>
		<!-- wp:button <?php echo '' !== $keel_button[0] ? '{"className":"' . esc_attr( $keel_button[0] ) . '"} ' : ''; ?>-->
		<div class="wp-block-button <?php echo esc_attr( $keel_button[0] ); ?>"><a class="wp-block-button__link wp-element-button" href="#buttons"><?php echo esc_html( $keel_button[1] ); ?></a></div>
		<!-- /wp:button -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:buttons -->

	<!-- wp:group {"className":"is-style-band","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-band">
		<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-buttons">
			<?php foreach ( $keel_on_dark as $keel_button ) : ?>
			<!-- wp:button {"className":"<?php echo esc_attr( $keel_button[0] ); ?>"} -->
			<div class="wp-block-button <?php echo esc_attr( $keel_button[0] ); ?>"><a class="wp-block-button__link wp-element-button" href="#buttons"><?php echo esc_html( $keel_button[1] ); ?></a></div>
			<!-- /wp:button -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
