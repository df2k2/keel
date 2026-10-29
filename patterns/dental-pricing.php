<?php
/**
 * Title: Dental page: prices
 * Slug: keel/dental-pricing
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, page, prices, pricing
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","level":1} -->
	<h1 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Prices', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"is-style-lead"} -->
	<p class="has-text-align-center is-style-lead"><?php esc_html_e( 'The price on this page is the price at the desk. Where treatment depends on your examination, you get the range in writing first.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/dental-price-list"} /-->

<!-- wp:pattern {"slug":"keel/dental-payment-plan"} /-->

<!-- wp:pattern {"slug":"keel/dental-insurers"} /-->

<!-- wp:pattern {"slug":"keel/dental-faq"} /-->

<!-- wp:pattern {"slug":"keel/dental-booking"} /-->

<!-- wp:pattern {"slug":"keel/dental-disclaimer"} /-->
