<?php
/**
 * Title: Elements: spacing
 * Slug: keel/elements-spacing
 * Categories: keel/pages
 * Keywords: elements, spacing, scale, padding
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_sizes = wp_get_global_settings( array( 'spacing', 'spacingSizes' ) );
$keel_sizes = is_array( $keel_sizes['theme'] ?? null ) ? $keel_sizes['theme'] : array();
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"spacing"} -->
	<h2 class="wp-block-heading" id="spacing"><?php esc_html_e( 'Spacing', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Eight steps. The small ones are fixed, the large ones scale with the viewport, and every pattern uses them for padding and gaps.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
	<?php foreach ( $keel_sizes as $keel_size ) : ?>
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><code><?php echo esc_html( $keel_size['slug'] ); ?></code></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|<?php echo esc_attr( $keel_size['slug'] ); ?>"}}},"className":"keel-scale-bar","layout":{"type":"constrained"}} -->
		<div class="wp-block-group keel-scale-bar" style="padding-left:var(--wp--preset--spacing--<?php echo esc_attr( $keel_size['slug'] ); ?>)"></div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><?php echo esc_html( is_string( $keel_size['size'] ) ? $keel_size['size'] : wp_json_encode( $keel_size['size'] ) ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
