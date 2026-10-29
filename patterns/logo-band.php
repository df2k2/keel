<?php
/**
 * Title: Logo band
 * Slug: keel/logo-band
 * Categories: keel/trust
 * Keywords: logos, partners, insurers, certifications
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
	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size"><?php esc_html_e( 'Trusted by partners, insurers and the certifying bodies that matter', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<?php for ( $keel_i = 1; $keel_i <= 6; $keel_i++ ) : ?>
		<!-- wp:image {"lightbox":{"enabled":false},"width":"140px","sizeSlug":"full"} -->
		<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $keel_logo ); ?>" alt="<?php echo esc_attr( sprintf( /* translators: %d: position of the logo in the row. */ __( 'Partner logo %d', 'keel' ), $keel_i ) ); ?>" style="width:140px"/></figure>
		<!-- /wp:image -->
		<?php endfor; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
