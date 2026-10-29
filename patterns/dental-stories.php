<?php
/**
 * Title: Dental: patient stories
 * Slug: keel/dental-stories
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, reviews, testimonials, stories
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_stories = array(
	array( __( 'I had not seen a dentist in nine years because I was terrified. Dr. Ramirez talked me through every step and stopped when I raised my hand. Two visits later my teeth are fixed and I am not scared any more.', 'keel' ), __( 'Dana M., Stuart', 'keel' ) ),
	array( __( 'The implant price on the website was the price I paid. Dr. Tanaka placed it in forty minutes and the crown fits like my own tooth.', 'keel' ), __( 'Marcus T., Jensen Beach', 'keel' ) ),
	array( __( 'Both kids actually ask to go. Dr. Haddad lets them hold the mirror and they leave with a sticker and clean teeth.', 'keel' ), __( 'Lauren K., Palm City', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Patient stories', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><strong><?php esc_html_e( 'Rated 4.9 from 2,300 reviews', 'keel' ); ?></strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $keel_stories as $keel_story ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:quote {"className":"is-style-testimonial"} -->
			<blockquote class="wp-block-quote is-style-testimonial">
				<!-- wp:paragraph -->
				<p><?php echo esc_html( $keel_story[0] ); ?></p>
				<!-- /wp:paragraph -->
				<cite><?php echo esc_html( $keel_story[1] ); ?></cite>
			</blockquote>
			<!-- /wp:quote -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
