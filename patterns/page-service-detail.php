<?php
/**
 * Title: Page: service detail
 * Slug: keel/page-service-detail
 * Categories: keel/layouts
 * Keywords: page, service, detail, layout
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image     = get_theme_file_uri( 'assets/images/placeholder-wide.svg' );
$keel_steps     = array(
	array( __( 'Before', 'keel' ), __( 'A short assessment, a written plan and a price you can take home. Nothing starts until you say so.', 'keel' ) ),
	array( __( 'During', 'keel' ), __( 'Most visits take under an hour. You can pause at any point and we explain each step as we go.', 'keel' ) ),
	array( __( 'After', 'keel' ), __( 'Clear aftercare notes, a check-in call within the week and a direct line if anything feels off.', 'keel' ) ),
);
$keel_prices    = array(
	array( __( 'Assessment and plan', 'keel' ), '$0' ),
	array( __( 'Standard service', 'keel' ), __( 'from $390', 'keel' ) ),
	array( __( 'Extended service', 'keel' ), __( 'from $620', 'keel' ) ),
	array( __( 'Follow-up visit', 'keel' ), __( 'included', 'keel' ) ),
);
$keel_downloads = array( __( 'Aftercare guide (PDF)', 'keel' ), __( 'Consent form (PDF)', 'keel' ), __( 'Price list (PDF)', 'keel' ) );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:paragraph {"className":"keel-eyebrow"} -->
			<p class="keel-eyebrow"><?php esc_html_e( 'Service', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":1} -->
			<h1 class="wp-block-heading"><?php esc_html_e( 'Premium service', 'keel' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-lead"} -->
			<p class="is-style-lead"><?php esc_html_e( 'Our most thorough package: a full assessment, the complete service and a two-year guarantee, explained in plain words and priced before we start.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Book this service', 'keel' ); ?></a></div>
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
			<figure class="wp-block-image size-full is-style-soft"><img src="<?php echo esc_url( $keel_image ); ?>" alt="<?php esc_attr_e( 'The service being carried out', 'keel' ); ?>"/></figure>
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
				<li><?php esc_html_e( 'Equipment past its service date', 'keel' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Recurring faults that smaller repairs did not fix', 'keel' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Anyone who wants one visit and a long guarantee', 'keel' ); ?></li>
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
				<p class="keel-stat__number">$390</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'Or $33 a month over 12 months at 0% interest.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"width":100} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Book now', 'keel' ); ?></a></div>
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
					<?php foreach ( $keel_downloads as $keel_download ) : ?>
					<!-- wp:list-item -->
					<li><a href="#downloads"><?php echo esc_html( $keel_download ); ?></a></li>
					<!-- /wp:list-item -->
					<?php endforeach; ?>
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-bordered">
				<!-- wp:heading {"level":3,"fontSize":"md"} -->
				<h3 class="wp-block-heading has-md-font-size"><?php esc_html_e( 'Front desk', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><a href="tel:+15555550100">(555) 555-0100</a><br><?php esc_html_e( 'Mon to Fri 7 am to 7 pm', 'keel' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-surface","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface">
				<!-- wp:heading {"level":3,"fontSize":"md"} -->
				<h3 class="wp-block-heading has-md-font-size"><?php esc_html_e( 'Not sure this is right for you?', 'keel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"sm"} -->
				<p class="has-sm-font-size"><?php esc_html_e( 'A free assessment tells you. No pressure, no obligation.', 'keel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-ghost"} -->
					<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="#contact"><?php esc_html_e( 'Ask a question', 'keel' ); ?></a></div>
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

<!-- wp:pattern {"slug":"keel/providers-grid"} /-->

<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->

<!-- wp:pattern {"slug":"keel/services-grid-prices"} /-->

<!-- wp:pattern {"slug":"keel/cta-band-primary"} /-->
