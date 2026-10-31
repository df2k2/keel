<?php
/**
 * Title: Event header
 * Slug: keel/event-header
 * Categories: keel/events
 * Keywords: event, header, ticket, date, venue
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_meta = array(
	array( 'calendar', __( 'Saturday 14 March, 7 to 10 pm', 'keel' ) ),
	array( 'map-pin', __( 'Riverside green', 'keel' ) ),
	array( 'clock', __( 'Doors 6:30 pm', 'keel' ) ),
);
?>
<!-- wp:group {"className":"is-style-ticket","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group is-style-ticket">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"keel-day"} -->
		<p class="keel-day">14</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"keel-eyebrow"} -->
			<p class="keel-eyebrow"><?php esc_html_e( 'Market', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"className":"is-style-accent"} -->
			<h1 class="wp-block-heading is-style-accent">
			<?php
			/* translators: 1: opening em tag, 2: closing em tag. */
			printf( esc_html__( 'Harbor %1$snight market%2$s', 'keel' ), '<em>', '</em>' );
			?>
			</h1>
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
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"keel-card-footer","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group keel-card-footer">
		<!-- wp:paragraph {"className":"keel-price"} -->
		<p class="keel-price"><span class="keel-price__label"><?php echo esc_html( __( 'From', 'keel' ) ); ?></span> <?php echo esc_html( '$12' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"fontSize":"sm"} -->
			<div class="wp-block-button has-custom-font-size has-sm-font-size"><a class="wp-block-button__link wp-element-button" href="#tickets"><?php echo esc_html( __( 'Get tickets', 'keel' ) ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
