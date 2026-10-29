<?php
/**
 * Block pattern categories.
 *
 * @package Keel
 */

namespace Keel\Theme;

defined( 'ABSPATH' ) || exit;

/**
 * Registers the theme's pattern categories.
 *
 * @return void
 */
function register_pattern_categories(): void {
	$categories = array(
		'hero'         => __( 'Hero', 'keel' ),
		'trust'        => __( 'Trust', 'keel' ),
		'services'     => __( 'Services', 'keel' ),
		'process'      => __( 'Process', 'keel' ),
		'team'         => __( 'Team', 'keel' ),
		'testimonials' => __( 'Testimonials', 'keel' ),
		'pricing'      => __( 'Pricing', 'keel' ),
		'faq'          => __( 'FAQ', 'keel' ),
		'location'     => __( 'Location', 'keel' ),
		'gallery'      => __( 'Gallery', 'keel' ),
		'cta'          => __( 'Calls to action', 'keel' ),
		'contact'      => __( 'Contact', 'keel' ),
		'footer'       => __( 'Footers', 'keel' ),
		'blog'         => __( 'Blog', 'keel' ),
		'pages'        => __( 'Pages', 'keel' ),
	);

	foreach ( $categories as $slug => $label ) {
		register_block_pattern_category(
			'keel/' . $slug,
			array(
				/* translators: %s: pattern category name. */
				'label' => sprintf( __( 'Keel: %s', 'keel' ), $label ),
			)
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\\register_pattern_categories' );
