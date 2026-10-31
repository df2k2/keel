<?php
/**
 * Title: Style guide: typography
 * Slug: keel/styleguide-typography
 * Categories: keel/pages
 * Keywords: style guide, typography, fonts, sizes, headings
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_families = Keel\Theme\active_font_families();
$keel_sizes    = wp_get_global_settings( array( 'typography', 'fontSizes' ) );
$keel_sizes    = is_array( $keel_sizes['theme'] ?? null ) ? $keel_sizes['theme'] : array();
$keel_sample   = __( 'Clear prices, honest advice, work that lasts', 'keel' );
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"typography"} -->
	<h2 class="wp-block-heading" id="typography"><?php esc_html_e( 'Typography', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>
	<?php
	foreach ( $keel_families as $keel_slug => $keel_family ) {
		/* translators: 1: font family slug such as body or display, 2: font family name. */
		echo esc_html( sprintf( __( '%1$s: %2$s', 'keel' ), $keel_slug, $keel_family ) ), '. ';
	}
	esc_html_e( 'Fonts are served from the theme, subset to Latin, with metric-matched fallbacks so text does not jump when they load.', 'keel' );
	?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Sizes', 'keel' ); ?></h3>
	<!-- /wp:heading -->
	<?php
	foreach ( $keel_sizes as $keel_size ) :
		$keel_fluid = is_array( $keel_size['fluid'] ?? null ) ? $keel_size['fluid'] : array();
		$keel_min   = (string) ( $keel_fluid['min'] ?? $keel_size['size'] );
		$keel_max   = (string) ( $keel_fluid['max'] ?? $keel_size['size'] );
		$keel_range = $keel_min === $keel_max ? $keel_min : $keel_min . ' to ' . $keel_max;
		if ( str_ends_with( $keel_min, 'rem' ) && str_ends_with( $keel_max, 'rem' ) ) {
			$keel_range .= sprintf( ' (%dpx to %dpx)', (int) round( (float) $keel_min * 16 ), (int) round( (float) $keel_max * 16 ) );
		}
		?>
	<!-- wp:paragraph {"fontSize":"<?php echo esc_attr( $keel_size['slug'] ); ?>"} -->
	<p class="has-<?php echo esc_attr( $keel_size['slug'] ); ?>-font-size"><?php echo esc_html( $keel_sample ); ?> <code><?php echo esc_html( $keel_size['slug'] . ' = ' . $keel_range ); ?></code></p>
	<!-- /wp:paragraph -->
	<?php endforeach; ?>

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Headings', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","lineHeight":"1.1","letterSpacing":"-0.015em"}},"fontSize":"display","fontFamily":"display"} -->
	<p class="has-display-font-family has-display-font-size" style="font-weight:600;line-height:1.1;letter-spacing:-0.015em"><?php esc_html_e( 'Display and heading one (shown as a paragraph: this page already has its h1)', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
	<?php for ( $keel_level = 2; $keel_level <= 6; $keel_level++ ) : ?>
	<!-- wp:heading {"level":<?php echo (int) $keel_level; ?>} -->
	<h<?php echo (int) $keel_level; ?> class="wp-block-heading">
		<?php
		/* translators: %d: heading level from 2 to 6. */
		echo esc_html( sprintf( __( 'Heading level %d', 'keel' ), $keel_level ) );
		?>
	</h<?php echo (int) $keel_level; ?>>
	<!-- /wp:heading -->
	<?php endfor; ?>

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'Inline elements', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Body text with', 'keel' ); ?> <a href="#typography"><?php esc_html_e( 'a link', 'keel' ); ?></a>, <strong><?php esc_html_e( 'strong emphasis', 'keel' ); ?></strong>, <em><?php esc_html_e( 'italic emphasis', 'keel' ); ?></em>, <code>inline code</code>, <kbd>Ctrl</kbd> + <kbd>K</kbd>, <mark><?php esc_html_e( 'a highlight', 'keel' ); ?></mark>, <abbr title="<?php esc_attr_e( 'Web Content Accessibility Guidelines', 'keel' ); ?>">WCAG</abbr> <?php esc_html_e( 'and a footnote marker', 'keel' ); ?><sup>1</sup>.</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
