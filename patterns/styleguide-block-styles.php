<?php
/**
 * Title: Style guide: block styles
 * Slug: keel/styleguide-block-styles
 * Categories: keel/pages
 * Keywords: style guide, block styles, samples
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_styles = Keel\Theme\block_styles();
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"block-styles"} -->
	<h2 class="wp-block-heading" id="block-styles"><?php esc_html_e( 'Block styles', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'One sample per registered Keel style. The list is generated from the registration table, so a new style appears here the day it ships.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
	<?php foreach ( $keel_styles as $keel_block => $keel_block_styles ) : ?>
		<?php foreach ( $keel_block_styles as $keel_style ) : ?>
	<!-- wp:heading {"level":3,"fontSize":"lg"} -->
	<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( substr( $keel_block, 5 ) . ': ' . $keel_style['label'] ); ?> <code>is-style-<?php echo esc_html( $keel_style['name'] ); ?></code></h3>
	<!-- /wp:heading -->
			<?php echo Keel\Theme\block_style_sample( $keel_block, $keel_style['name'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from theme strings and escaped values. ?>
		<?php endforeach; ?>
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
