<?php
/**
 * Title: Style guide: shape
 * Slug: keel/styleguide-shape
 * Categories: keel/pages
 * Keywords: style guide, shape, radius, shadow, border, focus
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_custom = wp_get_global_settings( array( 'custom' ) );
$keel_radius = is_array( $keel_custom['radius'] ?? null ) ? $keel_custom['radius'] : array();
$keel_shadow = is_array( $keel_custom['shadow'] ?? null ) ? $keel_custom['shadow'] : array();
$keel_border = is_string( $keel_custom['border']['width'] ?? null ) ? $keel_custom['border']['width'] : '1px';
$keel_focus  = is_string( $keel_custom['focus']['ring'] ?? null ) ? $keel_custom['focus']['ring'] : '';
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"shape"} -->
	<h2 class="wp-block-heading" id="shape"><?php esc_html_e( 'Shape', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Radius', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"10rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_radius as $keel_slug => $keel_value ) : ?>
		<!-- wp:group {"style":{"border":{"radius":"var:custom|radius|<?php echo esc_attr( $keel_slug ); ?>"}},"backgroundColor":"surface-alt","className":"keel-swatch","layout":{"type":"constrained"}} -->
		<div class="wp-block-group keel-swatch has-surface-alt-background-color has-background" style="border-radius:var(--wp--custom--radius--<?php echo esc_attr( $keel_slug ); ?>)">
			<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
			<p class="has-text-align-center has-sm-font-size"><code><?php echo esc_html( $keel_slug ); ?></code><br><?php echo esc_html( (string) $keel_value ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Shadows and borders', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"14rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_shadow as $keel_slug => $keel_value ) : ?>
		<!-- wp:group {"style":{"shadow":"var:custom|shadow|<?php echo esc_attr( $keel_slug ); ?>","spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-base-background-color has-background" style="box-shadow:var(--wp--custom--shadow--<?php echo esc_attr( $keel_slug ); ?>);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><code>shadow <?php echo esc_html( $keel_slug ); ?></code><br><?php echo esc_html( (string) $keel_value ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>

		<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
		<div class="wp-block-group is-style-bordered">
			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><code>border</code><br>
			<?php
			/* translators: %s: border width such as 1px. */
			echo esc_html( sprintf( __( '%s solid, in the border colour', 'keel' ), $keel_border ) );
			?>
			</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Focus', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>
	<?php
	/* translators: %s: the focus ring value such as "2px solid var(--wp--preset--color--primary)". */
	echo esc_html( sprintf( __( 'Every focusable element shows a two-tone ring: %s, with a halo in the base colour so it stays visible on any background. Press Tab to see it on the button below.', 'keel' ), $keel_focus ) );
	?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#shape"><?php esc_html_e( 'Focus me', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
