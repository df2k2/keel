<?php
/**
 * Title: Page: provider profile
 * Slug: keel/page-provider
 * Categories: keel/layouts
 * Keywords: page, provider, profile, team, layout
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
	array( __( 'Monday', 'keel' ), __( '8 am to 5 pm', 'keel' ) ),
	array( __( 'Tuesday', 'keel' ), __( '8 am to 5 pm', 'keel' ) ),
	array( __( 'Wednesday', 'keel' ), __( '10 am to 7 pm', 'keel' ) ),
	array( __( 'Thursday', 'keel' ), __( '8 am to 5 pm', 'keel' ) ),
	array( __( 'Friday', 'keel' ), __( '8 am to 1 pm', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"35%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"full","className":"is-style-soft"} -->
			<figure class="wp-block-image size-full is-style-soft"><img src="<?php echo esc_url( $keel_portrait ); ?>" alt="<?php esc_attr_e( 'Portrait of Jordan Lee', 'keel' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"65%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:65%">
			<!-- wp:paragraph {"className":"keel-eyebrow"} -->
			<p class="keel-eyebrow"><?php esc_html_e( 'Lead specialist', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading"><?php esc_html_e( 'Jordan Lee', 'keel' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-lead"} -->
			<p class="is-style-lead"><?php esc_html_e( 'Twenty years on the tools, a 4.9 rating from 310 reviews, and a habit of explaining things until they make sense.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"keel-chip"} -->
			<p class="keel-chip"><?php esc_html_e( 'Available today', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Book with Jordan', 'keel' ); ?></a></div>
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
	<h2 class="wp-block-heading"><?php esc_html_e( 'About Jordan', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Jordan founded the practice in 2009 after a decade with a national firm, and still takes the first appointment of the day. Patients mention the same two things: nothing is rushed, and nothing is sold that is not needed.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Treats', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:list {"className":"is-style-two-column"} -->
	<ul class="wp-block-list is-style-two-column">
		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Routine check-ups', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Complex repairs', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Full replacements', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Second opinions', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Anxious first-timers', 'keel' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Urgent same-day cases', 'keel' ); ?></li>
		<!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/timeline"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--60)">
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

<!-- wp:pattern {"slug":"keel/services-grid-prices"} /-->

<!-- wp:pattern {"slug":"keel/cta-split"} /-->
