<?php
/**
 * Title: Search panel
 * Slug: keel/search-panel
 * Categories: keel/elements
 * Keywords: search, tabs, places, stays, events, chips
 * Viewport Width: 1000
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_tabs = array(
	array( __( 'Places', 'keel' ), __( 'Where to?', 'keel' ), array( __( 'All', 'keel' ), __( 'Beaches', 'keel' ), __( 'Trails', 'keel' ), __( 'Museums', 'keel' ) ) ),
	array( __( 'Stays', 'keel' ), __( 'Town or neighbourhood', 'keel' ), array( __( 'All', 'keel' ), __( 'Hotels', 'keel' ), __( 'Rentals', 'keel' ), __( 'Camping', 'keel' ) ) ),
	array( __( 'Events', 'keel' ), __( 'What is on?', 'keel' ), array( __( 'All', 'keel' ), __( 'This weekend', 'keel' ), __( 'Markets', 'keel' ), __( 'Music', 'keel' ) ) ),
);
?>
<!-- wp:group {"className":"keel-search-panel is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group keel-search-panel is-style-card">
	<!-- wp:tabs {"className":"is-style-pills"} -->
	<div class="wp-block-tabs is-style-pills">
		<!-- wp:tab-list -->
		<div role="tablist" class="wp-block-tab-list">
			<?php foreach ( $keel_tabs as $keel_tab ) : ?>
			<button type="button" role="tab"><?php echo esc_html( $keel_tab[0] ); ?></button>
			<?php endforeach; ?>
		</div>
		<!-- /wp:tab-list -->

		<!-- wp:tab-panels -->
		<div class="wp-block-tab-panels">
			<?php
			foreach ( $keel_tabs as $keel_tab ) :
				$keel_chips = $keel_tab[2];
				?>
			<!-- wp:tab-panel {"label":"<?php echo esc_attr( $keel_tab[0] ); ?>"} -->
			<section role="tabpanel" tabindex="0" class="wp-block-tab-panel">
				<!-- wp:search {"label":"<?php echo esc_attr( sprintf( /* translators: %s: tab name such as Places. */ __( 'Search %s', 'keel' ), $keel_tab[0] ) ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr( $keel_tab[1] ); ?>","buttonText":"<?php esc_attr_e( 'Search', 'keel' ); ?>","buttonPosition":"button-inside"} /-->

				<!-- wp:group {"className":"keel-filter-chips","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group keel-filter-chips">
					<?php foreach ( $keel_chips as $keel_i => $keel_chip ) : ?>
					<!-- wp:paragraph {"className":"keel-chip<?php echo 0 === $keel_i ? ' is-active' : ''; ?>"} -->
					<p class="keel-chip<?php echo 0 === $keel_i ? ' is-active' : ''; ?>"><a href="#filter"><?php echo esc_html( $keel_chip ); ?></a></p>
					<!-- /wp:paragraph -->
					<?php endforeach; ?>
				</div>
				<!-- /wp:group -->
			</section>
			<!-- /wp:tab-panel -->
			<?php endforeach; ?>
		</div>
		<!-- /wp:tab-panels -->
	</div>
	<!-- /wp:tabs -->
</div>
<!-- /wp:group -->
