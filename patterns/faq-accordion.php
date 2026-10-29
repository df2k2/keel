<?php
/**
 * Title: FAQ: accordion
 * Slug: keel/faq-accordion
 * Categories: keel/faq
 * Keywords: faq, accordion, questions
 * Viewport Width: 1000
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_questions = array(
	array( __( 'Do you charge for estimates?', 'keel' ), __( 'No. Every visit starts with a free inspection and a written quote, and you decide before any work begins.', 'keel' ) ),
	array( __( 'Can I pay monthly?', 'keel' ), __( 'Yes. Plans from 6 to 24 months at 0% interest are available on most work, subject to approval.', 'keel' ) ),
	array( __( 'How soon can you come out?', 'keel' ), __( 'Most jobs are scheduled within the week, and same-day slots are held every morning for urgent calls.', 'keel' ) ),
	array( __( 'What if something goes wrong afterwards?', 'keel' ), __( 'Call us. Every job is guaranteed in writing, and a return visit under the guarantee costs nothing.', 'keel' ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Common questions', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:accordion {"className":"is-style-faq"} -->
	<div role="group" class="wp-block-accordion is-style-faq">
		<?php foreach ( $keel_questions as $keel_index => $keel_question ) : ?>
			<?php $keel_open = 0 === $keel_index ? '{"openByDefault":true} ' : ''; ?>
		<!-- wp:accordion-item <?php echo $keel_open; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static JSON, no user input. ?>-->
		<div class="wp-block-accordion-item">
			<!-- wp:accordion-heading <?php echo $keel_open; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static JSON, no user input. ?>-->
			<h3 class="wp-block-accordion-heading has-icon has-icon-right"><button type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title"><?php echo esc_html( $keel_question[0] ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
			<!-- /wp:accordion-heading -->

			<!-- wp:accordion-panel <?php echo $keel_open; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static JSON, no user input. ?>-->
			<div role="region" class="wp-block-accordion-panel">
				<!-- wp:paragraph -->
				<p><?php echo esc_html( $keel_question[1] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:accordion-panel -->
		</div>
		<!-- /wp:accordion-item -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:accordion -->
</div>
<!-- /wp:group -->
