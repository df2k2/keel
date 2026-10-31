<?php
/**
 * Title: Page: place
 * Slug: keel/page-place
 * Categories: keel/layouts
 * Keywords: page, place, region, hero, itinerary, faq
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: One place: breadcrumb, hero with a stamp, facts bar, things to do, an itinerary, questions, a map and nearby places.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:pattern {"slug":"keel/breadcrumb-row"} /-->

<!-- wp:pattern {"slug":"keel/place-hero"} /-->

<!-- wp:pattern {"slug":"keel/facts-bar"} /-->

<!-- wp:pattern {"slug":"keel/place-things-to-do"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:pattern {"slug":"keel/itinerary"} /-->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"anchor":"map","layout":{"type":"constrained","contentSize":"40rem"}} -->
	<div class="wp-block-group" id="map">
		<!-- wp:pattern {"slug":"keel/map-card"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/places-rail"} /-->
