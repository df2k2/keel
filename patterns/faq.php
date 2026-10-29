<?php
/**
 * Title: FAQ
 * Slug: keel/faq
 * Categories: keel/faq
 * Keywords: faq, questions, accordion
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Common questions', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:details {"className":"is-style-faq"} -->
	<details class="wp-block-details is-style-faq" name="keel-faq"><summary><?php esc_html_e( 'Do you charge for estimates?', 'keel' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'No. Every visit starts with a free inspection and a written quote, and you decide before any work begins.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</details>
	<!-- /wp:details -->

	<!-- wp:details {"className":"is-style-faq"} -->
	<details class="wp-block-details is-style-faq" name="keel-faq"><summary><?php esc_html_e( 'Are you licensed and insured?', 'keel' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Yes. We hold a current state licence and carry full liability and workers compensation insurance.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</details>
	<!-- /wp:details -->

	<!-- wp:details {"className":"is-style-faq"} -->
	<details class="wp-block-details is-style-faq" name="keel-faq"><summary><?php esc_html_e( 'How soon can you come out?', 'keel' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Most jobs are scheduled within the week, and emergency calls are answered around the clock.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</details>
	<!-- /wp:details -->

	<!-- wp:details {"className":"is-style-faq"} -->
	<details class="wp-block-details is-style-faq" name="keel-faq"><summary><?php esc_html_e( 'What areas do you serve?', 'keel' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'The whole county and the neighbouring towns. Call us if you are not sure and we will tell you straight away.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</details>
	<!-- /wp:details -->
</div>
<!-- /wp:group -->
