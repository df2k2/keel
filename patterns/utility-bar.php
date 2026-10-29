<?php
/**
 * Title: Utility bar
 * Slug: keel/utility-bar
 * Categories: keel/cta
 * Keywords: utility, bar, hours, phone, urgent
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_items = array(
	array( 'clock', __( 'Mon to Fri 7 am to 7 pm, Sat 9 am to 1 pm', 'keel' ) ),
	array( 'map-pin', __( '123 Harbor Street, Suite 4, Stuart', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"contrast","textColor":"base","className":"keel-utility-bar","fontSize":"xs","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull keel-utility-bar has-base-color has-contrast-background-color has-text-color has-background has-link-color has-xs-font-size" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<?php foreach ( $keel_items as $keel_item ) : ?>
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"16px","height":"16px","sizeSlug":"full","className":"keel-icon"} -->
				<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_item[0] . '.svg' ) ); ?>" alt="" style="width:16px;height:16px"/></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html( $keel_item[1] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph -->
			<p><strong><?php esc_html_e( 'Urgent?', 'keel' ); ?></strong> <?php esc_html_e( 'Same-day slots held every morning.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="tel:+15555550100"><?php esc_html_e( 'Call (555) 555-0100', 'keel' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
