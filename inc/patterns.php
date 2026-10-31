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
		'hero'         => array( __( 'Hero', 'keel' ), __( 'Openings for the top of a page: image, split, video and text-only heroes.', 'keel' ) ),
		'trust'        => array( __( 'Trust', 'keel' ), __( 'Credentials, ratings, logos and feature lists that build confidence.', 'keel' ) ),
		'services'     => array( __( 'Services', 'keel' ), __( 'Service grids, tiles, tabs and detail sections with prices.', 'keel' ) ),
		'process'      => array( __( 'Process', 'keel' ), __( 'Steps, timelines and statistics that explain how the work goes.', 'keel' ) ),
		'team'         => array( __( 'Team', 'keel' ), __( 'People: team grids and provider cards with ratings and availability.', 'keel' ) ),
		'testimonials' => array( __( 'Testimonials', 'keel' ), __( 'Reviews and quotes in grids, carousels and summaries.', 'keel' ) ),
		'pricing'      => array( __( 'Pricing', 'keel' ), __( 'Price tables, comparison tables, payment plans and offers.', 'keel' ) ),
		'faq'          => array( __( 'FAQ', 'keel' ), __( 'Questions and answers as Details or Accordion blocks.', 'keel' ) ),
		'location'     => array( __( 'Location', 'keel' ), __( 'Hours, address, map placeholder and directions.', 'keel' ) ),
		'gallery'      => array( __( 'Gallery', 'keel' ), __( 'Image galleries with the lightbox on.', 'keel' ) ),
		'cta'          => array( __( 'Calls to action', 'keel' ), __( 'Bands, split calls, phone lines, newsletter and promo blocks.', 'keel' ) ),
		'contact'      => array( __( 'Contact', 'keel' ), __( 'Contact shells and utility rows for a form plugin to fill.', 'keel' ) ),
		'footer'       => array( __( 'Footers', 'keel' ), __( 'Footer layouts with columns or a single line.', 'keel' ) ),
		'blog'         => array( __( 'Blog', 'keel' ), __( 'Post lists, grids, author boxes, related posts and navigation.', 'keel' ) ),
		'pages'        => array( __( 'Pages', 'keel' ), __( 'Whole-page content for 404, no results, accessibility and the style guide.', 'keel' ) ),
		'layouts'      => array( __( 'Page layouts', 'keel' ), __( 'Starter pages offered when a new page is created: service, provider, pricing, offer, about, contact and FAQ.', 'keel' ) ),
		'dental'       => array( __( 'Dental practice', 'keel' ), __( 'A complete dental practice site: sections and pages with fictional copy, prices and people.', 'keel' ) ),
		'cards'        => array( __( 'Cards', 'keel' ), __( 'Listing, row, tile, mini list, ticket and polaroid cards: equal heights in a row, the footer on the bottom edge.', 'keel' ) ),
		'elements'     => array( __( 'Elements', 'keel' ), __( 'Small building blocks: section titles, button rows, ratings, prices, chips, callouts, search panels, breadcrumbs and bands.', 'keel' ) ),
		'places'       => array( __( 'Places', 'keel' ), __( 'Destination and listing pages: heroes with stamps, things to do, itineraries, galleries, price cards and rails.', 'keel' ) ),
		'events'       => array( __( 'Events and deals', 'keel' ), __( 'Event lists by month, event headers, tickets, deals and featured offers.', 'keel' ) ),
		'company'      => array( __( 'Company', 'keel' ), __( 'About, team, careers, press, contact and visitor information sections.', 'keel' ) ),
		'utility'      => array( __( 'Utility pages', 'keel' ), __( 'Coming soon, maintenance, thank you, legal and one-page layouts.', 'keel' ) ),
	);

	foreach ( $categories as $slug => $category ) {
		register_block_pattern_category(
			'keel/' . $slug,
			array(
				/* translators: %s: pattern category name. */
				'label'       => sprintf( __( 'Keel: %s', 'keel' ), $category[0] ),
				'description' => $category[1],
			)
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\\register_pattern_categories' );
