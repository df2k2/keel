<?php
/**
 * Title: Events: month
 * Slug: keel/events-month
 * Categories: keel/events
 * Keywords: events, month, tickets, list
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"className":"is-style-accent"} -->
	<h2 class="wp-block-heading is-style-accent">
	<?php
	/* translators: 1: opening em tag, 2: closing em tag. */
	printf( esc_html__( 'March, %1$sthe busy month%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h2>
	<!-- /wp:heading -->

	<!-- wp:pattern {"slug":"keel/tickets-list"} /-->
</div>
<!-- /wp:group -->
