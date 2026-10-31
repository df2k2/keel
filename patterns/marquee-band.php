<?php
/**
 * Title: Marquee band
 * Slug: keel/marquee-band
 * Categories: keel/elements
 * Keywords: marquee, band, scrolling, chips, motion
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_chips = array( __( 'Beaches', 'keel' ), __( 'Fishing', 'keel' ), __( 'Markets', 'keel' ), __( 'Trails', 'keel' ), __( 'Boat tours', 'keel' ), __( 'Live music', 'keel' ), __( 'Sunsets', 'keel' ), __( 'Local food', 'keel' ) );
?>
<!-- wp:group {"align":"full","className":"is-style-marquee","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-marquee has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<?php foreach ( $keel_chips as $keel_chip ) : ?>
		<!-- wp:paragraph {"className":"keel-chip"} -->
		<p class="keel-chip"><?php echo esc_html( $keel_chip ); ?></p>
		<!-- /wp:paragraph -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
