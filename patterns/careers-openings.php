<?php
/**
 * Title: Careers: openings
 * Slug: keel/careers-openings
 * Categories: keel/company
 * Keywords: careers, jobs, openings, roles, apply
 * Viewport Width: 1000
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_roles = array(
	array( __( 'Editor, places and trails', 'keel' ), array( array( 'map-pin', __( 'Harbor district office', 'keel' ) ), array( 'clock', __( 'Full time', 'keel' ) ) ) ),
	array( __( 'Photographer, seasonal', 'keel' ), array( array( 'map-pin', __( 'On the water, mostly', 'keel' ) ), array( 'clock', __( 'November to April', 'keel' ) ) ) ),
	array( __( 'Visitor centre host', 'keel' ), array( array( 'map-pin', __( 'Riverside green', 'keel' ) ), array( 'clock', __( 'Weekends', 'keel' ) ) ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"52rem"}} -->
<div class="wp-block-group">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Open roles', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<?php
	foreach ( $keel_roles as $keel_role ) :
		$keel_meta = $keel_role[1];
		?>
	<!-- wp:group {"className":"is-style-card","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group is-style-card">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_role[0] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:group {"className":"keel-meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group keel-meta">
				<?php foreach ( $keel_meta as $keel_item ) : ?>
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"lightbox":{"enabled":false},"width":"14px","height":"14px","sizeSlug":"full","className":"keel-icon"} -->
					<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_item[0] . '.svg' ) ); ?>" alt="" style="width:14px;height:14px"/></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph -->
					<p><?php echo esc_html( $keel_item[1] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-icon-arrow"} -->
			<div class="wp-block-button is-style-icon-arrow"><a class="wp-block-button__link wp-element-button" href="#apply"><?php esc_html_e( 'Apply', 'keel' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
