<?php
/**
 * Title: Dental page: about
 * Slug: keel/dental-about
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, page, about, story, team
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image      = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
$keel_milestones = array(
	array( '2009', __( 'One chair on Harbor Street', 'keel' ), __( 'Dr. Ramirez opens with a single treatment room and a promise that nobody leaves in pain.', 'keel' ) ),
	array( '2013', __( 'Dr. Tanaka joins', 'keel' ), __( 'Implants and surgery come in-house, so patients stop travelling to a specialist across the county.', 'keel' ) ),
	array( '2018', __( 'The nervous-patient programme', 'keel' ), __( 'Longer appointments, a quiet room and the stop signal become standard for anyone who asks.', 'keel' ) ),
	array( '2026', __( 'Four dentists, 2,300 reviews', 'keel' ), __( 'Still on Harbor Street, still answering the phone ourselves, still seeing emergencies the same day.', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading"><?php esc_html_e( 'A neighbourhood practice since 2009', 'keel' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-lead"} -->
			<p class="is-style-lead"><?php esc_html_e( 'Bright Harbor Dental is four dentists, nine team members and one building on Harbor Street. We treat people the way we would want our own families treated: honestly, gently and without a hard sell.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"full","className":"is-style-soft"} -->
			<figure class="wp-block-image size-full is-style-soft"><img src="<?php echo esc_url( $keel_image ); ?>" alt="<?php esc_attr_e( 'The Bright Harbor Dental team outside the practice', 'keel' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Our story', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:list {"className":"keel-timeline"} -->
	<ul class="wp-block-list keel-timeline">
		<?php foreach ( $keel_milestones as $keel_milestone ) : ?>
		<!-- wp:list-item -->
		<li><strong class="keel-timeline__year"><?php echo esc_html( $keel_milestone[0] ); ?></strong><br><strong><?php echo esc_html( $keel_milestone[1] ); ?></strong><br><?php echo esc_html( $keel_milestone[2] ); ?></li>
		<!-- /wp:list-item -->
		<?php endforeach; ?>
	</ul>
	<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/dental-features"} /-->

<!-- wp:pattern {"slug":"keel/dental-dentists"} /-->

<!-- wp:pattern {"slug":"keel/dental-insurers"} /-->

<!-- wp:pattern {"slug":"keel/dental-booking"} /-->

<!-- wp:pattern {"slug":"keel/dental-disclaimer"} /-->
