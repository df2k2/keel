<?php
/**
 * Seeds the local site with the demo content: pages built from the theme's patterns,
 * three posts, a navigation menu and the front and posts pages.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/bin/seed.php [attachment-id]
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

/** @var string[] $args Positional arguments passed by wp eval-file. */
$keel_attachment = isset( $args[0] ) ? (int) $args[0] : 0;

/**
 * Creates or updates a page whose content is a list of theme patterns.
 *
 * @param string   $slug     Page slug.
 * @param string   $title    Page title.
 * @param string[] $patterns Pattern slugs without the keel/ prefix; a value starting with "<" is raw block markup.
 * @param string   $template Custom template slug, or an empty string for the default.
 * @param string   $excerpt  Page excerpt.
 * @return int Page ID.
 */
function keel_seed_page( string $slug, string $title, array $patterns, string $template = '', string $excerpt = '' ): int {
	$blocks = array();
	foreach ( $patterns as $pattern ) {
		$blocks[] = str_starts_with( $pattern, '<' ) ? $pattern : '<!-- wp:pattern {"slug":"keel/' . $pattern . '"} /-->';
	}
	$data     = array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_title'   => $title,
		'post_name'    => $slug,
		'post_content' => implode( "\n\n", $blocks ),
		'post_excerpt' => $excerpt,
	);
	$existing = get_page_by_path( $slug );
	if ( $existing instanceof WP_Post ) {
		$data['ID'] = $existing->ID;
		$id         = wp_update_post( wp_slash( $data ), true );
	} else {
		$id = wp_insert_post( wp_slash( $data ), true );
	}
	if ( is_wp_error( $id ) ) {
		WP_CLI::error( $id->get_error_message() );
	}
	if ( '' !== $template ) {
		update_post_meta( $id, '_wp_page_template', $template );
	} else {
		delete_post_meta( $id, '_wp_page_template' );
	}
	return $id;
}

$keel_pages = array(
	'home'     => keel_seed_page( 'home', 'Home', array( 'hero-image', 'trust-bar', 'services-grid-3', 'process-steps', 'stats-band', 'testimonials-carousel', 'faq', 'hours-location', 'cta-band-primary' ) ),
	'service'  => keel_seed_page( 'service', 'Repairs', array( 'service-detail', 'team-grid', 'pricing-table', 'faq', 'cta-split' ), 'page-service', 'Fast, lasting fixes for the problems that stop your day.' ),
	'location' => keel_seed_page( 'location', 'Our location', array( 'hours-location', 'gallery', 'cta-phone' ), 'page-location', 'Find us in the heart of Stuart, with parking at the door.' ),
	'landing'  => keel_seed_page( 'landing', 'Spring offer', array( 'hero-text', 'services-grid-3', 'cta-split' ), 'page-landing' ),
	'contact'  => keel_seed_page( 'contact', 'Contact', array( 'hero-split', 'contact-shell' ), 'page-no-title' ),
	'plain'    => keel_seed_page( 'transparent-plain', 'Plain page', array( '<!-- wp:heading {"level":1} --><h1 class="wp-block-heading">Plain page</h1><!-- /wp:heading -->', '<!-- wp:paragraph --><p>A page whose first block is not a cover, so the transparent header stays solid.</p><!-- /wp:paragraph -->', 'services-grid-4', 'testimonials-grid', 'reviews-summary', 'cta-band-contrast' ), 'page-no-title' ),
	'a11y'     => keel_seed_page( 'accessibility-statement', 'Accessibility statement', array( 'accessibility-statement' ), 'page-no-title' ),
	'blog'     => keel_seed_page( 'blog', 'Blog', array() ),
);

$keel_category = term_exists( 'news', 'category' );
if ( ! is_array( $keel_category ) ) {
	$keel_category = wp_insert_term( 'News', 'category', array( 'slug' => 'news' ) );
}
$keel_category_id = is_array( $keel_category ) ? (int) $keel_category['term_id'] : 0;

$keel_posts = array(
	'spring-maintenance-checklist' => array( 'Your spring maintenance checklist', 'Five quick checks before the busy season starts, and when to call us instead.' ),
	'why-written-quotes-matter'    => array( 'Why written quotes matter', 'An upfront price protects you and keeps us honest. Here is how ours work.' ),
	'meet-the-new-service-van'     => array( 'Meet the new service van', 'Stocked for ninety percent of repairs on the first visit, so fewer return trips.' ),
);
foreach ( $keel_posts as $keel_slug => $keel_post ) {
	$keel_existing = get_page_by_path( $keel_slug, OBJECT, 'post' );
	$keel_data     = array(
		'post_type'     => 'post',
		'post_status'   => 'publish',
		'post_title'    => $keel_post[0],
		'post_name'     => $keel_slug,
		'post_content'  => '<!-- wp:paragraph --><p>' . $keel_post[1] . '</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Every visit starts with a full inspection and a written quote. You approve the work before we start, and we leave the space as clean as we found it.</p><!-- /wp:paragraph -->',
		'post_category' => $keel_category_id > 0 ? array( $keel_category_id ) : array(),
	);
	if ( $keel_existing instanceof WP_Post ) {
		$keel_data['ID'] = $keel_existing->ID;
		$keel_id         = wp_update_post( wp_slash( $keel_data ), true );
	} else {
		$keel_id = wp_insert_post( wp_slash( $keel_data ), true );
	}
	if ( is_wp_error( $keel_id ) ) {
		WP_CLI::error( $keel_id->get_error_message() );
	}
	if ( $keel_attachment > 0 ) {
		set_post_thumbnail( $keel_id, $keel_attachment );
	}
}

$keel_menu = get_posts(
	array(
		'post_type'      => 'wp_navigation',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
	)
);
if ( array() === $keel_menu ) {
	$keel_links      = '';
	$keel_menu_items = array(
		'service'  => 'Services',
		'location' => 'Location',
		'blog'     => 'Blog',
		'contact'  => 'Contact',
	);
	foreach ( $keel_menu_items as $keel_key => $keel_label ) {
		$keel_links .= sprintf(
			'<!-- wp:navigation-link {"label":"%1$s","type":"page","id":%2$d,"url":"%3$s","kind":"post-type"} /-->' . "\n",
			$keel_label,
			$keel_pages[ $keel_key ],
			get_permalink( $keel_pages[ $keel_key ] )
		);
	}
	$keel_menu_id = wp_insert_post(
		wp_slash(
			array(
				'post_type'    => 'wp_navigation',
				'post_status'  => 'publish',
				'post_title'   => 'Primary',
				'post_name'    => 'primary',
				'post_content' => $keel_links,
			)
		),
		true
	);
	if ( is_wp_error( $keel_menu_id ) ) {
		WP_CLI::error( $keel_menu_id->get_error_message() );
	}
}

update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $keel_pages['home'] );
update_option( 'page_for_posts', $keel_pages['blog'] );
update_option( 'blogname', 'Keel demo' );
update_option( 'blogdescription', 'A security-first block theme' );
WP_CLI::success( sprintf( 'Seeded %d pages, %d posts and the Primary menu; home page %d is the front page.', count( $keel_pages ), count( $keel_posts ), $keel_pages['home'] ) );
