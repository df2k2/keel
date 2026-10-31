<?php
/**
 * Asserts that every theme pattern is registered and renders.
 *
 * Run inside wp-env: wp eval-file wp-content/themes/keel/tests/wp/patterns.php
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

const KEEL_PATTERNS    = array(
	'hero-image',
	'hero-split',
	'hero-video',
	'hero-text',
	'trust-bar',
	'services-grid-3',
	'services-grid-4',
	'services-grid-6',
	'service-detail',
	'process-steps',
	'stats-band',
	'team-grid',
	'testimonials-grid',
	'testimonials-carousel',
	'reviews-summary',
	'pricing-table',
	'faq',
	'hours-location',
	'gallery',
	'cta-band-primary',
	'cta-band-contrast',
	'cta-split',
	'cta-phone',
	'contact-shell',
	'footer-columns',
	'footer-simple',
	'blog-list',
	'blog-grid',
	'404-content',
	'accessibility-statement',
	'no-results',
	'mobile-cta-bar',
	'announcement-bar',
	'hero-booking',
	'services-grid-prices',
	'category-tiles',
	'services-tabs',
	'logo-band',
	'features-icons',
	'before-after',
	'providers-grid',
	'payment-plan-band',
	'comparison-table',
	'offer-card',
	'newsletter-band',
	'promo-band',
	'utility-bar',
	'timeline',
	'media-text-steps',
	'author-box',
	'related-posts',
	'post-navigation',
	'listing-grid',
	'listing-list',
	'event-grid',
	'faq-accordion',
	'page-service-detail',
	'page-provider',
	'page-pricing',
	'page-landing-offer',
	'page-about',
	'page-contact',
	'page-faq',
	'styleguide-colors',
	'styleguide-typography',
	'styleguide-spacing',
	'styleguide-shape',
	'styleguide-buttons',
	'styleguide-forms',
	'styleguide-block-styles',
	'styleguide-icons',
	'styleguide-variations',
	'styleguide',
	'dental-hero',
	'dental-treatments',
	'dental-before-after',
	'dental-features',
	'dental-dentists',
	'dental-price-list',
	'dental-payment-plan',
	'dental-stories',
	'dental-insurers',
	'dental-faq',
	'dental-booking',
	'dental-urgent',
	'dental-disclaimer',
	'dental-home',
	'dental-service-whitening',
	'dental-service-implants',
	'dental-provider',
	'dental-pricing',
	'dental-landing-implants',
	'dental-about',
	'dental-contact',
	'card-listing',
	'card-listing-amenities',
	'card-row',
	'cards-row-list',
	'tile',
	'tiles-grid',
	'mini-list',
	'mini-list-posts',
	'ticket',
	'tickets-list',
	'polaroid-trio',
	'rail-cards',
	'utility-bar-contact',
	'section-title-accent',
	'button-row',
	'rating',
	'price-formats',
	'subscribe-inline',
	'search-panel',
	'journal-card',
	'journal-grid',
	'feature-article',
	'profile-card',
	'profiles-grid',
	'review-card',
	'reviews-row',
	'marquee-band',
	'filter-chips',
	'itinerary',
	'steps-row',
	'deal-card',
	'deals-grid',
	'callouts',
	'table-departures',
	'table-best-time',
	'breadcrumb-row',
	'facts-bar',
	'map-card',
	'footer-big',
	'floating-cta',
	'place-hero',
	'place-things-to-do',
	'places-rail',
	'listing-gallery',
	'listing-price-card',
	'listing-included',
	'events-month',
	'event-header',
	'deal-featured',
	'story-timeline',
	'careers-openings',
	'press-kit',
	'contact-hours',
	'utility-panel',
	'legal-contents',
	'page-journal',
	'page-places',
	'page-place',
	'page-listings',
	'page-listing',
	'page-events',
	'page-event',
	'page-deals',
	'page-about-story',
	'page-team',
	'page-careers',
	'page-press',
	'page-contact-map',
	'page-visitor-info',
	'page-coming-soon',
	'page-maintenance',
	'page-thank-you',
	'page-legal',
	'page-one-page',
);
const KEEL_H1_PATTERNS = array( 'hero-image', 'hero-split', 'hero-video', 'hero-text', 'hero-booking', 'page-service-detail', 'page-provider', 'page-pricing', 'page-landing-offer', 'page-about', 'page-contact', 'page-faq', 'styleguide', 'dental-hero', 'dental-home', 'dental-service-whitening', 'dental-service-implants', 'dental-provider', 'dental-pricing', 'dental-landing-implants', 'dental-about', 'dental-contact', 'blog-list', '404-content', 'accessibility-statement', 'place-hero', 'event-header', 'utility-panel', 'page-journal', 'page-places', 'page-place', 'page-listings', 'page-listing', 'page-events', 'page-event', 'page-deals', 'page-about-story', 'page-team', 'page-careers', 'page-press', 'page-contact-map', 'page-visitor-info', 'page-coming-soon', 'page-maintenance', 'page-thank-you', 'page-legal', 'page-one-page' );

$keel_registry = WP_Block_Patterns_Registry::get_instance();
foreach ( KEEL_PATTERNS as $keel_slug ) {
	if ( ! $keel_registry->is_registered( 'keel/' . $keel_slug ) ) {
		WP_CLI::error( "keel/{$keel_slug} is not registered." );
	}
	$keel_html = do_blocks( '<!-- wp:pattern {"slug":"keel/' . $keel_slug . '"} /-->' );
	if ( '' === trim( $keel_html ) ) {
		WP_CLI::error( "keel/{$keel_slug} rendered nothing." );
	}
	if ( str_contains( $keel_html, '<!-- wp:' ) ) {
		WP_CLI::error( "keel/{$keel_slug} left block comments in its output." );
	}
	$keel_h1       = substr_count( $keel_html, '<h1' );
	$keel_expected = in_array( $keel_slug, KEEL_H1_PATTERNS, true ) ? 1 : 0;
	if ( $keel_h1 !== $keel_expected ) {
		WP_CLI::error( "keel/{$keel_slug} renders {$keel_h1} h1 elements, expected {$keel_expected}." );
	}
}
$keel_carousel = do_blocks( '<!-- wp:pattern {"slug":"keel/testimonials-carousel"} /-->' );
if ( ! str_contains( $keel_carousel, 'keel-carousel__track' ) || 3 !== substr_count( $keel_carousel, 'wp-block-quote is-style-testimonial' ) ) {
	WP_CLI::error( 'keel/testimonials-carousel must render a keel-carousel__track with three testimonial quotes.' );
}
$keel_faq = do_blocks( '<!-- wp:pattern {"slug":"keel/faq"} /-->' );
if ( 4 !== substr_count( $keel_faq, '<details' ) || 4 !== substr_count( $keel_faq, 'name="keel-faq"' ) ) {
	WP_CLI::error( 'keel/faq must render four details elements named keel-faq.' );
}
$keel_accordion = do_blocks( '<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->' );
if ( 4 !== substr_count( $keel_accordion, 'class="wp-block-accordion-item ' ) || 1 !== substr_count( $keel_accordion, ' is-open"' ) ) {
	WP_CLI::error( 'keel/faq-accordion must render four accordion items with exactly the first one open.' );
}
$keel_gallery = do_blocks( '<!-- wp:pattern {"slug":"keel/gallery"} /-->' );
if ( 6 !== substr_count( $keel_gallery, '<img' ) ) {
	WP_CLI::error( 'keel/gallery must render six images, found ' . substr_count( $keel_gallery, '<img' ) . '.' );
}
foreach ( array( 'footer-columns', 'footer-simple' ) as $keel_footer ) {
	if ( ! str_contains( do_blocks( '<!-- wp:pattern {"slug":"keel/' . $keel_footer . '"} /-->' ), date_i18n( 'Y' ) ) ) {
		WP_CLI::error( "keel/{$keel_footer} must print the current year." );
	}
}
$keel_404 = do_blocks( '<!-- wp:pattern {"slug":"keel/404-content"} /-->' );
if ( ! str_contains( $keel_404, 'wp-block-search' ) ) {
	WP_CLI::error( 'keel/404-content must contain a search block.' );
}
$keel_a11y = do_blocks( '<!-- wp:pattern {"slug":"keel/accessibility-statement"} /-->' );
if ( 6 !== substr_count( $keel_a11y, '<h2' ) ) {
	WP_CLI::error( 'keel/accessibility-statement must have six h2 sections, found ' . substr_count( $keel_a11y, '<h2' ) . '.' );
}
WP_CLI::success( count( KEEL_PATTERNS ) . ' patterns registered and rendering.' );
