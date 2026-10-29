<?php
/**
 * Seeds the local site: a Home page built from the hero pattern, set as the static front page.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/bin/seed.php
 *
 * @package Keel
 */

$keel_home = get_page_by_path( 'home' );
if ( $keel_home instanceof WP_Post ) {
	$keel_home_id = $keel_home->ID;
} else {
	$keel_home_id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => 'Home',
			'post_name'    => 'home',
			'post_content' => '<!-- wp:pattern {"slug":"keel/hero-text"} /-->',
		),
		true
	);
	if ( is_wp_error( $keel_home_id ) ) {
		WP_CLI::error( $keel_home_id->get_error_message() );
	}
}
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $keel_home_id );
update_option( 'blogname', 'Keel demo' );
update_option( 'blogdescription', 'A security-first block theme' );
WP_CLI::success( "Home page {$keel_home_id} is the front page." );
