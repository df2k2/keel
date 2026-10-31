<?php
/**
 * Title: Table: departures
 * Slug: keel/table-departures
 * Categories: keel/elements
 * Keywords: table, departures, schedule, seats, prices
 * Viewport Width: 1000
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_rows = array(
	array( __( 'Sat 14 Mar', 'keel' ), __( 'Harbor to the islands', 'keel' ), 'success', __( 'Guaranteed', 'keel' ), '$48' ),
	array( __( 'Sun 15 Mar', 'keel' ), __( 'Sunrise reef run', 'keel' ), 'warning', __( '3 seats left', 'keel' ), '$65' ),
	array( __( 'Sat 21 Mar', 'keel' ), __( 'River bend by kayak', 'keel' ), '', __( 'New', 'keel' ), '$40' ),
	array( __( 'Sun 22 Mar', 'keel' ), __( 'Old town walk', 'keel' ), 'success', __( 'Guaranteed', 'keel' ), '$15' ),
);
?>
<!-- wp:table {"className":"is-style-striped"} -->
<figure class="wp-block-table is-style-striped"><table><thead><tr><th><?php esc_html_e( 'Date', 'keel' ); ?></th><th><?php esc_html_e( 'Route', 'keel' ); ?></th><th><?php esc_html_e( 'Seats', 'keel' ); ?></th><th><?php esc_html_e( 'Price', 'keel' ); ?></th><th><span class="screen-reader-text"><?php esc_html_e( 'Book', 'keel' ); ?></span></th></tr></thead><tbody>
<?php foreach ( $keel_rows as $keel_row ) : ?>
<tr><td><?php echo esc_html( $keel_row[0] ); ?></td><td><?php echo esc_html( $keel_row[1] ); ?></td><td><span class="keel-status<?php echo '' !== $keel_row[2] ? ' keel-status--' . esc_attr( $keel_row[2] ) : ''; ?>"><?php echo esc_html( $keel_row[3] ); ?></span></td><td><?php echo esc_html( $keel_row[4] ); ?></td><td><a class="wp-block-button__link wp-element-button has-sm-font-size" href="#book"><?php esc_html_e( 'Book', 'keel' ); ?></a></td></tr>
<?php endforeach; ?>
</tbody></table></figure>
<!-- /wp:table -->
