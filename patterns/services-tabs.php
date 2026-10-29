<?php
/**
 * Title: Services in tabs
 * Slug: keel/services-tabs
 * Categories: keel/services
 * Keywords: services, tabs, groups
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_tabs = array(
	array(
		__( 'Everyday', 'keel' ),
		array( __( 'Check-ups and inspections', 'keel' ), __( 'Cleaning and tune-ups', 'keel' ), __( 'Small repairs on the spot', 'keel' ) ),
	),
	array(
		__( 'Specialist', 'keel' ),
		array( __( 'Full replacements', 'keel' ), __( 'Custom installations', 'keel' ), __( 'Second opinions', 'keel' ) ),
	),
	array(
		__( 'Urgent', 'keel' ),
		array( __( 'Same-day callouts', 'keel' ), __( 'After-hours line', 'keel' ), __( 'Temporary fixes while parts arrive', 'keel' ) ),
	),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Everything we do', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:tabs -->
	<div class="wp-block-tabs">
		<!-- wp:tab-list -->
		<div role="tablist" class="wp-block-tab-list">
			<?php foreach ( $keel_tabs as $keel_tab ) : ?>
			<button type="button" role="tab"><?php echo esc_html( $keel_tab[0] ); ?></button>
			<?php endforeach; ?>
		</div>
		<!-- /wp:tab-list -->

		<!-- wp:tab-panels -->
		<div class="wp-block-tab-panels">
			<?php foreach ( $keel_tabs as $keel_tab ) : ?>
			<!-- wp:tab-panel {"label":"<?php echo esc_attr( $keel_tab[0] ); ?>"} -->
			<section role="tabpanel" tabindex="0" class="wp-block-tab-panel">
				<!-- wp:list {"className":"is-style-checkmarks"} -->
				<ul class="wp-block-list is-style-checkmarks">
					<?php foreach ( $keel_tab[1] as $keel_item ) : ?>
					<!-- wp:list-item -->
					<li><?php echo esc_html( $keel_item ); ?></li>
					<!-- /wp:list-item -->
					<?php endforeach; ?>
				</ul>
				<!-- /wp:list -->

				<!-- wp:paragraph -->
				<p><a href="#contact"><?php esc_html_e( 'Ask about these services', 'keel' ); ?></a></p>
				<!-- /wp:paragraph -->
			</section>
			<!-- /wp:tab-panel -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:tab-panels -->
	</div>
	<!-- /wp:tabs -->
</div>
<!-- /wp:group -->
