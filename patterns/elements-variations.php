<?php
/**
 * Title: Elements: variations
 * Slug: keel/elements-variations
 * Categories: keel/pages
 * Keywords: elements, variations, palettes, styles
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_variations = Keel\Theme\style_variations();
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"variations"} -->
	<h2 class="wp-block-heading" id="variations"><?php esc_html_e( 'Variations', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Each variation changes only the palette, the fonts and the shape tokens. Everything above re-renders from those values, which is why the same patterns work in every one.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
	<?php foreach ( $keel_variations as $keel_variation ) : ?>
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph -->
		<p><strong><?php echo esc_html( $keel_variation['title'] ); ?></strong><?php echo Keel\Theme\is_active_palette( $keel_variation['palette'] ) ? ' <span class="keel-chip">' . esc_html__( 'active', 'keel' ) . '</span>' : ''; ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group">
			<?php foreach ( $keel_variation['palette'] as $keel_slug => $keel_hex ) : ?>
			<!-- wp:group {"style":{"color":{"background":"<?php echo esc_attr( $keel_hex ); ?>"}},"className":"keel-swatch keel-swatch--small","layout":{"type":"constrained"}} -->
			<div class="wp-block-group keel-swatch keel-swatch--small has-background" style="background-color:<?php echo esc_attr( $keel_hex ); ?>" title="<?php echo esc_attr( $keel_slug . ' ' . $keel_hex ); ?>"></div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
