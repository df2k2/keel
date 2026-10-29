<?php
/**
 * Title: Dental: why patients choose us
 * Slug: keel/dental-features
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, features, benefits, nervous patients
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_features = array(
	array( 'clock', __( 'Early, late and Saturday', 'keel' ), __( 'Appointments from 7 am, until 7 pm on Tuesdays and Thursdays, and Saturday mornings.', 'keel' ) ),
	array( 'message', __( 'Nervous patients welcome', 'keel' ), __( 'A quiet room, numbing gel before every injection and a stop signal you choose.', 'keel' ) ),
	array( 'calendar', __( '0% payment plans', 'keel' ), __( 'Spread any treatment over 6 to 24 months with no interest and no deposit.', 'keel' ) ),
	array( 'shield', __( '40+ insurers accepted', 'keel' ), __( 'We check your cover before the visit and bill your insurer directly.', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Why patients choose Bright Harbor', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"20rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_features as $keel_feature ) : ?>
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"24px","height":"24px","sizeSlug":"full","className":"keel-icon"} -->
			<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_feature[0] . '.svg' ) ); ?>" alt="" style="width:24px;height:24px"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":3,"fontSize":"md"} -->
				<h3 class="wp-block-heading has-md-font-size"><?php echo esc_html( $keel_feature[1] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html( $keel_feature[2] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
