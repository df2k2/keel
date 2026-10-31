<?php
/**
 * Title: Elements: colours
 * Slug: keel/elements-colors
 * Categories: keel/pages
 * Keywords: elements, colours, palette, contrast
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_palette = Keel\Theme\active_palette();
$keel_pairs   = Keel\Theme\contrast_pairs();
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"colours"} -->
	<h2 class="wp-block-heading" id="colours"><?php esc_html_e( 'Colours', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'The twelve palette slugs every pattern and block style is built on. Values are read from the active variation and your Styles edits, so this page always shows the colours in use.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"12rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_palette as $keel_slug => $keel_color ) : ?>
		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"backgroundColor":"<?php echo esc_attr( $keel_slug ); ?>","className":"keel-swatch","layout":{"type":"constrained"}} -->
			<div class="wp-block-group keel-swatch has-<?php echo esc_attr( $keel_slug ); ?>-background-color has-background"></div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><strong><?php echo esc_html( $keel_color['name'] ); ?></strong><br><code><?php echo esc_html( $keel_slug ); ?></code><br><?php echo esc_html( strtoupper( $keel_color['color'] ) ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Contrast pairs', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'The pairs Keel promises to keep readable, checked against the live values. Text pairs need 4.5 to 1, large text and interface pairs 3 to 1.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:table {"className":"is-style-striped"} -->
	<figure class="wp-block-table is-style-striped"><table><thead><tr><th><?php esc_html_e( 'Foreground', 'keel' ); ?></th><th><?php esc_html_e( 'Background', 'keel' ); ?></th><th><?php esc_html_e( 'Ratio', 'keel' ); ?></th><th><?php esc_html_e( 'Minimum', 'keel' ); ?></th><th><?php esc_html_e( 'Result', 'keel' ); ?></th></tr></thead><tbody>
	<?php foreach ( $keel_pairs as $keel_pair ) : ?>
		<?php
		$keel_ratio = isset( $keel_palette[ $keel_pair['fg'] ], $keel_palette[ $keel_pair['bg'] ] )
			? Keel\Theme\contrast_ratio( $keel_palette[ $keel_pair['fg'] ]['color'], $keel_palette[ $keel_pair['bg'] ]['color'] )
			: 0.0;
		?>
	<tr><td><?php echo esc_html( $keel_pair['fg'] ); ?></td><td><?php echo esc_html( $keel_pair['bg'] ); ?></td><td><?php echo esc_html( number_format_i18n( $keel_ratio, 2 ) ); ?></td><td><?php echo esc_html( number_format_i18n( $keel_pair['min'], 1 ) ); ?></td><td><?php echo $keel_ratio >= $keel_pair['min'] ? esc_html__( 'Pass', 'keel' ) : esc_html__( 'Fail', 'keel' ); ?></td></tr>
	<?php endforeach; ?>
	</tbody></table></figure>
	<!-- /wp:table -->
</div>
<!-- /wp:group -->
