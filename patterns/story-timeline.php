<?php
/**
 * Title: Story timeline
 * Slug: keel/story-timeline
 * Categories: keel/company
 * Keywords: about, story, timeline, polaroids, stamp
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center">
	<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
		<!-- wp:pattern {"slug":"keel/timeline"} /-->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
		<!-- wp:group {"className":"keel-stamp-holder","layout":{"type":"constrained"}} -->
		<div class="wp-block-group keel-stamp-holder">
			<!-- wp:paragraph {"className":"keel-stamp keel-stamp--corner"} -->
			<p class="keel-stamp keel-stamp--corner"><?php esc_html_e( 'Since 2009', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:pattern {"slug":"keel/polaroid-trio"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
