<?php
/**
 * Web font preloads.
 *
 * @package Keel
 */

namespace Keel\Theme;

defined( 'ABSPATH' ) || exit;

const FONT_FILE_PREFIX = 'file:./assets/fonts/';

/**
 * File names under assets/fonts/ of the roman face of the active body and display families.
 *
 * Global settings list font families by origin; a user-applied style variation lives under
 * "custom" and takes precedence over the theme's own list.
 *
 * @return string[] Deduplicated file names, body first.
 */
function font_files_to_preload(): array {
	$settings = wp_get_global_settings();
	$origins  = $settings['typography']['fontFamilies'] ?? array();
	if ( ! is_array( $origins ) ) {
		return array();
	}
	$files = array();
	foreach ( preload_font_slugs() as $slug ) {
		$file = roman_font_file( $origins, $slug );
		if ( '' !== $file ) {
			$files[] = $file;
		}
	}
	return array_values( array_unique( $files ) );
}

/**
 * The family slugs whose roman faces are preloaded: the body family and whichever family the
 * headings use. Keel's own headings use `display`; a variation or a child theme may set them in
 * `serif` or any other family, and then that is the face worth preloading.
 *
 * @return string[] Family slugs, deduplicated, body first.
 */
function preload_font_slugs(): array {
	$slugs = array_values( array_unique( array( 'body', heading_family_slug() ) ) );
	/**
	 * Filters the font family slugs whose roman faces are preloaded.
	 *
	 * @param string[] $slugs Family slugs.
	 */
	return array_values( array_filter( (array) apply_filters( 'keel_preload_font_slugs', $slugs ), 'is_string' ) );
}

/**
 * The font family slug the headings use, read from the merged global styles (theme, variation and
 * child theme): `var:preset|font-family|serif` or `var(--wp--preset--font-family--serif)` both
 * name `serif`.
 *
 * @return string Family slug; `display` when the headings set none.
 */
function heading_family_slug(): string {
	$styles = wp_get_global_styles();
	$family = $styles['elements']['heading']['typography']['fontFamily'] ?? '';
	if ( is_string( $family ) && 1 === preg_match( '/font-family(?:\||--)([a-z0-9-]+)/', $family, $match ) ) {
		return $match[1];
	}
	return 'display';
}

/**
 * Finds the roman font file declared for a family slug, preferring user data over theme data.
 *
 * @param array<string, mixed> $origins Font families keyed by origin.
 * @param string               $slug    Family slug.
 * @return string File name under assets/fonts/, or an empty string when the family has no bundled face.
 */
function roman_font_file( array $origins, string $slug ): string {
	foreach ( array( 'custom', 'theme', 'default' ) as $origin ) {
		if ( empty( $origins[ $origin ] ) || ! is_array( $origins[ $origin ] ) ) {
			continue;
		}
		foreach ( $origins[ $origin ] as $family ) {
			if ( ! is_array( $family ) || ( $family['slug'] ?? '' ) !== $slug ) {
				continue;
			}
			foreach ( (array) ( $family['fontFace'] ?? array() ) as $face ) {
				if ( ! is_array( $face ) || 'normal' !== ( $face['fontStyle'] ?? 'normal' ) ) {
					continue;
				}
				$src = is_array( $face['src'] ?? null ) ? (string) ( $face['src'][0] ?? '' ) : (string) ( $face['src'] ?? '' );
				if ( str_starts_with( $src, FONT_FILE_PREFIX ) ) {
					return substr( $src, strlen( FONT_FILE_PREFIX ) );
				}
			}
			return '';
		}
	}
	return '';
}

/**
 * Adds a preload link for the roman face of the body family and the headings' family.
 *
 * @param array<int, array<string, string>> $resources Preload resources.
 * @return array<int, array<string, string>> Resources with the fonts added.
 */
function preload_fonts( array $resources ): array {
	foreach ( font_files_to_preload() as $file ) {
		$resources[] = array(
			'href'        => get_theme_file_uri( 'assets/fonts/' . $file ),
			'as'          => 'font',
			'type'        => 'font/woff2',
			'crossorigin' => 'anonymous',
		);
	}
	return $resources;
}
add_filter( 'wp_preload_resources', __NAMESPACE__ . '\\preload_fonts' );
