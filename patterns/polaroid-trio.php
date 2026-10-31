<?php
/**
 * Title: Polaroid trio
 * Slug: keel/polaroid-trio
 * Categories: keel/cards
 * Keywords: polaroid, photos, captions, decoration
 * Viewport Width: 900
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image    = get_theme_file_uri( 'assets/images/placeholder-square.svg' );
$keel_captions = array( __( 'Low tide, October', 'keel' ), __( 'The Saturday market', 'keel' ), __( 'Last light on the pier', 'keel' ) );
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50","padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<?php foreach ( $keel_captions as $keel_caption ) : ?>
	<!-- wp:image {"lightbox":{"enabled":false},"width":"220px","sizeSlug":"full","className":"is-style-polaroid"} -->
	<figure class="wp-block-image size-full is-resized is-style-polaroid"><img src="<?php echo esc_url( $keel_image ); ?>" alt="" style="width:220px"/><figcaption class="wp-element-caption"><?php echo esc_html( $keel_caption ); ?></figcaption></figure>
	<!-- /wp:image -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
