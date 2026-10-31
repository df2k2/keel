<?php
/**
 * Title: Page: about with story
 * Slug: keel/page-about-story
 * Categories: keel/layouts
 * Keywords: page, about, story, timeline, team
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 * Description: An about page: split hero, the story timeline with polaroids, the stats band, the team and a closing call.
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:pattern {"slug":"keel/hero-split"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:pattern {"slug":"keel/story-timeline"} /-->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/stats-band"} /-->

<!-- wp:pattern {"slug":"keel/profiles-grid"} /-->

<!-- wp:pattern {"slug":"keel/cta-split"} /-->
