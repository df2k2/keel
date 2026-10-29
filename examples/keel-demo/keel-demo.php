<?php
/**
 * Plugin Name: Keel demo
 * Plugin URI: https://github.com/df2k2/keel
 * Description: Showcase-only pieces for the Keel demo site: showcase patterns, the per-request variation switcher, the measured facts band and the wp keel-demo seed command. Not for production sites.
 * Version: 0.2.0
 * Requires at least: 7.1
 * Requires PHP: 8.3
 * Author: Chris Snedaker
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: keel-demo
 *
 * @package KeelDemo
 */

namespace Keel_Demo;

defined( 'ABSPATH' ) || exit;

const VERSION = '0.2.0';
const FILE    = __FILE__;

require __DIR__ . '/inc/facts.php';
require __DIR__ . '/inc/switcher.php';

/**
 * Registers the showcase pattern category and every pattern in patterns/, read lazily from its file.
 *
 * @return void
 */
function register_patterns(): void {
	register_block_pattern_category(
		'keel-demo',
		array(
			'label'       => __( 'Keel demo', 'keel-demo' ),
			'description' => __( 'Patterns that only make sense on the Keel showcase site.', 'keel-demo' ),
		)
	);
	$files = glob( __DIR__ . '/patterns/*.php' );
	if ( false === $files ) {
		return;
	}
	foreach ( $files as $file ) {
		$headers = get_file_data(
			$file,
			array(
				'title'       => 'Title',
				'slug'        => 'Slug',
				'description' => 'Description',
				'inserter'    => 'Inserter',
			)
		);
		if ( '' === $headers['slug'] || '' === $headers['title'] ) {
			continue;
		}
		register_block_pattern(
			$headers['slug'],
			array(
				'title'       => $headers['title'],
				'description' => $headers['description'],
				'categories'  => array( 'keel-demo' ),
				'inserter'    => 'no' !== strtolower( $headers['inserter'] ),
				'filePath'    => $file,
			)
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\\register_patterns', 20 );

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require __DIR__ . '/inc/class-seed-command.php';
	\WP_CLI::add_command( 'keel-demo', Seed_Command::class );
}
