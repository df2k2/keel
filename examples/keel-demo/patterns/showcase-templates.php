<?php
/**
 * Title: Showcase: templates
 * Slug: keel-demo/showcase-templates
 * Description: Every template and template part in the theme, with a live example where one exists.
 * Inserter: no
 *
 * @package KeelDemo
 */

defined( 'ABSPATH' ) || exit;

$keel_demo_templates = array(
	array( 'front-page', __( 'The front page: announcement bar, transparent header, content, footer and the mobile bar.', 'keel-demo' ), '/' ),
	array( 'home', __( 'The posts page: the blog list.', 'keel-demo' ), '/blog/' ),
	array( 'index', __( 'The fallback for anything without a closer template.', 'keel-demo' ), '' ),
	array( 'single', __( 'A post: title band, post meta, content, the author box, comments.', 'keel-demo' ), '/spring-maintenance-checklist/' ),
	array( 'page', __( 'A page with its title as the heading.', 'keel-demo' ), '/templates/' ),
	array( 'page-no-title', __( 'Page without title: the content supplies the heading; the header turns transparent over a cover.', 'keel-demo' ), '/contact/' ),
	array( 'page-landing', __( 'Landing page: no header, minimal footer, zero JavaScript.', 'keel-demo' ), '/landing/' ),
	array( 'page-service', __( 'Service page: title, content and the call-to-action band.', 'keel-demo' ), '/service/' ),
	array( 'page-location', __( 'Location page: title band, content and the call-to-action band.', 'keel-demo' ), '/location/' ),
	array( 'archive', __( 'Category, tag, date and author archives.', 'keel-demo' ), '/category/news/' ),
	array( 'search', __( 'Search results as a grid, with the no-results pattern.', 'keel-demo' ), '/?s=quote' ),
	array( '404', __( 'Not found: a message, a search form and the way home.', 'keel-demo' ), '/this-page-does-not-exist/' ),
	array( 'attachment', __( 'A media attachment page.', 'keel-demo' ), '' ),
);
$keel_demo_parts     = array(
	array( 'header', __( 'Logo, site title and the primary navigation.', 'keel-demo' ) ),
	array( 'header-centered', __( 'Stacked logo and navigation, centred.', 'keel-demo' ) ),
	array( 'header-transparent', __( 'Transparent over a leading cover, solid once scrolled.', 'keel-demo' ) ),
	array( 'header-utility', __( 'The standard header with the utility bar (hours, address, phone) above it.', 'keel-demo' ) ),
	array( 'footer', __( 'Footer columns and the copyright line.', 'keel-demo' ) ),
	array( 'footer-minimal', __( 'A single-line footer for landing pages.', 'keel-demo' ) ),
	array( 'cta-band', __( 'The call-to-action band used by the service and location templates.', 'keel-demo' ) ),
	array( 'mobile-cta-bar', __( 'Call, text, book and directions, fixed to the bottom on phones.', 'keel-demo' ) ),
	array( 'announcement-bar', __( 'A dismissible announcement, remembered for the session.', 'keel-demo' ) ),
	array( 'post-meta', __( 'Date, author and categories for posts.', 'keel-demo' ) ),
	array( 'comments', __( 'The comments list and form.', 'keel-demo' ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'Thirteen templates and eleven template parts, all editable in the Site Editor. Each row links to a live example on this site where one exists.', 'keel-demo' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Templates', 'keel-demo' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:table {"className":"is-style-striped"} -->
	<figure class="wp-block-table is-style-striped"><table><thead><tr><th><?php esc_html_e( 'Template', 'keel-demo' ); ?></th><th><?php esc_html_e( 'What it does', 'keel-demo' ); ?></th><th><?php esc_html_e( 'Example', 'keel-demo' ); ?></th></tr></thead><tbody>
	<?php foreach ( $keel_demo_templates as $keel_demo_template ) : ?>
	<tr><td><code><?php echo esc_html( $keel_demo_template[0] ); ?></code></td><td><?php echo esc_html( $keel_demo_template[1] ); ?></td><td><?php echo '' !== $keel_demo_template[2] ? '<a href="' . esc_url( home_url( $keel_demo_template[2] ) ) . '">' . esc_html__( 'View', 'keel-demo' ) . '</a>' : esc_html__( 'Fallback', 'keel-demo' ); ?></td></tr>
	<?php endforeach; ?>
	</tbody></table></figure>
	<!-- /wp:table -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Template parts', 'keel-demo' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:table {"className":"is-style-striped"} -->
	<figure class="wp-block-table is-style-striped"><table><thead><tr><th><?php esc_html_e( 'Part', 'keel-demo' ); ?></th><th><?php esc_html_e( 'What it does', 'keel-demo' ); ?></th></tr></thead><tbody>
	<?php foreach ( $keel_demo_parts as $keel_demo_part ) : ?>
	<tr><td><code><?php echo esc_html( $keel_demo_part[0] ); ?></code></td><td><?php echo esc_html( $keel_demo_part[1] ); ?></td></tr>
	<?php endforeach; ?>
	</tbody></table></figure>
	<!-- /wp:table -->
</div>
<!-- /wp:group -->
