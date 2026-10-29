<?php
/**
 * Title: Service detail
 * Slug: keel/service-detail
 * Categories: keel/services
 * Keywords: service, detail, checklist
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
	<h2 class="wp-block-heading"><?php esc_html_e( 'Repairs that last', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"lg"} -->
	<p class="has-lg-font-size"><?php esc_html_e( 'We diagnose the real cause, explain the options in plain language and fix it properly the first time.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Every visit starts with a full inspection and a written quote. You approve the work before we start, and we leave the space as clean as we found it.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:list {"className":"is-style-checkmarks"} -->
	<ul class="wp-block-list is-style-checkmarks">
		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Upfront, written pricing before work starts', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Background-checked, uniformed technicians', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Parts and labour guaranteed for two years', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Clean work areas, every time', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Same-week appointments in most areas', 'keel' ); ?></li>
		<!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/shield.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image -->

				<!-- wp:paragraph -->
				<p><strong><?php esc_html_e( 'Licensed and insured', 'keel' ); ?></strong></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/star.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image -->

				<!-- wp:paragraph -->
				<p><strong><?php esc_html_e( '4.9 rating', 'keel' ); ?></strong></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/clock.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image -->

				<!-- wp:paragraph -->
				<p><strong><?php esc_html_e( 'Same-day service', 'keel' ); ?></strong></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Book a visit', 'keel' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-ghost"} -->
		<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="tel:+15555550100"><?php esc_html_e( 'Call us', 'keel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
