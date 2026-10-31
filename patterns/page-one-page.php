<?php
/**
 * Title: Page: one page
 * Slug: keel/page-one-page
 * Categories: keel/layouts
 * Keywords: page, one page, landing, anchors, sticky header
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: A one-page site for the Landing page template, which has no header of its own: the sticky header part on top, then every section with an anchor.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:template-part {"slug":"header-sticky","area":"header","tagName":"header"} /-->

<!-- wp:pattern {"slug":"keel/hero-text"} /-->

<!-- wp:pattern {"slug":"keel/facts-bar"} /-->

<!-- wp:group {"anchor":"services","layout":{"type":"constrained"}} -->
<div class="wp-block-group" id="services">
	<!-- wp:pattern {"slug":"keel/services-grid-3"} /-->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/steps-row"} /-->

<!-- wp:pattern {"slug":"keel/reviews-row"} /-->

<!-- wp:group {"anchor":"pricing","layout":{"type":"constrained"}} -->
<div class="wp-block-group" id="pricing">
	<!-- wp:pattern {"slug":"keel/pricing-table"} /-->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->

<!-- wp:group {"anchor":"contact","layout":{"type":"constrained"}} -->
<div class="wp-block-group" id="contact">
	<!-- wp:pattern {"slug":"keel/cta-band-primary"} /-->
</div>
<!-- /wp:group -->
