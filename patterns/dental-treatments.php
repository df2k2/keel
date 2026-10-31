<?php
/**
 * Title: Dental: treatments
 * Slug: keel/dental-treatments
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, treatments, services, prices
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_treatments = array(
	array( 'check', '#check-ups', __( 'Check-up and hygiene', 'keel' ), __( 'A full examination, x-rays if needed and a professional clean, in one visit.', 'keel' ), '$85' ),
	array( 'star', '#whitening', __( 'Teeth whitening', 'keel' ), __( 'In-chair whitening with take-home trays, two to eight shades lighter.', 'keel' ), '$390' ),
	array( 'shield', '#implants', __( 'Dental implants', 'keel' ), __( 'A permanent replacement tooth, placed by our surgeon and finished in-house.', 'keel' ), '$2,400' ),
	array( 'calendar', '#aligners', __( 'Clear aligners', 'keel' ), __( 'Nearly invisible straightening, checked every six weeks, typically 6 to 14 months.', 'keel' ), '$2,900' ),
	array( 'message', '#kids', __( 'Kids\' dentistry', 'keel' ), __( 'Short, friendly visits from age one, with fluoride and sealants when they help.', 'keel' ), '$60' ),
	array( 'clock', '#emergency', __( 'Emergency, same day', 'keel' ), __( 'Toothache, a broken tooth or a lost crown: call before noon, be seen today.', 'keel' ), '$120' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Treatments and prices', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Starting prices, confirmed in writing after your examination. No surprises at the desk.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_treatments as $keel_treatment ) : ?>
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
			<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_treatment[0] . '.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_treatment[2] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html( $keel_treatment[3] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"lg"} -->
			<p class="has-lg-font-size"><strong>
			<?php
			/* translators: %s: a starting price such as $85. */
			echo esc_html( sprintf( __( 'from %s', 'keel' ), $keel_treatment[4] ) );
			?>
			</strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="<?php echo esc_url( $keel_treatment[1] ); ?>"><?php esc_html_e( 'About this treatment', 'keel' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
