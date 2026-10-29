<?php
/**
 * Title: Timeline
 * Slug: keel/timeline
 * Categories: keel/process
 * Keywords: timeline, history, milestones, years
 * Viewport Width: 1000
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_milestones = array(
	array( '2009', __( 'Founded', 'keel' ), __( 'Two people, one van and a promise to answer every call the same day.', 'keel' ) ),
	array( '2014', __( 'Second location', 'keel' ), __( 'A second site opened to cover the north of the county.', 'keel' ) ),
	array( '2019', __( 'Ten thousand jobs', 'keel' ), __( 'The ten thousandth job was a repair we did for free: a thank-you to the town.', 'keel' ) ),
	array( '2026', __( 'Today', 'keel' ), __( 'Twenty-two people, a 4.9 rating and the same promise as day one.', 'keel' ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Our story', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:list {"className":"keel-timeline"} -->
	<ul class="wp-block-list keel-timeline">
		<?php foreach ( $keel_milestones as $keel_milestone ) : ?>
		<!-- wp:list-item -->
		<li><strong class="keel-timeline__year"><?php echo esc_html( $keel_milestone[0] ); ?></strong><br><strong><?php echo esc_html( $keel_milestone[1] ); ?></strong><br><?php echo esc_html( $keel_milestone[2] ); ?></li>
		<!-- /wp:list-item -->
		<?php endforeach; ?>
	</ul>
	<!-- /wp:list -->
</div>
<!-- /wp:group -->
