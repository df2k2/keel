<?php
/**
 * Runs the Theme Check plugin against the packaged theme and exits non-zero on
 * REQUIRED or WARNING findings.
 *
 * Run inside wp-env:
 *   wp eval-file wp-content/themes/keel/bin/run-theme-check.php <theme-root-relative-to-ABSPATH>
 *
 * @package Keel
 */

if ( ! function_exists( 'run_themechecks_against_theme' ) ) {
	WP_CLI::error( 'The Theme Check plugin is not active.' );
}

/** @var string[] $args Positional arguments passed by wp eval-file. */
$keel_root  = isset( $args[0] ) ? ABSPATH . ltrim( $args[0], '/' ) : get_theme_root();
$keel_theme = wp_get_theme( 'keel', $keel_root );
if ( ! $keel_theme->exists() ) {
	WP_CLI::error( "No theme 'keel' under {$keel_root}." );
}

run_themechecks_against_theme( $keel_theme, 'keel' );

$keel_counts = array(
	'REQUIRED' => 0,
	'WARNING'  => 0,
	'INFO'     => 0,
);
foreach ( $GLOBALS['themechecks'] as $keel_check ) {
	foreach ( (array) $keel_check->getError() as $keel_error ) {
		if ( str_contains( $keel_error, 'tc-required' ) ) {
			$keel_level = 'REQUIRED';
		} elseif ( str_contains( $keel_error, 'tc-warning' ) ) {
			$keel_level = 'WARNING';
		} else {
			$keel_level = 'INFO';
		}
		++$keel_counts[ $keel_level ];
		WP_CLI::log( '[' . $keel_level . '] ' . trim( html_entity_decode( wp_strip_all_tags( $keel_error ), ENT_QUOTES ) ) );
	}
}

WP_CLI::log( sprintf( 'Theme Check: %d required, %d warnings, %d info', $keel_counts['REQUIRED'], $keel_counts['WARNING'], $keel_counts['INFO'] ) );
if ( $keel_counts['REQUIRED'] > 0 || $keel_counts['WARNING'] > 0 ) {
	WP_CLI::error( 'Theme Check found blocking issues.' );
}
WP_CLI::success( 'Theme Check passed.' );
