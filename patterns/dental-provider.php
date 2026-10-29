<?php
/**
 * Title: Dental page: dentist profile
 * Slug: keel/dental-provider
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, page, dentist, profile
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_portrait = get_theme_file_uri( 'assets/images/placeholder-portrait.svg' );
$keel_schedule = array(
	array( __( 'Monday', 'keel' ), __( '7 am to 3 pm', 'keel' ) ),
	array( __( 'Tuesday', 'keel' ), __( '11 am to 7 pm', 'keel' ) ),
	array( __( 'Wednesday', 'keel' ), __( '7 am to 3 pm', 'keel' ) ),
	array( __( 'Thursday', 'keel' ), __( '11 am to 7 pm', 'keel' ) ),
	array( __( 'Saturday', 'keel' ), __( '8 am to 1 pm, alternate weeks', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"full","className":"is-style-soft"} -->
			<figure class="wp-block-image size-full is-style-soft"><img src="<?php echo esc_url( $keel_portrait ); ?>" alt="<?php esc_attr_e( 'Portrait of Dr. Sofia Ramirez', 'keel' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"65%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
			<!-- wp:paragraph {"className":"keel-eyebrow"} -->
			<p class="keel-eyebrow"><?php esc_html_e( 'Lead dentist and founder', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading"><?php esc_html_e( 'Dr. Sofia Ramirez', 'keel' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-lead"} -->
			<p class="is-style-lead"><?php esc_html_e( 'Eighteen years in practice, rated 4.9 from 640 reviews, and the dentist most of our nervous patients ask for by name.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"keel-chip"} -->
			<p class="keel-chip"><?php esc_html_e( 'Available today', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#book"><?php esc_html_e( 'Book with Dr. Ramirez', 'keel' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'About Dr. Ramirez', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Sofia qualified in 2008, spent a year in a hospital emergency department and opened Bright Harbor in 2009 with one chair and a promise: nobody leaves in pain, and nobody is sold treatment they do not need. She still takes the 7 am appointments.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Treats', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:list {"className":"is-style-two-column"} -->
	<ul class="wp-block-list is-style-two-column">
		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Check-ups and hygiene', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'White fillings and crowns', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Root canal treatment', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Teeth whitening', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Nervous and phobic patients', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Emergency appointments', 'keel' ); ?></li>
		<!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Weekly schedule', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:table {"className":"is-style-striped"} -->
	<figure class="wp-block-table is-style-striped"><table><thead><tr><th><?php esc_html_e( 'Day', 'keel' ); ?></th><th><?php esc_html_e( 'Hours', 'keel' ); ?></th></tr></thead><tbody>
	<?php foreach ( $keel_schedule as $keel_day ) : ?>
	<tr><td><?php echo esc_html( $keel_day[0] ); ?></td><td><?php echo esc_html( $keel_day[1] ); ?></td></tr>
	<?php endforeach; ?>
	</tbody></table></figure>
	<!-- /wp:table -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/dental-stories"} /-->

<!-- wp:pattern {"slug":"keel/dental-booking"} /-->

<!-- wp:pattern {"slug":"keel/dental-disclaimer"} /-->
