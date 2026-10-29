<?php
/**
 * Title: Style guide: icons
 * Slug: keel/styleguide-icons
 * Categories: keel/pages
 * Keywords: style guide, icons, svg, images
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_icons = array( 'calendar', 'check', 'chevron-left', 'chevron-right', 'clock', 'close', 'map-pin', 'message', 'phone', 'play', 'shield', 'star' );
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"icons"} -->
	<h2 class="wp-block-heading" id="icons"><?php esc_html_e( 'Icons', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Twelve single-colour SVG files in the theme, placed as Image blocks with the keel-icon class so they invert on dark bands. Decorative: every one has an empty alt.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"8rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $keel_icons as $keel_icon ) : ?>
		<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"32px","height":"32px","sizeSlug":"full","className":"keel-icon"} -->
			<figure class="wp-block-image size-full is-resized keel-icon"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/' . $keel_icon . '.svg' ) ); ?>" alt="" style="width:32px;height:32px"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"fontSize":"sm"} -->
			<p class="has-sm-font-size"><code><?php echo esc_html( $keel_icon ); ?></code></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
