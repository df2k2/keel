<?php
/**
 * Title: Breadcrumb row
 * Slug: keel/breadcrumb-row
 * Categories: keel/elements
 * Keywords: breadcrumb, navigation, path, parent
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_trail = array(
	array( '#home', __( 'Home', 'keel' ) ),
	array( '#places', __( 'Places', 'keel' ) ),
);
?>
<!-- wp:group {"tagName":"nav","ariaLabel":"<?php esc_attr_e( 'Breadcrumb', 'keel' ); ?>","className":"keel-breadcrumb","layout":{"type":"constrained"}} -->
<nav class="wp-block-group keel-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'keel' ); ?>">
	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size">
	<?php foreach ( $keel_trail as $keel_crumb ) : ?>
	<a href="<?php echo esc_attr( $keel_crumb[0] ); ?>"><?php echo esc_html( $keel_crumb[1] ); ?></a> <span aria-hidden="true">/</span>
	<?php endforeach; ?>
	<span aria-current="page"><?php esc_html_e( 'Harbor district', 'keel' ); ?></span></p>
	<!-- /wp:paragraph -->
</nav>
<!-- /wp:group -->
