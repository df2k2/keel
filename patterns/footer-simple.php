<?php
/**
 * Title: Footer: simple
 * Slug: keel/footer-simple
 * Categories: keel/footer
 * Keywords: footer, minimal
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
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-title {"level":0,"fontSize":"sm"} /-->

		<!-- wp:paragraph {"fontSize":"xs"} -->
		<p class="has-xs-font-size"><?php echo esc_html( $keel_copyright ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
