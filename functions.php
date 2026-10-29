<?php
/**
 * Keel theme bootstrap.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

define( 'KEEL_VERSION', '0.2.0' );

require get_theme_file_path( 'inc/setup.php' );
require get_theme_file_path( 'inc/enqueue.php' );
require get_theme_file_path( 'inc/fonts.php' );
require get_theme_file_path( 'inc/block-styles.php' );
require get_theme_file_path( 'inc/interactivity.php' );
require get_theme_file_path( 'inc/speculation.php' );
require get_theme_file_path( 'inc/patterns.php' );
require get_theme_file_path( 'inc/styleguide.php' );
