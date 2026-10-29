<?php
/**
 * Title: Comparison table
 * Slug: keel/comparison-table
 * Categories: keel/pricing
 * Keywords: compare, table, plans, features
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_plans = array( __( 'Essential', 'keel' ), __( 'Plus', 'keel' ), __( 'Complete', 'keel' ) );
$keel_rows  = array(
	array( __( 'Monthly price', 'keel' ), '$19', '$29', '$49' ),
	array( __( 'Visits per year', 'keel' ), '2', '2', '4' ),
	array( __( 'Priority scheduling', 'keel' ), __( 'No', 'keel' ), __( 'Yes', 'keel' ), __( 'Yes', 'keel' ) ),
	array( __( 'Discount on repairs', 'keel' ), '5%', '10%', '20%' ),
	array( __( 'After-hours line', 'keel' ), __( 'No', 'keel' ), __( 'No', 'keel' ), __( 'Yes', 'keel' ) ),
	array( __( 'Family members included', 'keel' ), '1', '2', __( 'Unlimited', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Compare the plans', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:table {"hasFixedLayout":true,"className":"is-style-striped"} -->
	<figure class="wp-block-table is-style-striped"><table class="has-fixed-layout"><thead><tr><th><?php esc_html_e( 'Feature', 'keel' ); ?></th>
	<?php foreach ( $keel_plans as $keel_plan ) : ?>
	<th><?php echo esc_html( $keel_plan ); ?></th>
	<?php endforeach; ?>
	</tr></thead><tbody>
	<?php foreach ( $keel_rows as $keel_row ) : ?>
	<tr>
		<?php foreach ( $keel_row as $keel_cell ) : ?>
		<td><?php echo esc_html( $keel_cell ); ?></td>
		<?php endforeach; ?>
	</tr>
	<?php endforeach; ?>
	</tbody></table><figcaption class="wp-element-caption"><?php esc_html_e( 'Prices per month, cancel any time after the first year.', 'keel' ); ?></figcaption></figure>
	<!-- /wp:table -->
</div>
<!-- /wp:group -->
