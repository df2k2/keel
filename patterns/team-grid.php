<?php
/**
 * Title: Team grid
 * Slug: keel/team-grid
 * Categories: keel/team
 * Keywords: team, staff, people
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Meet the team', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"96px","height":"96px","sizeSlug":"full","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-avatar.svg' ) ); ?>" alt="" style="width:96px;height:96px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Jordan Lee', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><strong><?php esc_html_e( 'Owner and lead technician', 'keel' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Twenty years on the tools and still answers the phone.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"96px","height":"96px","sizeSlug":"full","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-avatar.svg' ) ); ?>" alt="" style="width:96px;height:96px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Priya Patel', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><strong><?php esc_html_e( 'Service manager', 'keel' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Keeps every job on schedule and every customer informed.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"96px","height":"96px","sizeSlug":"full","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-avatar.svg' ) ); ?>" alt="" style="width:96px;height:96px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Sam Rivera', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><strong><?php esc_html_e( 'Senior technician', 'keel' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Diagnostics specialist with a reputation for tidy work.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:image {"lightbox":{"enabled":false},"width":"96px","height":"96px","sizeSlug":"full","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-avatar.svg' ) ); ?>" alt="" style="width:96px;height:96px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"level":3,"fontSize":"lg"} -->
				<h3 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Casey Nguyen', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><strong><?php esc_html_e( 'Office and scheduling', 'keel' ); ?></strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'The friendly voice that books your visit.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
