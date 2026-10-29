<?php
/**
 * Title: Page: pricing
 * Slug: keel/page-pricing
 * Categories: keel/layouts
 * Keywords: page, pricing, prices, tables, layout
 * Viewport Width: 1400
 * Inserter: yes
 * Template Types: page
 * Post Types: page
 * Block Types: core/post-content
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_groups = array(
	array( __( 'Check-ups and prevention', 'keel' ), array( array( __( 'Check-up', 'keel' ), '$85' ), array( __( 'Full inspection with report', 'keel' ), '$120' ), array( __( 'Annual plan (two visits)', 'keel' ), '$19/mo' ) ) ),
	array( __( 'Repairs', 'keel' ), array( array( __( 'Minor repair', 'keel' ), __( 'from $120', 'keel' ) ), array( __( 'Major repair', 'keel' ), __( 'from $390', 'keel' ) ), array( __( 'Same-day callout', 'keel' ), '$60' ) ) ),
	array( __( 'Replacements', 'keel' ), array( array( __( 'Standard replacement', 'keel' ), __( 'from $2,400', 'keel' ) ), array( __( 'Premium replacement', 'keel' ), __( 'from $3,900', 'keel' ) ), array( __( 'Removal of the old unit', 'keel' ), __( 'included', 'keel' ) ) ) ),
	array( __( 'Families', 'keel' ), array( array( __( 'Children under 12', 'keel' ), '$60' ), array( __( 'Family plan (up to 4)', 'keel' ), '$49/mo' ), array( __( 'Second household visit', 'keel' ), __( 'half price', 'keel' ) ) ) ),
	array( __( 'Urgent', 'keel' ), array( array( __( 'Same-day assessment', 'keel' ), '$120' ), array( __( 'After-hours visit', 'keel' ), '$220' ), array( __( 'Temporary fix', 'keel' ), __( 'from $90', 'keel' ) ) ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","level":1} -->
	<h1 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'Prices', 'keel' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","className":"is-style-lead"} -->
	<p class="has-text-align-center is-style-lead"><?php esc_html_e( 'Every price here is the price you pay. Where a job depends on what we find, the range is shown and confirmed in writing before we start.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"20rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_groups as $keel_group ) : ?>
		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":2,"fontSize":"lg"} -->
			<h2 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_group[0] ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:table {"className":"is-style-compact"} -->
			<figure class="wp-block-table is-style-compact"><table><thead><tr><th><?php esc_html_e( 'Item', 'keel' ); ?></th><th><?php esc_html_e( 'Price', 'keel' ); ?></th></tr></thead><tbody>
			<?php foreach ( $keel_group[1] as $keel_row ) : ?>
			<tr><td><?php echo esc_html( $keel_row[0] ); ?></td><td><?php echo esc_html( $keel_row[1] ); ?></td></tr>
			<?php endforeach; ?>
			</tbody></table></figure>
			<!-- /wp:table -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/payment-plan-band"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-bordered">
		<!-- wp:heading {"level":2,"fontSize":"lg"} -->
		<h2 class="wp-block-heading has-lg-font-size"><?php esc_html_e( 'Insurance', 'keel' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'We bill most major insurers directly and tell you what your plan covers before the visit. Bring your card and we handle the paperwork.', 'keel' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"keel/pricing-table"} /-->

<!-- wp:pattern {"slug":"keel/comparison-table"} /-->

<!-- wp:pattern {"slug":"keel/faq-accordion"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size"><?php esc_html_e( 'Prices are correct at the time of publication and include tax. Payment plans are subject to approval. Where work depends on an assessment, the final price is confirmed in writing before it begins.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
