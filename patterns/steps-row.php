<?php
/**
 * Title: Steps row
 * Slug: keel/steps-row
 * Categories: keel/process
 * Keywords: steps, numbered, process, row
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_steps = array(
	array( __( 'Pick your days', 'keel' ), __( 'Check the best-time table and the tides, then choose a weekend.', 'keel' ) ),
	array( __( 'Book the water', 'keel' ), __( 'Tours and charters fill first. Book them, then everything else.', 'keel' ) ),
	array( __( 'Choose a base', 'keel' ), __( 'Harbor district for walking, North beach for quiet, the islands for both.', 'keel' ) ),
	array( __( 'Leave room', 'keel' ), __( 'One empty afternoon. Something will turn up, it always does.', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'How to plan it', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $keel_steps as $keel_i => $keel_step ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"keel-day"} -->
				<p class="keel-day"><?php echo esc_html( (string) ( $keel_i + 1 ) ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_step[0] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php echo esc_html( $keel_step[1] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
