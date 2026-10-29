<?php
/**
 * Measured facts about the installed theme for the facts band.
 *
 * @package KeelDemo
 */

namespace Keel_Demo;

defined( 'ABSPATH' ) || exit;

/**
 * Compressed size of a file, or 0 when it is missing.
 *
 * @param string $path Absolute path.
 * @return int Bytes after gzip at level 9.
 */
function gzip_size( string $path ): int {
	if ( ! is_readable( $path ) ) {
		return 0;
	}
	$contents = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local theme file.
	if ( false === $contents ) {
		return 0;
	}
	$compressed = gzencode( $contents, 9 );
	return false === $compressed ? 0 : strlen( $compressed );
}

/**
 * The numbers the facts band prints, measured from the active theme at render.
 *
 * @return array{css_bytes: int, css_gzip: int, modules: array<string, int>, version: string, release_url: string, patterns: int, variations: int, block_styles: int}
 */
function facts(): array {
	static $facts = null;
	if ( is_array( $facts ) ) {
		return $facts;
	}
	$theme_dir = get_stylesheet_directory();
	$css       = $theme_dir . '/build/css/keel.css';
	$modules   = array();
	$scripts   = glob( $theme_dir . '/build/js/*.js' );
	foreach ( false === $scripts ? array() : $scripts as $script ) {
		$modules[ basename( $script, '.js' ) ] = gzip_size( $script );
	}
	// Counted from the files, not the registry: reading the registry loads every pattern's content,
	// and the facts pattern is one of them, which would recurse into this function.
	$pattern_files = glob( $theme_dir . '/patterns/*.php' );
	$patterns      = false === $pattern_files ? 0 : count( $pattern_files );
	$block_styles  = 0;
	if ( function_exists( 'Keel\\Theme\\block_styles' ) ) {
		foreach ( \Keel\Theme\block_styles() as $styles ) {
			$block_styles += count( $styles );
		}
	}
	$size  = filesize( $css );
	$facts = array(
		'css_bytes'    => false === $size ? 0 : (int) $size,
		'css_gzip'     => gzip_size( $css ),
		'modules'      => $modules,
		'version'      => defined( 'KEEL_VERSION' ) ? (string) KEEL_VERSION : wp_get_theme()->get( 'Version' ),
		'release_url'  => 'https://github.com/df2k2/keel/releases/latest',
		'patterns'     => $patterns,
		'variations'   => count( \WP_Theme_JSON_Resolver::get_style_variations() ),
		'block_styles' => $block_styles,
	);
	return $facts;
}
