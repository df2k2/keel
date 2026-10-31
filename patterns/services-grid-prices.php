<?php
/**
 * Title: Services grid with prices
 * Slug: keel/services-grid-prices
 * Categories: keel/services
 * Keywords: services, grid, prices, from
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_services = array(
	array( 'check', __( 'Check-up', 'keel' ), __( 'A full inspection with a written report the same day.', 'keel' ), '$85' ),
	array( 'shield', __( 'Protection plan', 'keel' ), __( 'Two visits a year and priority scheduling.', 'keel' ), '$19/mo' ),
	array( 'clock', __( 'Same-day repair', 'keel' ), __( 'Call before noon and we are there before close.', 'keel' ), '$120' ),
	array( 'star', __( 'Premium service', 'keel' ), __( 'Our most thorough package, with a two-year guarantee.', 'keel' ), '$390' ),
	array( 'calendar', __( 'Scheduled maintenance', 'keel' ), __( 'Quarterly visits that keep everything running.', 'keel' ), '$60' ),
	array( 'message', __( 'Consultation', 'keel' ), __( 'Thirty minutes with a specialist, in person or by video.', 'keel' ), __( 'Free', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Services and prices', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Every price is a starting price, confirmed in writing before any work begins.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_services as $keel_service ) : ?>
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
			<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_service[0] . '.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_service[1] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html( $keel_service[2] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"lg"} -->
			<p class="has-lg-font-size"><strong>
			<?php
			/* translators: %s: a starting price such as $85. */
			echo esc_html( sprintf( __( 'from %s', 'keel' ), $keel_service[3] ) );
			?>
			</strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="#contact"><?php esc_html_e( 'Book this service', 'keel' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
