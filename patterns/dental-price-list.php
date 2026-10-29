<?php
/**
 * Title: Dental: price list
 * Slug: keel/dental-price-list
 * Description: Bright Harbor Dental is a fictional practice. Its people, prices, hours and reviews are invented for the demo.
 * Categories: keel/dental
 * Keywords: dental, prices, price list, tables
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_groups = array(
	array( __( 'Check-ups and hygiene', 'keel' ), array( array( __( 'New patient examination', 'keel' ), '$85' ), array( __( 'Hygiene visit (30 minutes)', 'keel' ), '$95' ), array( __( 'Digital x-rays (set)', 'keel' ), '$45' ), array( __( 'Children under 12', 'keel' ), '$60' ) ) ),
	array( __( 'Cosmetic', 'keel' ), array( array( __( 'In-chair whitening with trays', 'keel' ), '$390' ), array( __( 'Composite bonding, per tooth', 'keel' ), '$180' ), array( __( 'Porcelain veneer, per tooth', 'keel' ), '$950' ), array( __( 'Clear aligners, full course', 'keel' ), __( 'from $2,900', 'keel' ) ) ) ),
	array( __( 'Restorative', 'keel' ), array( array( __( 'White filling', 'keel' ), __( 'from $160', 'keel' ) ), array( __( 'Crown', 'keel' ), __( 'from $1,100', 'keel' ) ), array( __( 'Single implant with crown', 'keel' ), __( 'from $2,400', 'keel' ) ), array( __( 'Emergency visit, same day', 'keel' ), '$120' ) ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Price list', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Every price includes the examination, the local anaesthetic and the follow-up. Where a treatment depends on what we find, the range is confirmed in writing before we start.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"20rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_groups as $keel_group ) : ?>
		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":3,"fontSize":"lg"} -->
			<h3 class="wp-block-heading has-lg-font-size"><?php echo esc_html( $keel_group[0] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:table {"className":"is-style-compact"} -->
			<figure class="wp-block-table is-style-compact"><table><thead><tr><th><?php esc_html_e( 'Treatment', 'keel' ); ?></th><th><?php esc_html_e( 'Price', 'keel' ); ?></th></tr></thead><tbody>
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
