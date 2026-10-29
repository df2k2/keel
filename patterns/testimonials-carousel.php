<?php
/**
 * Title: Testimonials carousel
 * Slug: keel/testimonials-carousel
 * Categories: keel/testimonials
 * Keywords: testimonials, carousel, slider
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:group {"align":"wide","className":"keel-carousel","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide keel-carousel">
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'What customers say', 'keel' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"keel-carousel__track"} -->
		<div class="wp-block-group keel-carousel__track">
		<!-- wp:quote {"className":"is-style-testimonial"} -->
		<blockquote class="wp-block-quote is-style-testimonial">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'They showed up on time, explained everything and left the place spotless. Could not ask for more.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
			<cite><?php esc_html_e( 'Maria G.', 'keel' ); ?>, <?php esc_html_e( 'Homeowner', 'keel' ); ?></cite>
		</blockquote>
		<!-- /wp:quote -->

		<!-- wp:quote {"className":"is-style-testimonial"} -->
		<blockquote class="wp-block-quote is-style-testimonial">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Fair price, no upsell, and the repair has held up for two years now.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
			<cite><?php esc_html_e( 'Daniel R.', 'keel' ); ?>, <?php esc_html_e( 'Restaurant owner', 'keel' ); ?></cite>
		</blockquote>
		<!-- /wp:quote -->

		<!-- wp:quote {"className":"is-style-testimonial"} -->
		<blockquote class="wp-block-quote is-style-testimonial">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'The only company I trust with our rental properties. Fast and professional every single time.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
			<cite><?php esc_html_e( 'Aisha K.', 'keel' ); ?>, <?php esc_html_e( 'Property manager', 'keel' ); ?></cite>
		</blockquote>
		<!-- /wp:quote -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
