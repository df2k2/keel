<?php
/**
 * Title: Section title with accent
 * Slug: keel/section-title-accent
 * Categories: keel/elements
 * Keywords: section, title, eyebrow, accent, lead
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"44rem"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph {"align":"center","className":"keel-eyebrow"} -->
	<p class="has-text-align-center keel-eyebrow"><?php esc_html_e( 'Plan your visit', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","className":"is-style-accent"} -->
	<h2 class="wp-block-heading has-text-align-center is-style-accent">
	<?php
	/* translators: 1: opening em tag, 2: closing em tag. */
	printf( esc_html__( 'Everything you need for a %1$sweekend by the water%2$s', 'keel' ), '<em>', '</em>' );
	?>
	</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"is-style-lead"} -->
	<p class="has-text-align-center is-style-lead"><?php esc_html_e( 'Beaches, boats, markets and the quiet lanes between them, picked by people who live here.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
