<?php
/**
 * Title: Feature list with icons
 * Slug: keel/features-icons
 * Categories: keel/trust
 * Keywords: features, icons, benefits, list
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_features = array(
	array( 'clock', __( 'Open early and late', 'keel' ), __( 'Appointments from 7 am and until 7 pm on weekdays.', 'keel' ) ),
	array( 'shield', __( 'Guaranteed work', 'keel' ), __( 'Every job carries a written guarantee, no small print.', 'keel' ) ),
	array( 'calendar', __( 'Book in two minutes', 'keel' ), __( 'Choose a time online and get a reminder the day before.', 'keel' ) ),
	array( 'message', __( 'Plain-language advice', 'keel' ), __( 'You get the options, the prices and our honest recommendation.', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Why people choose us', 'keel' ); ?></h2>
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
