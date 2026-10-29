<?php
/**
 * Title: Dental: disclaimer
 * Slug: keel/dental-disclaimer
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, disclaimer, fictional, emergency
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|60"}}},"className":"keel-disclaimer","layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group keel-disclaimer" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"fontSize":"xs"} -->
	<p class="has-xs-font-size"><?php esc_html_e( 'Bright Harbor Dental is a fictional practice created to show the Keel theme. The dentists, prices, hours, reviews and insurers on these pages are invented and are not medical advice. If you have a dental emergency, call your own dentist or your local emergency dental line; for a life-threatening emergency call 911.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
