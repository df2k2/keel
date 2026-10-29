<?php
/**
 * Title: Dental: questions
 * Slug: keel/dental-faq
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, faq, questions, accordion
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_questions = array(
	array( __( 'I am scared of the dentist. What do you do differently?', 'keel' ), __( 'You choose a stop signal before we begin, every injection is preceded by numbing gel, and we book extra time so nothing is rushed. Many patients also bring headphones.', 'keel' ) ),
	array( __( 'Do you take my insurance?', 'keel' ), __( 'We work with more than forty insurers and bill them directly. Send your plan details when you book and we confirm your cover before the visit.', 'keel' ) ),
	array( __( 'How do the 0% plans work?', 'keel' ), __( 'Any treatment over $300 can be spread over 6 to 24 months with no interest, no deposit and no fees, subject to a quick approval at the desk.', 'keel' ) ),
	array( __( 'What counts as an emergency?', 'keel' ), __( 'Pain that keeps you awake, a broken or knocked-out tooth, swelling, or a lost crown or filling. Call before noon and you are seen the same day.', 'keel' ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Questions patients ask', 'keel' ); ?></h2>
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
