<?php
/**
 * Title: Showcase: hero
 * Slug: keel-demo/showcase-hero
 * Description: The front door of the demo site: Keel on display.
 * Inserter: no
 *
 * @package KeelDemo
 */

defined( 'ABSPATH' ) || exit;

$keel_demo_chips = array( __( 'WordPress 7.1', 'keel-demo' ), __( 'PHP 8.3', 'keel-demo' ), __( 'Core blocks only', 'keel-demo' ), __( 'No third-party requests', 'keel-demo' ) );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:paragraph {"align":"center","className":"keel-eyebrow"} -->
	<p class="has-text-align-center keel-eyebrow"><?php esc_html_e( 'A WordPress block theme', 'keel-demo' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-accent","fontSize":"display"} -->
	<h1 class="wp-block-heading has-text-align-center is-style-accent has-display-font-size">
	<?php
	/* translators: 1: opening em tag, 2: closing em tag. */
	printf( esc_html__( 'Keel: a %1$ssecurity-first%2$s block theme for local service businesses', 'keel-demo' ), '<em>', '</em>' );
	?>
	</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"is-style-lead"} -->
	<p class="has-text-align-center is-style-lead"><?php esc_html_e( 'Ninety-four patterns, seven looks, a living style guide and a complete dental practice demo, built from core blocks with no page builder, no third-party requests and no JavaScript on pages that do not need it.', 'keel-demo' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/dental/' ) ); ?>"><?php esc_html_e( 'See the dental demo', 'keel-demo' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-ghost"} -->
		<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/patterns/' ) ); ?>"><?php esc_html_e( 'Browse patterns', 'keel-demo' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<?php foreach ( $keel_demo_chips as $keel_demo_chip ) : ?>
		<!-- wp:paragraph {"className":"keel-chip"} -->
		<p class="keel-chip"><?php echo esc_html( $keel_demo_chip ); ?></p>
		<!-- /wp:paragraph -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
