<?php
/**
 * Title: Footer: big
 * Slug: keel/footer-big
 * Categories: keel/footer
 * Keywords: footer, columns, social, hours, legal
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_explore = array( __( 'Places', 'keel' ), __( 'Things to do', 'keel' ), __( 'Stay', 'keel' ), __( 'Events', 'keel' ), __( 'Deals', 'keel' ) );
$keel_plan    = array( __( 'Itineraries', 'keel' ), __( 'Visitor information', 'keel' ), __( 'Journal', 'keel' ), __( 'Submit an event', 'keel' ), __( 'Press', 'keel' ) );
?>
<!-- wp:group {"align":"full","backgroundColor":"surface","className":"keel-footer-big","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull keel-footer-big has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"34%"} -->
		<div class="wp-block-column" style="flex-basis:34%">
			<!-- wp:site-title {"level":0} /-->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"}}} -->
			<p style="font-size:0.9375rem"><?php esc_html_e( 'An independent guide to the coast, written by the people who live here. No sponsored listings, no booking fees.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><a href="#social"><?php esc_html_e( 'Instagram', 'keel' ); ?></a>, <a href="#social"><?php esc_html_e( 'Facebook', 'keel' ); ?></a>, <a href="#social"><?php esc_html_e( 'YouTube', 'keel' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"fontSize":"md"} -->
			<h2 class="wp-block-heading has-md-font-size"><?php esc_html_e( 'Explore', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:list {"fontSize":"sm"} -->
			<ul class="wp-block-list has-sm-font-size">
				<?php foreach ( $keel_explore as $keel_link ) : ?>
				<!-- wp:list-item -->
				<li><a href="#explore"><?php echo esc_html( $keel_link ); ?></a></li>
				<!-- /wp:list-item -->
				<?php endforeach; ?>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"fontSize":"md"} -->
			<h2 class="wp-block-heading has-md-font-size"><?php esc_html_e( 'Plan', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:list {"fontSize":"sm"} -->
			<ul class="wp-block-list has-sm-font-size">
				<?php foreach ( $keel_plan as $keel_link ) : ?>
				<!-- wp:list-item -->
				<li><a href="#plan"><?php echo esc_html( $keel_link ); ?></a></li>
				<!-- /wp:list-item -->
				<?php endforeach; ?>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2,"fontSize":"md"} -->
			<h2 class="wp-block-heading has-md-font-size"><?php esc_html_e( 'Contact and hours', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( '123 Harbor Street, Suite 4', 'keel' ); ?><br><?php esc_html_e( 'Stuart, FL 34994', 'keel' ); ?><br><a href="tel:+15555550100"><?php esc_html_e( '(555) 555-0100', 'keel' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><?php esc_html_e( 'Visitor centre open daily 9 am to 5 pm.', 'keel' ); ?><br><?php esc_html_e( 'Closed Tuesdays in summer.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","className":"is-style-default"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-default"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"className":"is-style-small-print"} -->
		<p class="is-style-small-print">
		<?php
		/* translators: %s: the current year. */
		echo esc_html( sprintf( __( 'Copyright %s. No payments are taken on this site; bookings go directly to each business.', 'keel' ), date_i18n( 'Y' ) ) );
		?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"sm"} -->
		<p class="has-sm-font-size"><a href="#privacy"><?php esc_html_e( 'Privacy', 'keel' ); ?></a> <span aria-hidden="true">/</span> <a href="#accessibility"><?php esc_html_e( 'Accessibility', 'keel' ); ?></a> <span aria-hidden="true">/</span> <a href="#credits"><?php esc_html_e( 'Photo credits', 'keel' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
