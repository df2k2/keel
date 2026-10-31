<?php
/**
 * Title: Profile card
 * Slug: keel/profile-card
 * Categories: keel/team
 * Keywords: team, profile, person, stamp, card
 * Viewport Width: 480
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_avatar = get_theme_file_uri( 'assets/images/placeholder-avatar.svg' );
?>
<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-card">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
	<div class="wp-block-group">
		<!-- wp:image {"lightbox":{"enabled":false},"width":"96px","height":"96px","sizeSlug":"full","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( $keel_avatar ); ?>" alt="" style="width:96px;height:96px"/></figure>
		<!-- /wp:image -->

		<!-- wp:paragraph {"className":"keel-stamp"} -->
		<p class="keel-stamp"><?php echo esc_html( __( 'Local expert', 'keel' ) ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:heading {"level":3,"fontSize":"lg"} -->
	<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( __( 'Jordan Lee', 'keel' ) ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size"><strong><?php echo esc_html( __( 'Editor, places and trails', 'keel' ) ); ?></strong></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"}}} -->
	<p style="font-size:0.9375rem"><?php echo esc_html( __( 'Grew up on the river and still walks the old rail line every Sunday. Ask about the quiet beaches.', 'keel' ) ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
