<?php
/**
 * Title: Footer: columns
 * Slug: keel/footer-columns
 * Categories: keel/footer
 * Keywords: footer, columns, links
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_copyright = sprintf(
	/* translators: 1: current year, 2: site name. */
	__( '© %1$s %2$s', 'keel' ),
	date_i18n( 'Y' ),
	get_bloginfo( 'name' )
);
?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:site-title {"level":0,"fontSize":"lg"} /-->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Local, licensed and insured. Serving the whole county since 2009.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"fontSize":"sm"} -->
			<h2 class="wp-block-heading has-sm-font-size"><?php esc_html_e( 'Services', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:list {"fontSize":"sm"} -->
			<ul class="wp-block-list has-sm-font-size">
				<!-- wp:list-item -->
				<li><a href="#services"><?php esc_html_e( 'Repairs', 'keel' ); ?></a></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><a href="#services"><?php esc_html_e( 'Installations', 'keel' ); ?></a></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><a href="#services"><?php esc_html_e( 'Maintenance plans', 'keel' ); ?></a></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><a href="#services"><?php esc_html_e( 'Emergency service', 'keel' ); ?></a></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"fontSize":"sm"} -->
			<h2 class="wp-block-heading has-sm-font-size"><?php esc_html_e( 'Contact', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( '123 Harbor Street, Suite 4', 'keel' ); ?><br><?php esc_html_e( 'Stuart, FL 34994', 'keel' ); ?><br><a href="tel:+15555550100">(555) 555-0100</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"fontSize":"sm"} -->
			<h2 class="wp-block-heading has-sm-font-size"><?php esc_html_e( 'Hours', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Monday to Friday: 8am to 6pm', 'keel' ); ?><br><?php esc_html_e( 'Saturday: 9am to 1pm', 'keel' ); ?><br><?php esc_html_e( 'Sunday: emergencies only', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"fontSize":"xs"} -->
		<p class="has-xs-font-size"><?php echo esc_html( $keel_copyright ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"xs"} -->
		<p class="has-xs-font-size"><a href="#privacy"><?php esc_html_e( 'Privacy', 'keel' ); ?></a> · <a href="#accessibility"><?php esc_html_e( 'Accessibility', 'keel' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
