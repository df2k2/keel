<?php
/**
 * Living style guide helpers: the values the styleguide-* patterns print are read from the
 * active global settings at render, so the guide follows the applied variation and any edits.
 *
 * @package Keel
 */

namespace Keel\Theme;

defined( 'ABSPATH' ) || exit;

/**
 * The palette in effect: the theme's colours, overridden by the user's (custom origin). Core's
 * default palette is left out because it is not part of Keel.
 *
 * @return array<string, array{name: string, color: string}> Slug => name and hex.
 */
function active_palette(): array {
	$settings = wp_get_global_settings( array( 'color', 'palette' ) );
	$palette  = array();
	foreach ( array( 'theme', 'custom' ) as $origin ) {
		if ( ! isset( $settings[ $origin ] ) || ! is_array( $settings[ $origin ] ) ) {
			continue;
		}
		foreach ( $settings[ $origin ] as $entry ) {
			if ( ! is_array( $entry ) || empty( $entry['slug'] ) || empty( $entry['color'] ) ) {
				continue;
			}
			$palette[ (string) $entry['slug'] ] = array(
				'name'  => (string) ( $entry['name'] ?? $entry['slug'] ),
				'color' => (string) $entry['color'],
			);
		}
	}
	return $palette;
}

/**
 * The foreground/background pairs the theme promises to keep readable, with the minimum ratio.
 * Kept in step with tests/contrast-pairs.json by hand.
 *
 * @return array<int, array{fg: string, bg: string, min: float}>
 */
function contrast_pairs(): array {
	return array(
		array(
			'fg'  => 'contrast',
			'bg'  => 'base',
			'min' => 4.5,
		),
		array(
			'fg'  => 'contrast',
			'bg'  => 'surface',
			'min' => 4.5,
		),
		array(
			'fg'  => 'contrast',
			'bg'  => 'surface-alt',
			'min' => 4.5,
		),
		array(
			'fg'  => 'primary',
			'bg'  => 'base',
			'min' => 4.5,
		),
		array(
			'fg'  => 'primary',
			'bg'  => 'surface',
			'min' => 4.5,
		),
		array(
			'fg'  => 'primary',
			'bg'  => 'surface-alt',
			'min' => 3.0,
		),
		array(
			'fg'  => 'primary-contrast',
			'bg'  => 'primary',
			'min' => 4.5,
		),
		array(
			'fg'  => 'accent-contrast',
			'bg'  => 'accent',
			'min' => 4.5,
		),
		array(
			'fg'  => 'accent',
			'bg'  => 'base',
			'min' => 3.0,
		),
		array(
			'fg'  => 'base',
			'bg'  => 'contrast',
			'min' => 4.5,
		),
		array(
			'fg'  => 'border',
			'bg'  => 'base',
			'min' => 3.0,
		),
		array(
			'fg'  => 'border',
			'bg'  => 'surface',
			'min' => 3.0,
		),
		array(
			'fg'  => 'success',
			'bg'  => 'base',
			'min' => 4.5,
		),
		array(
			'fg'  => 'warning',
			'bg'  => 'base',
			'min' => 4.5,
		),
		array(
			'fg'  => 'error',
			'bg'  => 'base',
			'min' => 4.5,
		),
	);
}

/**
 * Relative luminance of a hex colour per WCAG 2.x.
 *
 * @param string $hex Colour as #RGB or #RRGGBB.
 * @return float Luminance between 0 and 1, or -1 when the value is not a hex colour.
 */
function relative_luminance( string $hex ): float {
	$clean = ltrim( trim( $hex ), '#' );
	if ( 3 === strlen( $clean ) ) {
		$clean = $clean[0] . $clean[0] . $clean[1] . $clean[1] . $clean[2] . $clean[2];
	}
	if ( 1 !== preg_match( '/^[0-9a-f]{6}$/i', $clean ) ) {
		return -1.0;
	}
	$sum = 0.0;
	foreach ( array( 0.2126, 0.7152, 0.0722 ) as $index => $weight ) {
		$channel = hexdec( substr( $clean, $index * 2, 2 ) ) / 255;
		$linear  = $channel <= 0.03928 ? $channel / 12.92 : ( ( $channel + 0.055 ) / 1.055 ) ** 2.4;
		$sum    += $weight * $linear;
	}
	return $sum;
}

/**
 * WCAG contrast ratio between two hex colours.
 *
 * @param string $hex_a First colour.
 * @param string $hex_b Second colour.
 * @return float Ratio between 1 and 21, or 0 when either value is not a hex colour.
 */
function contrast_ratio( string $hex_a, string $hex_b ): float {
	$a = relative_luminance( $hex_a );
	$b = relative_luminance( $hex_b );
	if ( $a < 0 || $b < 0 ) {
		return 0.0;
	}
	return ( max( $a, $b ) + 0.05 ) / ( min( $a, $b ) + 0.05 );
}

/**
 * The font family in effect per slug: the first family name of the stack, theme then custom origin.
 *
 * @return array<string, string> Slug => family name, e.g. "display" => "Bricolage Grotesque".
 */
function active_font_families(): array {
	$settings = wp_get_global_settings( array( 'typography', 'fontFamilies' ) );
	$families = array();
	foreach ( array( 'theme', 'custom' ) as $origin ) {
		if ( ! isset( $settings[ $origin ] ) || ! is_array( $settings[ $origin ] ) ) {
			continue;
		}
		foreach ( $settings[ $origin ] as $entry ) {
			if ( ! is_array( $entry ) || empty( $entry['slug'] ) || empty( $entry['fontFamily'] ) ) {
				continue;
			}
			$first                               = explode( ',', (string) $entry['fontFamily'] )[0];
			$families[ (string) $entry['slug'] ] = trim( $first, " \t\n\r\0\x0B\"'" );
		}
	}
	return $families;
}

/**
 * The theme's style variations with their palettes.
 *
 * @return array<int, array{title: string, palette: array<string, string>}>
 */
function style_variations(): array {
	$variations = array();
	foreach ( \WP_Theme_JSON_Resolver::get_style_variations() as $variation ) {
		$palette = array();
		foreach ( $variation['settings']['color']['palette'] ?? array() as $entry ) {
			if ( is_array( $entry ) && ! empty( $entry['slug'] ) && ! empty( $entry['color'] ) ) {
				$palette[ (string) $entry['slug'] ] = (string) $entry['color'];
			}
		}
		$variations[] = array(
			'title'   => (string) ( $variation['title'] ?? '' ),
			'palette' => $palette,
		);
	}
	usort( $variations, static fn( array $a, array $b ): int => strcmp( $a['title'], $b['title'] ) );
	return $variations;
}

/**
 * Whether a variation's palette is the one in effect (same hex for every slug, case-insensitive).
 *
 * @param array<string, string> $palette Slug => hex.
 * @return bool
 */
function is_active_palette( array $palette ): bool {
	$active = active_palette();
	foreach ( $palette as $slug => $color ) {
		if ( ! isset( $active[ $slug ] ) || strcasecmp( $active[ $slug ]['color'], $color ) !== 0 ) {
			return false;
		}
	}
	return array() !== $palette;
}

/**
 * A small mono label naming the class, style or slug of the element shown after it.
 *
 * @param string $name Class, style name or pattern slug.
 * @return string Serialized paragraph block.
 */
function element_label( string $name ): string {
	return '<!-- wp:paragraph {"className":"keel-element-label","fontSize":"xs"} --><p class="keel-element-label has-xs-font-size"><code>' . esc_html( $name ) . '</code></p><!-- /wp:paragraph -->';
}

/**
 * Block markup for one sample of a registered Keel block style, used by the style guide.
 *
 * @param string $block Block name, e.g. core/table.
 * @param string $style Style name, e.g. striped.
 * @return string Serialized block markup, or an empty string for a block without a sample.
 */
function block_style_sample( string $block, string $style ): string {
	$class = 'is-style-' . $style;
	$image = esc_url( get_theme_file_uri( 'assets/images/placeholder-square.svg' ) );
	$wide  = esc_url( get_theme_file_uri( 'assets/images/placeholder-wide.svg' ) );
	$text  = esc_html__( 'Sample text for this style. Enough words to show the spacing and the colour.', 'keel' );
	$items = array( esc_html__( 'Licensed and insured', 'keel' ), esc_html__( 'Same-day appointments', 'keel' ), esc_html__( 'Written guarantee', 'keel' ), esc_html__( 'Plain-language advice', 'keel' ) );
	$list  = '';
	foreach ( $items as $item ) {
		$list .= '<!-- wp:list-item --><li>' . $item . '</li><!-- /wp:list-item -->';
	}
	$paragraph = '<!-- wp:paragraph --><p>' . $text . '</p><!-- /wp:paragraph -->';

	switch ( $block ) {
		case 'core/button':
			return '<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button {"className":"' . $class . '"} --><div class="wp-block-button ' . $class . '"><a class="wp-block-button__link wp-element-button" href="#styleguide">' . esc_html__( 'Button', 'keel' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons -->';
		case 'core/group':
			return '<!-- wp:group {"className":"' . $class . '","layout":{"type":"constrained"}} --><div class="wp-block-group ' . $class . '">' . $paragraph . '</div><!-- /wp:group -->';
		case 'core/image':
			return '<!-- wp:image {"lightbox":{"enabled":false},"width":"240px","sizeSlug":"full","className":"' . $class . '"} --><figure class="wp-block-image size-full is-resized ' . $class . '"><img src="' . $image . '" alt="" style="width:240px"/></figure><!-- /wp:image -->';
		case 'core/list':
			return '<!-- wp:list {"className":"' . $class . '"} --><ul class="wp-block-list ' . $class . '">' . $list . '</ul><!-- /wp:list -->';
		case 'core/quote':
			return '<!-- wp:quote {"className":"' . $class . '"} --><blockquote class="wp-block-quote ' . $class . '">' . $paragraph . '<cite>' . esc_html__( 'A happy customer', 'keel' ) . '</cite></blockquote><!-- /wp:quote -->';
		case 'core/separator':
			return '<!-- wp:separator {"className":"' . $class . '"} --><hr class="wp-block-separator has-alpha-channel-opacity ' . $class . '"/><!-- /wp:separator -->';
		case 'core/navigation':
			return '<!-- wp:navigation {"overlayMenu":"never","className":"' . $class . '","layout":{"type":"flex"}} --><!-- wp:navigation-link {"label":"' . esc_attr__( 'Home', 'keel' ) . '","url":"#styleguide"} /--><!-- wp:navigation-link {"label":"' . esc_attr__( 'Services', 'keel' ) . '","url":"#styleguide"} /--><!-- wp:navigation-link {"label":"' . esc_attr__( 'Contact', 'keel' ) . '","url":"#styleguide"} /--><!-- /wp:navigation -->';
		case 'core/navigation-submenu':
			return '<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex"}} --><!-- wp:navigation-submenu {"label":"' . esc_attr__( 'Explore', 'keel' ) . '","url":"#styleguide","className":"' . $class . '"} --><!-- wp:navigation-link {"label":"' . esc_attr__( 'Explore', 'keel' ) . '","url":"#styleguide"} /--><!-- wp:navigation-link {"label":"' . esc_attr__( 'Beaches', 'keel' ) . '","url":"#styleguide"} /--><!-- wp:navigation-link {"label":"' . esc_attr__( 'Trails', 'keel' ) . '","url":"#styleguide"} /--><!-- wp:navigation-link {"label":"' . esc_attr__( 'Markets', 'keel' ) . '","url":"#styleguide"} /--><!-- wp:navigation-link {"label":"' . esc_attr__( 'Museums', 'keel' ) . '","url":"#styleguide"} /--><!-- /wp:navigation-submenu --><!-- wp:navigation-link {"label":"' . esc_attr__( 'Contact', 'keel' ) . '","url":"#styleguide"} /--><!-- /wp:navigation -->';
		case 'core/navigation-link':
			return '<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex"}} --><!-- wp:navigation-link {"label":"' . esc_attr__( 'Home', 'keel' ) . '","url":"#styleguide"} /--><!-- wp:navigation-link {"label":"' . esc_attr__( 'Services', 'keel' ) . '","url":"#styleguide"} /--><!-- wp:navigation-link {"label":"' . esc_attr__( 'Book now', 'keel' ) . '","url":"#styleguide","className":"' . $class . '"} /--><!-- /wp:navigation -->';
		case 'core/gallery':
			$figures = '';
			for ( $i = 0; $i < 5; $i++ ) {
				$figures .= '<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} --><figure class="wp-block-image size-large"><img src="' . ( 0 === $i % 2 ? $wide : $image ) . '" alt=""/></figure><!-- /wp:image -->';
			}
			return '<!-- wp:gallery {"linkTo":"none","className":"' . $class . '"} --><figure class="wp-block-gallery has-nested-images columns-default is-cropped ' . $class . '">' . $figures . '</figure><!-- /wp:gallery -->';
		case 'core/details':
			return '<!-- wp:details {"className":"' . $class . '"} --><details class="wp-block-details ' . $class . '"><summary>' . esc_html__( 'Do you charge for estimates?', 'keel' ) . '</summary>' . $paragraph . '</details><!-- /wp:details -->';
		case 'core/columns':
			$card = '<!-- wp:column --><div class="wp-block-column"><!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} --><div class="wp-block-group is-style-card">' . $paragraph . '</div><!-- /wp:group --></div><!-- /wp:column -->';
			return '<!-- wp:columns {"className":"' . $class . '"} --><div class="wp-block-columns ' . $class . '">' . $card . $card . '</div><!-- /wp:columns -->';
		case 'core/cover':
			return '<!-- wp:cover {"url":"' . $wide . '","dimRatio":50,"className":"' . $class . '","layout":{"type":"constrained"}} --><div class="wp-block-cover ' . $class . '"><img class="wp-block-cover__image-background" alt="" src="' . $wide . '" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"lg"} --><p class="has-text-align-center has-lg-font-size">' . $text . '</p><!-- /wp:paragraph --></div></div><!-- /wp:cover -->';
		case 'core/media-text':
			return '<!-- wp:media-text {"mediaType":"image","mediaWidth":42,"className":"' . $class . '"} --><div class="wp-block-media-text is-stacked-on-mobile ' . $class . '" style="grid-template-columns:42% auto"><figure class="wp-block-media-text__media"><img src="' . $wide . '" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":4,"fontSize":"lg"} --><h4 class="wp-block-heading has-lg-font-size">' . esc_html__( 'A row card', 'keel' ) . '</h4><!-- /wp:heading -->' . $paragraph . '</div></div><!-- /wp:media-text -->';
		case 'core/table':
			$row = '<tr><td>' . esc_html__( 'Check-up', 'keel' ) . '</td><td>$85</td><td>' . esc_html__( '30 minutes', 'keel' ) . '</td></tr>';
			return '<!-- wp:table {"className":"' . $class . '"} --><figure class="wp-block-table ' . $class . '"><table><thead><tr><th>' . esc_html__( 'Service', 'keel' ) . '</th><th>' . esc_html__( 'Price', 'keel' ) . '</th><th>' . esc_html__( 'Duration', 'keel' ) . '</th></tr></thead><tbody>' . $row . $row . $row . '</tbody></table></figure><!-- /wp:table -->';
		case 'core/heading':
			return '<!-- wp:heading {"level":4,"className":"' . $class . '"} --><h4 class="wp-block-heading ' . $class . '">' . esc_html__( 'A heading in this style', 'keel' ) . '</h4><!-- /wp:heading -->';
		case 'core/paragraph':
			return '<!-- wp:paragraph {"className":"' . $class . '"} --><p class="' . $class . '">' . $text . '</p><!-- /wp:paragraph -->';
		case 'core/accordion':
			$items = '';
			foreach ( array( esc_html__( 'Do you charge for estimates?', 'keel' ), esc_html__( 'How soon can you come out?', 'keel' ) ) as $question ) {
				$items .= '<!-- wp:accordion-item --><div class="wp-block-accordion-item"><!-- wp:accordion-heading --><h4 class="wp-block-accordion-heading has-icon has-icon-right"><button type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title">' . $question . '</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h4><!-- /wp:accordion-heading --><!-- wp:accordion-panel --><div role="region" class="wp-block-accordion-panel">' . $paragraph . '</div><!-- /wp:accordion-panel --></div><!-- /wp:accordion-item -->';
			}
			return '<!-- wp:accordion {"className":"' . $class . '"} --><div role="group" class="wp-block-accordion ' . $class . '">' . $items . '</div><!-- /wp:accordion -->';
		case 'core/tabs':
			$one = esc_html__( 'Overview', 'keel' );
			$two = esc_html__( 'Details', 'keel' );
			return '<!-- wp:tabs {"className":"' . $class . '"} --><div class="wp-block-tabs ' . $class . '"><!-- wp:tab-list --><div role="tablist" class="wp-block-tab-list"><button type="button" role="tab">' . $one . '</button><button type="button" role="tab">' . $two . '</button></div><!-- /wp:tab-list --><!-- wp:tab-panels --><div class="wp-block-tab-panels"><!-- wp:tab-panel {"label":"' . $one . '"} --><section role="tabpanel" tabindex="0" class="wp-block-tab-panel">' . $paragraph . '</section><!-- /wp:tab-panel --><!-- wp:tab-panel {"label":"' . $two . '"} --><section role="tabpanel" tabindex="0" class="wp-block-tab-panel">' . $paragraph . '</section><!-- /wp:tab-panel --></div><!-- /wp:tab-panels --></div><!-- /wp:tabs -->';
		default:
			return '';
	}
}
