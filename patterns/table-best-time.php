<?php
/**
 * Title: Table: best time to visit
 * Slug: keel/table-best-time
 * Categories: keel/elements
 * Keywords: table, months, seasons, best time, scroll
 * Viewport Width: 1200
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_months = array( __( 'Jan', 'keel' ), __( 'Feb', 'keel' ), __( 'Mar', 'keel' ), __( 'Apr', 'keel' ), __( 'May', 'keel' ), __( 'Jun', 'keel' ), __( 'Jul', 'keel' ), __( 'Aug', 'keel' ), __( 'Sep', 'keel' ), __( 'Oct', 'keel' ), __( 'Nov', 'keel' ), __( 'Dec', 'keel' ) );
$keel_rows   = array(
	array( __( 'Weather', 'keel' ), array( 'B', 'B', 'B', 'B', 'G', 'F', 'F', 'F', 'F', 'G', 'B', 'B' ) ),
	array( __( 'Water', 'keel' ), array( 'F', 'F', 'G', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'G', 'F' ) ),
	array( __( 'Crowds', 'keel' ), array( 'F', 'F', 'F', 'G', 'B', 'B', 'G', 'G', 'B', 'B', 'G', 'F' ) ),
	array( __( 'Prices', 'keel' ), array( 'F', 'F', 'F', 'G', 'B', 'B', 'B', 'B', 'B', 'B', 'G', 'F' ) ),
);
$keel_labels = array(
	'B' => __( 'Best', 'keel' ),
	'G' => __( 'Good', 'keel' ),
	'F' => __( 'Fair', 'keel' ),
);
?>
<!-- wp:table {"className":"is-style-scroll"} -->
<figure class="wp-block-table is-style-scroll"><table><thead><tr><th><span class="screen-reader-text"><?php esc_html_e( 'Condition', 'keel' ); ?></span></th>
<?php foreach ( $keel_months as $keel_month ) : ?>
<th><?php echo esc_html( $keel_month ); ?></th>
<?php endforeach; ?>
</tr></thead><tbody>
<?php foreach ( $keel_rows as $keel_row ) : ?>
<tr><th scope="row"><?php echo esc_html( $keel_row[0] ); ?></th>
	<?php foreach ( $keel_row[1] as $keel_cell ) : ?>
<td><?php echo esc_html( $keel_labels[ $keel_cell ] ); ?></td>
	<?php endforeach; ?>
</tr>
<?php endforeach; ?>
</tbody></table><figcaption class="wp-element-caption"><?php esc_html_e( 'Best, good and fair months at a glance. Scroll sideways on a phone.', 'keel' ); ?></figcaption></figure>
<!-- /wp:table -->
