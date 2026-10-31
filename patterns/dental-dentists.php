<?php
/**
 * Title: Dental: our dentists
 * Slug: keel/dental-dentists
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, dentists, team, providers
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_avatar   = get_theme_file_uri( 'assets/images/placeholder-avatar.svg' );
$keel_dentists = array(
	array( __( 'Dr. Sofia Ramirez', 'keel' ), __( 'Lead dentist and founder', 'keel' ), 18, '4.9', 640, __( 'Available today', 'keel' ) ),
	array( __( 'Dr. Leo Tanaka', 'keel' ), __( 'Implants and oral surgery', 'keel' ), 14, '4.9', 410, __( 'Next: Thursday', 'keel' ) ),
	array( __( 'Dr. Priya Nair', 'keel' ), __( 'Orthodontics and clear aligners', 'keel' ), 11, '4.8', 380, __( 'Available tomorrow', 'keel' ) ),
	array( __( 'Dr. Omar Haddad', 'keel' ), __( 'Family and children\'s dentistry', 'keel' ), 7, '5.0', 210, __( 'Available today', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Choose your dentist', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'You see the same dentist every visit unless you ask to change. All four are happy to meet you first, free of charge.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"16rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_dentists as $keel_dentist ) : ?>
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"96px","height":"96px","sizeSlug":"full","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( $keel_avatar ); ?>" alt="" style="width:96px;height:96px"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_dentist[0] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><strong><?php echo esc_html( $keel_dentist[1] ); ?></strong><br>
			<?php
			/* translators: %d: years of experience. */
			echo esc_html( sprintf( _n( '%d year of experience', '%d years of experience', $keel_dentist[2], 'keel' ), $keel_dentist[2] ) );
			?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size">
			<?php
			/* translators: 1: average rating such as 4.9, 2: number of reviews. */
			echo esc_html( sprintf( __( 'Rated %1$s from %2$s reviews', 'keel' ), $keel_dentist[3], number_format_i18n( $keel_dentist[4] ) ) );
			?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"keel-chip"} -->
			<p class="keel-chip"><?php echo esc_html( $keel_dentist[5] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"fontSize":"sm"} -->
				<div class="wp-block-button has-custom-font-size has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#book"><?php esc_html_e( 'Book', 'keel' ); ?></a></div>
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
