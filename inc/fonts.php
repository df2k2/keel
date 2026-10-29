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
	foreach ( array( 'body', 'display' ) as $slug ) {
		$file = roman_font_file( $origins, $slug );
		if ( '' !== $file ) {
			$files[] = $file;
		}
	}
	return array_values( array_unique( $files ) );
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
 * Adds a preload link for the roman face of each active web font.
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
