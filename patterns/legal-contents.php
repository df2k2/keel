<?php
/**
 * Title: Legal contents
 * Slug: keel/legal-contents
 * Categories: keel/utility
 * Keywords: legal, contents, anchors, policy
 * Viewport Width: 800
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_sections = array(
	array( 'what-we-collect', __( 'What we collect', 'keel' ) ),
	array( 'how-we-use-it', __( 'How we use it', 'keel' ) ),
	array( 'cookies', __( 'Cookies', 'keel' ) ),
	array( 'sharing', __( 'Who we share it with', 'keel' ) ),
	array( 'your-rights', __( 'Your rights', 'keel' ) ),
	array( 'contact', __( 'How to reach us', 'keel' ) ),
);
?>
<!-- wp:group {"className":"is-style-bordered keel-contents","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-bordered keel-contents">
	<!-- wp:heading {"level":2,"fontSize":"md"} -->
	<h2 class="wp-block-heading has-md-font-size"><?php esc_html_e( 'Contents', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:list {"ordered":true,"fontSize":"sm"} -->
	<ol class="wp-block-list has-sm-font-size">
		<?php foreach ( $keel_sections as $keel_section ) : ?>
		<!-- wp:list-item -->
		<li><a href="#<?php echo esc_attr( $keel_section[0] ); ?>"><?php echo esc_html( $keel_section[1] ); ?></a></li>
		<!-- /wp:list-item -->
		<?php endforeach; ?>
	</ol>
	<!-- /wp:list -->
</div>
<!-- /wp:group -->
