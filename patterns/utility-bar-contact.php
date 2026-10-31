<?php
/**
 * Title: Utility bar: contact
 * Slug: keel/utility-bar-contact
 * Categories: keel/cta
 * Keywords: utility, bar, phone, email, notice
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_items = array(
	array( 'phone', 'tel:+15555550100', __( '(555) 555-0100', 'keel' ) ),
	array( 'mail', 'mailto:hello@example.com', __( 'hello@example.com', 'keel' ) ),
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
				<p><a href="<?php echo esc_attr( $keel_item[1] ); ?>"><?php echo esc_html( $keel_item[2] ); ?></a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:group -->

		<!-- wp:paragraph -->
		<p><a href="#changes"><?php esc_html_e( 'Free changes on every booking', 'keel' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
