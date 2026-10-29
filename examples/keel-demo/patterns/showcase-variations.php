<?php
/**
 * Title: Showcase: variations
 * Slug: keel-demo/showcase-variations
 * Description: Every style variation as a screenshot tile with its palette and a link that renders this site in it.
 * Inserter: no
 *
 * @package KeelDemo
 */

defined( 'ABSPATH' ) || exit;

$keel_demo_variations = array();
$keel_demo_files      = glob( get_stylesheet_directory() . '/styles/*.json' );
foreach ( false === $keel_demo_files ? array() : $keel_demo_files as $keel_demo_file ) {
	$keel_demo_json = json_decode( (string) file_get_contents( $keel_demo_file ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local theme file.
	if ( ! is_array( $keel_demo_json ) ) {
		continue;
	}
	$keel_demo_slug         = basename( $keel_demo_file, '.json' );
	$keel_demo_image        = plugin_dir_path( Keel_Demo\FILE ) . 'assets/variations/' . $keel_demo_slug . '.jpg';
	$keel_demo_variations[] = array(
		'slug'    => $keel_demo_slug,
		'title'   => (string) ( $keel_demo_json['title'] ?? $keel_demo_slug ),
		'palette' => array_column( $keel_demo_json['settings']['color']['palette'] ?? array(), 'color', 'slug' ),
		'image'   => file_exists( $keel_demo_image ) ? plugins_url( 'assets/variations/' . $keel_demo_slug . '.jpg', Keel_Demo\FILE ) : '',
	);
}
usort( $keel_demo_variations, static fn( array $a, array $b ): int => strcmp( $a['title'], $b['title'] ) );
$keel_demo_active = Keel_Demo\active_variation_slug();
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"className":"keel-demo-variations","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull keel-demo-variations" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Seven looks, one theme', 'keel-demo' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Each variation changes the palette, the fonts and the shape tokens; every pattern re-renders from those values. Pick one and browse the whole site in it.', 'keel-demo' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_demo_variations as $keel_demo_variation ) : ?>
		<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group is-style-card">
			<?php if ( '' !== $keel_demo_variation['image'] ) : ?>
			<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","className":"is-style-soft"} -->
			<figure class="wp-block-image size-full is-style-soft"><img src="<?php echo esc_url( $keel_demo_variation['image'] ); ?>" alt="<?php echo esc_attr( sprintf( /* translators: %s: variation name. */ __( 'The showcase home page in the %s variation', 'keel-demo' ), $keel_demo_variation['title'] ) ); ?>" style="aspect-ratio:4/3;object-fit:cover" width="600" height="450" loading="lazy" decoding="async"/></figure>
			<!-- /wp:image -->
			<?php endif; ?>

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_demo_variation['title'] ); ?><?php echo $keel_demo_active === $keel_demo_variation['slug'] ? ' <span class="keel-chip">' . esc_html__( 'viewing', 'keel-demo' ) . '</span>' : ''; ?></h3>
			<!-- /wp:heading -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group">
				<?php foreach ( array( 'base', 'contrast', 'primary', 'accent', 'surface', 'surface-alt', 'border' ) as $keel_demo_color ) : ?>
					<?php if ( isset( $keel_demo_variation['palette'][ $keel_demo_color ] ) ) : ?>
				<!-- wp:group {"style":{"color":{"background":"<?php echo esc_attr( $keel_demo_variation['palette'][ $keel_demo_color ] ); ?>"}},"className":"keel-swatch keel-swatch--small","layout":{"type":"constrained"}} -->
				<div class="wp-block-group keel-swatch keel-swatch--small has-background" style="background-color:<?php echo esc_attr( $keel_demo_variation['palette'][ $keel_demo_color ] ); ?>" title="<?php echo esc_attr( $keel_demo_color ); ?>"></div>
				<!-- /wp:group -->
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-ghost keel-demo-variation","fontSize":"sm"} -->
				<div class="wp-block-button has-custom-font-size is-style-ghost keel-demo-variation has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( add_query_arg( 'variation', $keel_demo_variation['slug'], home_url( '/' ) ) ); ?>"><?php echo esc_html( sprintf( /* translators: %s: variation name. */ __( 'View this site in %s', 'keel-demo' ), $keel_demo_variation['title'] ) ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-pill keel-demo-variation","fontSize":"sm"} -->
		<div class="wp-block-button has-custom-font-size is-style-pill keel-demo-variation has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( add_query_arg( 'variation', '', home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Back to the site default (Clinic)', 'keel-demo' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
