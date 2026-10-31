<?php
/**
 * Title: Elements: journal, team and reviews
 * Slug: keel/elements-people
 * Categories: keel/pages
 * Keywords: elements, journal, posts, team, profiles, reviews
 * Viewport Width: 1200
 * Inserter: no
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"anchor":"people"} -->
	<h2 class="wp-block-heading" id="people"><?php esc_html_e( 'Journal, team and reviews', 'keel' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Cards for posts and people: the journal card reads the post, the feature article takes the sticky post, profile and review cards are static.', 'keel' ); ?></p>
	<!-- /wp:paragraph -->

	<?php echo Keel\Theme\element_label( 'keel/journal-card' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/journal-card"} /-->

	<?php echo Keel\Theme\element_label( 'keel/feature-article' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:pattern {"slug":"keel/feature-article"} /-->

	<?php echo Keel\Theme\element_label( 'keel/profile-card' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"24rem","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"keel/profile-card"} /-->
	</div>
	<!-- /wp:group -->

	<?php echo Keel\Theme\element_label( 'keel/review-card' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup built from an escaped string. ?>

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"24rem","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:pattern {"slug":"keel/review-card"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
