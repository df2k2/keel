<?php
/**
 * Title: Callouts
 * Slug: keel/callouts
 * Categories: keel/elements
 * Keywords: callout, info, notice, success, error, alert
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_callouts = array(
	array( 'info', __( 'Parking fills by 10 am on weekends. The town lot on Flagler Street is free after 6 pm.', 'keel' ) ),
	array( 'warm', __( 'Turtle season runs May to October. Lights off on the beach after 9 pm, please.', 'keel' ) ),
	array( 'success', __( 'Your reservation is confirmed. A text with the meeting point arrives the day before.', 'keel' ) ),
	array( 'error', __( 'The sunrise tour on Saturday is cancelled for weather. Rebook free or get a refund.', 'keel' ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group">
	<?php foreach ( $keel_callouts as $keel_callout ) : ?>
	<!-- wp:group {"className":"is-style-callout-<?php echo esc_attr( $keel_callout[0] ); ?>","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-callout-<?php echo esc_attr( $keel_callout[0] ); ?>">
		<!-- wp:paragraph -->
		<p><?php echo esc_html( $keel_callout[1] ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
