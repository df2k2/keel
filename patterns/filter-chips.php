<?php
/**
 * Title: Filter chips
 * Slug: keel/filter-chips
 * Categories: keel/elements
 * Keywords: filters, chips, links, active
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_chips = array( __( 'All', 'keel' ), __( 'Beaches', 'keel' ), __( 'Boat tours', 'keel' ), __( 'Food and drink', 'keel' ), __( 'Family', 'keel' ), __( 'Free', 'keel' ) );
?>
<!-- wp:group {"className":"keel-filter-chips","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group keel-filter-chips">
	<?php foreach ( $keel_chips as $keel_i => $keel_chip ) : ?>
	<!-- wp:paragraph {"className":"keel-chip<?php echo 0 === $keel_i ? ' is-active' : ''; ?>"} -->
	<p class="keel-chip<?php echo 0 === $keel_i ? ' is-active' : ''; ?>"><a href="#filter"><?php echo esc_html( $keel_chip ); ?></a></p>
	<!-- /wp:paragraph -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
