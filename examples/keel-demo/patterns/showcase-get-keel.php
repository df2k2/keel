<?php
/**
 * Title: Showcase: get Keel
 * Slug: keel-demo/showcase-get-keel
 * Description: Download, verify, install, extend.
 * Inserter: no
 *
 * @package KeelDemo
 */

defined( 'ABSPATH' ) || exit;

$keel_demo_facts = Keel_Demo\facts();
$keel_demo_steps = array(
	array( __( 'Download', 'keel-demo' ), __( 'Get the release zip from GitHub. Releases are built in CI from a tag; the page lists every asset.', 'keel-demo' ), $keel_demo_facts['release_url'], __( 'Latest release', 'keel-demo' ) ),
	array( __( 'Verify', 'keel-demo' ), __( 'Check the zip against the manifest and signatures with the command in the README before you upload it anywhere.', 'keel-demo' ), 'https://github.com/df2k2/keel#readme', __( 'Verification steps', 'keel-demo' ) ),
	array( __( 'Install', 'keel-demo' ), __( 'Appearance, Themes, Add New, Upload Theme. Keel needs WordPress 7.1.3 and PHP 8.3 or newer, and nothing else.', 'keel-demo' ), '', '' ),
	array( __( 'Extend', 'keel-demo' ), __( 'Keep your changes in a child theme: the repository ships a minimal one that overrides a single colour.', 'keel-demo' ), 'https://github.com/df2k2/keel/tree/main/examples/keel-child', __( 'Child theme example', 'keel-demo' ) ),
	array( __( 'Follow', 'keel-demo' ), __( 'Every change is in the changelog with its version. Updates come as new signed releases.', 'keel-demo' ), 'https://github.com/df2k2/keel/blob/main/CHANGELOG.md', __( 'Changelog', 'keel-demo' ) ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"48rem"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"className":"is-style-lead"} -->
	<p class="is-style-lead">
	<?php
	/* translators: %s: theme version. */
	echo esc_html( sprintf( __( 'Keel %s is free software under the GPL. Five steps from download to a site you can trust.', 'keel-demo' ), $keel_demo_facts['version'] ) );
	?>
	</p>
	<!-- /wp:paragraph -->
	<?php foreach ( $keel_demo_steps as $keel_demo_index => $keel_demo_step ) : ?>
	<!-- wp:group {"className":"is-style-bordered","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-bordered">
		<!-- wp:heading {"level":2,"fontSize":"lg"} -->
		<h2 class="wp-block-heading has-lg-font-size"><?php echo esc_html( ( $keel_demo_index + 1 ) . '. ' . $keel_demo_step[0] ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php echo esc_html( $keel_demo_step[1] ); ?></p>
		<!-- /wp:paragraph -->
		<?php if ( '' !== $keel_demo_step[2] ) : ?>

		<!-- wp:paragraph -->
		<p><a href="<?php echo esc_url( $keel_demo_step[2] ); ?>"><?php echo esc_html( $keel_demo_step[3] ); ?></a></p>
		<!-- /wp:paragraph -->
		<?php endif; ?>
	</div>
	<!-- /wp:group -->
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
