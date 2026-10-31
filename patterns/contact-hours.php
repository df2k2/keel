<?php
/**
 * Title: Contact hours
 * Slug: keel/contact-hours
 * Categories: keel/company
 * Keywords: contact, hours, opening times, table, callout
 * Viewport Width: 1000
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_hours = array(
	array( __( 'Monday to Friday', 'keel' ), __( '9 am to 5 pm', 'keel' ) ),
	array( __( 'Saturday', 'keel' ), __( '9 am to 1 pm', 'keel' ) ),
	array( __( 'Sunday', 'keel' ), __( 'Closed', 'keel' ) ),
	array( __( 'Public holidays', 'keel' ), __( '10 am to 2 pm', 'keel' ) ),
);
?>
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"60%"} -->
	<div class="wp-block-column" style="flex-basis:60%">
		<!-- wp:heading {"level":2,"fontSize":"xl"} -->
		<h2 class="wp-block-heading has-xl-font-size"><?php esc_html_e( 'Visitor centre hours', 'keel' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:table {"className":"is-style-compact"} -->
		<figure class="wp-block-table is-style-compact"><table><tbody>
		<?php foreach ( $keel_hours as $keel_row ) : ?>
		<tr><th scope="row"><?php echo esc_html( $keel_row[0] ); ?></th><td><?php echo esc_html( $keel_row[1] ); ?></td></tr>
		<?php endforeach; ?>
		</tbody></table></figure>
		<!-- /wp:table -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"40%"} -->
	<div class="wp-block-column" style="flex-basis:40%">
		<!-- wp:group {"className":"is-style-callout-info","layout":{"type":"constrained"}} -->
		<div class="wp-block-group is-style-callout-info">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Walk-ins welcome. For group visits of ten or more, call a day ahead and we will have the maps and the coffee ready.', 'keel' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
