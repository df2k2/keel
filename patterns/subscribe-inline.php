<?php
/**
 * Title: Subscribe inline
 * Slug: keel/subscribe-inline
 * Categories: keel/cta
 * Keywords: newsletter, subscribe, email, inline, row
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"className":"keel-subscribe","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained","contentSize":"40rem"}} -->
<div class="wp-block-group keel-subscribe">
	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size"><strong><?php esc_html_e( 'Monthly tips, no noise.', 'keel' ); ?></strong> <?php esc_html_e( 'One email a month with what is on and what is new.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"<?php esc_attr_e( 'Email address', 'keel' ); ?>","showLabel":false,"placeholder":"<?php esc_attr_e( 'you@example.com', 'keel' ); ?>","buttonText":"<?php esc_attr_e( 'Subscribe', 'keel' ); ?>","buttonPosition":"button-inside","className":"keel-subscribe__field"} /-->

	<!-- wp:paragraph {"className":"is-style-small-print"} -->
	<p class="is-style-small-print"><?php esc_html_e( 'The field above is the Search block standing in for your newsletter form. Replace it with your form plugin block; the styling carries over.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
