<?php
/**
 * Title: Page: event
 * Slug: keel/page-event
 * Categories: keel/layouts
 * Keywords: page, event, ticket, venue, map
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: One event: breadcrumb, the ticket header, the story, a venue map card and more events this month.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:pattern {"slug":"keel/breadcrumb-row"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:pattern {"slug":"keel/event-header"} /-->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Forty stalls on the green, the fish counter open late, two bands and the lanterns going up at dusk. Bring a bag for the bread and cash for the tastings; everything else takes cards.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Parking fills early. The town lot on Flagler Street is free after 6 pm, and the bike racks by the clock tower are lit all night.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"anchor":"map","layout":{"type":"constrained","contentSize":"40rem"}} -->
	<div class="wp-block-group" id="map">
		<!-- wp:heading {"level":2} -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Where it is', 'keel' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:pattern {"slug":"keel/map-card"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'More this month', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:pattern {"slug":"keel/tickets-list"} /-->
</div>
<!-- /wp:group -->
