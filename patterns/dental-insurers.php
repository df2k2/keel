<?php
/**
 * Title: Dental: insurers
 * Slug: keel/dental-insurers
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, insurers, insurance, logos
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_logo = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"keel-logo-band","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull keel-logo-band" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","fontSize":"lg"} -->
	<h2 class="wp-block-heading has-text-align-center has-lg-font-size"><?php esc_html_e( 'We work with 40+ insurers', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size"><?php esc_html_e( 'Send us your plan details when you book and we confirm your cover before the visit.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<?php for ( $keel_i = 1; $keel_i <= 6; $keel_i++ ) : ?>
		<!-- wp:image {"lightbox":{"enabled":false},"width":"140px","sizeSlug":"full"} -->
		<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $keel_logo ); ?>" alt="<?php echo esc_attr( sprintf( /* translators: %d: position of the logo in the row. */ __( 'Insurer logo %d', 'keel' ), $keel_i ) ); ?>" style="width:140px"/></figure>
		<!-- /wp:image -->
		<?php endfor; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
