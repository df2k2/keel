<?php
/**
 * Title: Elements: forms
 * Slug: keel/elements-forms
 * Categories: keel/pages
 * Keywords: elements, forms, search, fields
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_fields = array( __( 'Name', 'keel' ), __( 'Email', 'keel' ), __( 'Phone', 'keel' ), __( 'Preferred time', 'keel' ), __( 'Message', 'keel' ), __( 'Consent to be contacted', 'keel' ) );
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"forms"} -->
	<h2 class="wp-block-heading" id="forms"><?php esc_html_e( 'Forms', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Keel ships no form plugin and no form markup of its own. Core\'s Search block shows the field and button styling that any form plugin inherits.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"<?php esc_attr_e( 'Search the site', 'keel' ); ?>","showLabel":true,"buttonText":"<?php esc_attr_e( 'Search', 'keel' ); ?>"} /-->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'States and messages', 'keel' ); ?></h3>
	<!-- /wp:heading -->
	<?php echo Keel\Theme\element_label( '.is-error, :user-invalid' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:search {"label":"<?php esc_attr_e( 'Email address with a mistake', 'keel' ); ?>","showLabel":true,"placeholder":"<?php esc_attr_e( 'not an email', 'keel' ); ?>","buttonText":"<?php esc_attr_e( 'Send', 'keel' ); ?>","className":"is-error"} /-->
	<?php echo Keel\Theme\element_label( '.keel-form-message, --success, --error' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:paragraph {"className":"keel-form-message keel-form-message--error"} -->
	<p class="keel-form-message keel-form-message--error"><?php esc_html_e( 'That does not look like an email address. Check it and try again.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"className":"keel-form-message keel-form-message--success"} -->
	<p class="keel-form-message keel-form-message--success"><?php esc_html_e( 'Sent. We reply within a working day.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size"><?php esc_html_e( 'The switch (input.keel-switch) and the range input are styled too; the demo shows them in the Every core block section, since patterns carry no raw inputs.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"fontSize":"sm"} -->
	<p class="has-sm-font-size"><?php esc_html_e( 'The one-row subscribe field is in the newsletter and footer section below.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":3} -->
	<h3 class="wp-block-heading"><?php esc_html_e( 'The contact shell expects', 'keel' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:list {"className":"is-style-two-column"} -->
	<ul class="wp-block-list is-style-two-column">
		<?php foreach ( $keel_fields as $keel_field ) : ?>
		<!-- wp:list-item -->
		<li><?php echo esc_html( $keel_field ); ?></li>
		<!-- /wp:list-item -->
		<?php endforeach; ?>
	</ul>
	<!-- /wp:list -->
</div>
<!-- /wp:group -->
