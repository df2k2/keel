<?php
/**
 * Title: Showcase: why Keel
 * Slug: keel-demo/showcase-why
 * Description: The plain-language case: budgets, gates, signing, CSP readiness and what the companion plugin adds.
 * Inserter: no
 *
 * @package KeelDemo
 */

defined( 'ABSPATH' ) || exit;

$keel_demo_sections = array(
	array(
		__( 'Budgets, enforced', 'keel-demo' ),
		__( 'The whole theme\'s CSS stays under 35 KB compressed and each per-block stylesheet under 4 KB; the build fails otherwise. Lighthouse runs on every pull request against a seeded site: Largest Contentful Paint under two seconds, layout shift under 0.05, blocking time under 150 ms, accessibility score 100.', 'keel-demo' ),
	),
	array(
		__( 'Gates, not promises', 'keel-demo' ),
		__( 'Twelve checks protect the main branch: unit tests, WordPress integration tests, browser tests with axe on every template, Lighthouse, Theme Check, PHPStan at level 6, WordPress coding standards, a scan for forbidden constructs, translation completeness, licence and dependency audits. A change that breaks one does not merge.', 'keel-demo' ),
	),
	array(
		__( 'Signed releases', 'keel-demo' ),
		__( 'Releases are built in CI from a tag, never from a laptop. Each one ships the zip, a manifest of every file\'s hash, the software bill of materials and the signatures; the README shows the one command that verifies them before you upload.', 'keel-demo' ),
	),
	array(
		__( 'Ready for a Content Security Policy', 'keel-demo' ),
		__( 'No inline event handlers, no third-party scripts or fonts, no remote requests at all. Scripts are modules registered through core, loaded only where a block needs them. A strict policy can be applied without the theme getting in the way.', 'keel-demo' ),
	),
	array(
		__( 'What the companion plugin adds', 'keel-demo' ),
		__( 'The theme stays a theme. Security headers, login hardening, form handling and the operational pieces a small business site needs are planned for a separate companion plugin, so each piece can be audited, updated and replaced on its own.', 'keel-demo' ),
	),
);
$keel_demo_links    = array(
	array( __( 'Source code and issues', 'keel-demo' ), 'https://github.com/df2k2/keel' ),
	array( __( 'Latest release: zip, manifest, SBOM and signatures', 'keel-demo' ), 'https://github.com/df2k2/keel/releases/latest' ),
	array( __( 'Continuous integration runs, with the axe and Lighthouse results', 'keel-demo' ), 'https://github.com/df2k2/keel/actions' ),
	array( __( 'Changelog', 'keel-demo' ), 'https://github.com/df2k2/keel/blob/main/CHANGELOG.md' ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead"><?php esc_html_e( 'Most small-business sites are compromised through what was bolted on: the page builder, the slider, the fonts from another domain, the plugin nobody updated. Keel removes those surfaces instead of patching them.', 'keel-demo' ); ?></p>
	<!-- /wp:paragraph -->
	<?php foreach ( $keel_demo_sections as $keel_demo_section ) : ?>
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php echo esc_html( $keel_demo_section[0] ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php echo esc_html( $keel_demo_section[1] ); ?></p>
	<!-- /wp:paragraph -->
	<?php endforeach; ?>

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'See for yourself', 'keel-demo' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:list -->
	<ul class="wp-block-list">
		<?php foreach ( $keel_demo_links as $keel_demo_link ) : ?>
		<!-- wp:list-item -->
		<li><a href="<?php echo esc_url( $keel_demo_link[1] ); ?>"><?php echo esc_html( $keel_demo_link[0] ); ?></a></li>
		<!-- /wp:list-item -->
		<?php endforeach; ?>
	</ul>
	<!-- /wp:list -->
</div>
<!-- /wp:group -->
