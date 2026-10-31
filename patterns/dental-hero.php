<?php
/**
 * Title: Dental: hero
 * Slug: keel/dental-hero
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, hero, booking
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image       = get_theme_file_uri( 'assets/images/placeholder-portrait.svg' );
$keel_quick_links = array(
	'#check-ups' => __( 'Check-ups', 'keel' ),
	'#whitening' => __( 'Whitening', 'keel' ),
	'#implants'  => __( 'Implants', 'keel' ),
	'#aligners'  => __( 'Aligners', 'keel' ),
	'#kids'      => __( 'Kids', 'keel' ),
	'#emergency' => __( 'Emergency', 'keel' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">
			<!-- wp:paragraph {"className":"keel-chip"} -->
			<p class="keel-chip"><?php esc_html_e( 'Next slot: today 2:30 pm', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1,"fontSize":"display"} -->
			<h1 class="wp-block-heading has-display-font-size"><?php esc_html_e( 'Gentle dentistry, clear prices, same-week appointments', 'keel' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"lg"} -->
			<p class="has-lg-font-size"><?php esc_html_e( 'Bright Harbor Dental has looked after Stuart families since 2009. Book online in two minutes, see the price before you sit down, and tell us if you are nervous: half our patients were.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#book"><?php esc_html_e( 'Book online', 'keel' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-ghost"} -->
				<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="tel:+15555550100"><?php esc_html_e( 'Call (555) 555-0100', 'keel' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:paragraph {"className":"keel-badge"} -->
			<p class="keel-badge"><?php esc_html_e( 'Pain-free promise: tell us to stop and we stop, every time', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-buttons">
				<?php foreach ( $keel_quick_links as $keel_href => $keel_label ) : ?>
				<!-- wp:button {"backgroundColor":"surface","textColor":"contrast","className":"is-style-pill","fontSize":"xs"} -->
				<div class="wp-block-button has-custom-font-size is-style-pill has-xs-font-size"><a class="wp-block-button__link has-contrast-color has-surface-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $keel_href ); ?>"><?php echo esc_html( $keel_label ); ?></a></div>
				<!-- /wp:button -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
			<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"full","className":"is-style-soft"} -->
			<figure class="wp-block-image size-full is-style-soft"><img src="<?php echo esc_url( $keel_image ); ?>" alt="<?php esc_attr_e( 'A dentist greeting a patient in a bright treatment room', 'keel' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
