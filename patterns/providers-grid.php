<?php
/**
 * Title: Providers grid
 * Slug: keel/providers-grid
 * Categories: keel/team
 * Keywords: providers, team, availability, rating, book
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_avatar    = get_theme_file_uri( 'assets/images/placeholder-avatar.svg' );
$keel_providers = array(
	array( __( 'Jordan Lee', 'keel' ), __( 'Lead specialist', 'keel' ), 20, '4.9', 310, __( 'Available today', 'keel' ) ),
	array( __( 'Priya Patel', 'keel' ), __( 'Specialist', 'keel' ), 12, '4.8', 180, __( 'Next: tomorrow', 'keel' ) ),
	array( __( 'Sam Okafor', 'keel' ), __( 'Specialist', 'keel' ), 8, '4.9', 140, __( 'Available today', 'keel' ) ),
	array( __( 'Maria Santos', 'keel' ), __( 'Associate', 'keel' ), 4, '5.0', 62, __( 'Next: Thursday', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Choose who you see', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"16rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_providers as $keel_provider ) : ?>
		<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"96px","height":"96px","sizeSlug":"full","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( $keel_avatar ); ?>" alt="" style="width:96px;height:96px"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_provider[0] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><strong><?php echo esc_html( $keel_provider[1] ); ?></strong><br>
			<?php
			/* translators: %d: years of experience. */
			echo esc_html( sprintf( _n( '%d year of experience', '%d years of experience', $keel_provider[2], 'keel' ), $keel_provider[2] ) );
			?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size">
			<?php
			/* translators: 1: average rating such as 4.9, 2: number of reviews. */
			echo esc_html( sprintf( __( 'Rated %1$s from %2$s reviews', 'keel' ), $keel_provider[3], number_format_i18n( $keel_provider[4] ) ) );
			?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"keel-chip"} -->
			<p class="keel-chip"><?php echo esc_html( $keel_provider[5] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"fontSize":"sm"} -->
				<div class="wp-block-button has-custom-font-size has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Book', 'keel' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
