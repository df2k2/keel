<?php
/**
 * Title: Showcase: facts band
 * Slug: keel-demo/showcase-facts
 * Description: Measured numbers about the installed theme and the three claims, each linking to Why Keel.
 * Inserter: no
 *
 * @package KeelDemo
 */

defined( 'ABSPATH' ) || exit;

$keel_demo_facts   = Keel_Demo\facts();
$keel_demo_modules = array_sum( $keel_demo_facts['modules'] );
$keel_demo_stats   = array(
	array( number_format_i18n( $keel_demo_facts['css_gzip'] / 1024, 1 ) . ' KB', __( 'of CSS, compressed, for the whole theme', 'keel-demo' ) ),
	array( number_format_i18n( count( $keel_demo_facts['modules'] ) ), sprintf( /* translators: %s: total compressed size such as 1.2 KB. */ __( 'script modules, %s together, each loaded only where its block renders', 'keel-demo' ), number_format_i18n( $keel_demo_modules / 1024, 1 ) . ' KB' ) ),
	array( number_format_i18n( $keel_demo_facts['patterns'] ), sprintf( /* translators: 1: number of variations, 2: number of block styles. */ __( 'patterns, %1$d variations and %2$d block styles, all core blocks', 'keel-demo' ), $keel_demo_facts['variations'], $keel_demo_facts['block_styles'] ) ),
);
$keel_demo_claims  = array(
	array( __( 'No third-party requests', 'keel-demo' ), __( 'Fonts, icons and images ship in the theme. Nothing is fetched from another domain, on any page.', 'keel-demo' ) ),
	array( __( 'No JavaScript on static pages', 'keel-demo' ), __( 'Modules load only where a block needs one. The landing template serves zero scripts.', 'keel-demo' ) ),
	array( __( 'Signed releases', 'keel-demo' ), __( 'Every release is built in CI from a tag and published with its signatures and a manifest of file hashes you can verify.', 'keel-demo' ) ),
);
?>
<!-- wp:group {"align":"full","className":"is-style-band","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-band">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Measured, not promised', 'keel-demo' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
	<p class="has-text-align-center has-sm-font-size">
	<?php
	/* translators: %s: theme version. */
	echo esc_html( sprintf( __( 'Numbers read from the installed theme, version %s, when this page rendered.', 'keel-demo' ), $keel_demo_facts['version'] ) );
	?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $keel_demo_stats as $keel_demo_stat ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","className":"keel-stat__number"} -->
			<p class="has-text-align-center keel-stat__number"><?php echo esc_html( $keel_demo_stat[0] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php echo esc_html( $keel_demo_stat[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $keel_demo_claims as $keel_demo_claim ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><a href="<?php echo esc_url( home_url( '/why-keel/' ) ); ?>"><?php echo esc_html( $keel_demo_claim[0] ); ?></a></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html( $keel_demo_claim[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
