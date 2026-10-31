<?php
/**
 * Title: Profiles grid
 * Slug: keel/profiles-grid
 * Categories: keel/team
 * Keywords: team, profiles, grid, people
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_avatar   = get_theme_file_uri( 'assets/images/placeholder-avatar.svg' );
$keel_profiles = array(
	array( __( 'Local expert', 'keel' ), __( 'Jordan Lee', 'keel' ), __( 'Editor, places and trails', 'keel' ), __( 'Grew up on the river and still walks the old rail line every Sunday. Ask about the quiet beaches.', 'keel' ) ),
	array( __( 'Food', 'keel' ), __( 'Priya Patel', 'keel' ), __( 'Editor, food and markets', 'keel' ), __( 'Knows which boat the fish came off and which stall sells out first.', 'keel' ) ),
	array( __( 'On the water', 'keel' ), __( 'Sam Rivera', 'keel' ), __( 'Guide and photographer', 'keel' ), __( 'Twenty seasons of charters and a camera that is never dry.', 'keel' ) ),
	array( __( 'Family', 'keel' ), __( 'Casey Nguyen', 'keel' ), __( 'Writer, family days out', 'keel' ), __( 'Tests every playground, splash pad and rainy-day plan with three small critics.', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'The people behind the guide', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $keel_profiles as $keel_profile ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"lightbox":{"enabled":false},"width":"96px","height":"96px","sizeSlug":"full","className":"is-style-rounded"} -->
					<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( $keel_avatar ); ?>" alt="" style="width:96px;height:96px"/></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"className":"keel-stamp"} -->
					<p class="keel-stamp"><?php echo esc_html( $keel_profile[0] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_profile[1] ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><strong><?php echo esc_html( $keel_profile[2] ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p style="font-size:0.9375rem"><?php echo esc_html( $keel_profile[3] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
