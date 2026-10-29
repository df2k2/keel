<?php
/**
 * Title: Dental page: dental implants
 * Slug: keel/dental-service-implants
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, page, implants, restorative
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image  = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
$keel_steps  = array(
	array( __( 'Before', 'keel' ), __( 'A 3D scan and a free consultation. You get a written plan with the full price and the timeline before anything is booked.', 'keel' ) ),
	array( __( 'During', 'keel' ), __( 'Placing the root takes about forty minutes under local anaesthetic, with sedation available. Most people are back at work the next day.', 'keel' ) ),
	array( __( 'After', 'keel' ), __( 'The root heals for three months, then the crown is fitted in one visit. Reviews at two weeks and one year are included.', 'keel' ) ),
);
$keel_prices = array(
	array( __( 'Implant consultation with 3D scan', 'keel' ), __( 'free', 'keel' ) ),
	array( __( 'Single implant with crown', 'keel' ), __( 'from $2,400', 'keel' ) ),
	array( __( 'Bone graft, if needed', 'keel' ), __( 'from $450', 'keel' ) ),
	array( __( 'Implant-retained denture (4 implants)', 'keel' ), __( 'from $9,800', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:paragraph {"className":"keel-eyebrow"} -->
			<p class="keel-eyebrow"><?php esc_html_e( 'Restorative', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading"><?php esc_html_e( 'Dental implants', 'keel' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-lead"} -->
			<p class="is-style-lead"><?php esc_html_e( 'A permanent replacement tooth: a titanium root placed by Dr. Tanaka and a crown made to match your own teeth, all under one roof and one price.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#book"><?php esc_html_e( 'Book a free consultation', 'keel' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-ghost"} -->
				<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="tel:+15555550100"><?php esc_html_e( 'Call (555) 555-0100', 'keel' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:image {"lightbox":{"enabled":false},"sizeSlug":"full","className":"is-style-soft"} -->
			<figure class="wp-block-image size-full is-style-soft"><img src="<?php echo esc_url( $keel_image ); ?>" alt="<?php esc_attr_e( 'A dentist showing a patient an implant model', 'keel' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"66%"} -->
		<div class="wp-block-column" style="flex-basis:66%">
			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Good for', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:list {"className":"is-style-checkmarks"} -->
			<ul class="wp-block-list is-style-checkmarks">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'A single missing tooth or several', 'keel' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'A loose denture you would rather be rid of', 'keel' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Anyone who wants a fixed tooth that lasts decades', 'keel' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'What to expect', 'keel' ); ?></h2>
			<!-- /wp:heading -->
			<?php foreach ( $keel_steps as $keel_step ) : ?>
			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_step[0] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html( $keel_step[1] ); ?></p>
			<!-- /wp:paragraph -->
			<?php endforeach; ?>

			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Prices', 'keel' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:table {"className":"is-style-compact"} -->
			<figure class="wp-block-table is-style-compact"><table><thead><tr><th><?php esc_html_e( 'Item', 'keel' ); ?></th><th><?php esc_html_e( 'Price', 'keel' ); ?></th></tr></thead><tbody>
			<?php foreach ( $keel_prices as $keel_price ) : ?>
			<tr><td><?php echo esc_html( $keel_price[0] ); ?></td><td><?php echo esc_html( $keel_price[1] ); ?></td></tr>
			<?php endforeach; ?>
			</tbody></table></figure>
			<!-- /wp:table -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"34%"} -->
		<div class="wp-block-column" style="flex-basis:34%">
			<!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-card">
				<!-- wp:paragraph {"className":"keel-eyebrow"} -->
				<p class="keel-eyebrow"><?php esc_html_e( 'From', 'keel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"keel-stat__number"} -->
				<p class="keel-stat__number">$2,400</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'Or $200 a month over 12 months at 0% interest.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"width":100} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="#book"><?php esc_html_e( 'Book now', 'keel' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-bordered">
				<!-- wp:heading {"level":3,"fontSize":"md"} -->
				<h3 class="wp-block-heading has-md-font-size"><?php esc_html_e( 'Downloads', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:list -->
				<ul class="wp-block-list">
					<!-- wp:list-item -->
					<li><a href="#downloads"><?php esc_html_e( 'Aftercare guide (PDF)', 'keel' ); ?></a></li>
					<!-- /wp:list-item -->

					<!-- wp:list-item -->
					<li><a href="#downloads"><?php esc_html_e( 'Consent form (PDF)', 'keel' ); ?></a></li>
					<!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-bordered">
				<!-- wp:heading {"level":3,"fontSize":"md"} -->
				<h3 class="wp-block-heading has-md-font-size"><?php esc_html_e( 'Patient desk', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><a href="tel:+15555550100">(555) 555-0100</a><br><?php esc_html_e( 'Mon to Fri 7 am to 5 pm', 'keel' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-surface","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface">
				<!-- wp:heading {"level":3,"fontSize":"md"} -->
				<h3 class="wp-block-heading has-md-font-size"><?php esc_html_e( 'Not sure it is right for you?', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'The consultation is free and there is no obligation. Ask anything.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-ghost"} -->
					<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#book"><?php esc_html_e( 'Ask a question', 'keel' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/dental-payment-plan"} /-->

<!-- wp:pattern {"slug":"keel/dental-before-after"} /-->

<!-- wp:pattern {"slug":"keel/dental-faq"} /-->

<!-- wp:pattern {"slug":"keel/dental-booking"} /-->

<!-- wp:pattern {"slug":"keel/dental-disclaimer"} /-->
