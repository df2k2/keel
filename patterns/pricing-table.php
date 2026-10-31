<?php
/**
 * Title: Pricing table
 * Slug: keel/pricing-table
 * Categories: keel/pricing
 * Keywords: pricing, plans, table
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Simple, upfront pricing', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide","className":"is-style-equal-cards"} -->
	<div class="wp-block-columns alignwide is-style-equal-cards">
		<!-- wp:column -->
		<div class="wp-block-column">
				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Essential', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"keel-stat__number"} -->
				<p class="keel-stat__number">$129</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'per visit', 'keel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"is-style-checkmarks"} -->
				<ul class="wp-block-list is-style-checkmarks">
					<!-- wp:list-item -->
					<li><?php esc_html_e( 'Full diagnostic inspection', 'keel' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php esc_html_e( 'Written quote before work', 'keel' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php esc_html_e( '30-day labour warranty', 'keel' ); ?></li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Choose this plan', 'keel' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
				<!-- wp:paragraph {"className":"keel-tag"} -->
				<p class="keel-tag"><?php esc_html_e( 'Most popular', 'keel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Standard', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"keel-stat__number"} -->
				<p class="keel-stat__number">$249</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'per visit', 'keel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"is-style-checkmarks"} -->
				<ul class="wp-block-list is-style-checkmarks">
					<!-- wp:list-item -->
					<li><?php esc_html_e( 'Everything in Essential', 'keel' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php esc_html_e( 'Same-week scheduling', 'keel' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php esc_html_e( 'Two-year parts and labour warranty', 'keel' ); ?></li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Choose this plan', 'keel' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Care plan', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"keel-stat__number"} -->
				<p class="keel-stat__number">$39</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'per month', 'keel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"is-style-checkmarks"} -->
				<ul class="wp-block-list is-style-checkmarks">
					<!-- wp:list-item -->
					<li><?php esc_html_e( 'Two maintenance visits a year', 'keel' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php esc_html_e( 'Priority emergency response', 'keel' ); ?></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><?php esc_html_e( '15 percent off all repairs', 'keel' ); ?></li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Choose this plan', 'keel' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
