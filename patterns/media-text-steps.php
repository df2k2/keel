<?php
/**
 * Title: Media and text steps
 * Slug: keel/media-text-steps
 * Categories: keel/process
 * Keywords: steps, media, text, alternating
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Keel
 */

defined( 'ABSPATH' ) || exit;

$keel_image = get_theme_file_uri( 'assets/images/placeholder-square.svg' );
$keel_steps = array(
	array( __( 'Step one: we listen', 'keel' ), __( 'Tell us what is going on and what you want to happen. We ask the questions that matter and nothing more.', 'keel' ) ),
	array( __( 'Step two: a clear plan', 'keel' ), __( 'You get the options with prices, and our honest recommendation on which to choose.', 'keel' ) ),
	array( __( 'Step three: the work, done right', 'keel' ), __( 'We arrive when we said we would, finish on the day and check in a week later.', 'keel' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'How a visit goes', 'keel' ); ?></h2>
	<!-- /wp:heading -->
	<?php foreach ( $keel_steps as $keel_index => $keel_step ) : ?>
		<?php if ( 1 === $keel_index % 2 ) : ?>
	<!-- wp:media-text {"align":"wide","mediaPosition":"right","mediaType":"image","mediaWidth":40} -->
	<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile" style="grid-template-columns:auto 40%"><div class="wp-block-media-text__content">
		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php echo esc_html( $keel_step[0] ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php echo esc_html( $keel_step[1] ); ?></p>
		<!-- /wp:paragraph -->
	</div><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( $keel_image ); ?>" alt=""/></figure></div>
	<!-- /wp:media-text -->
		<?php else : ?>
	<!-- wp:media-text {"align":"wide","mediaType":"image","mediaWidth":40} -->
	<div class="wp-block-media-text alignwide is-stacked-on-mobile" style="grid-template-columns:40% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( $keel_image ); ?>" alt=""/></figure><div class="wp-block-media-text__content">
		<!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php echo esc_html( $keel_step[0] ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php echo esc_html( $keel_step[1] ); ?></p>
		<!-- /wp:paragraph -->
	</div></div>
	<!-- /wp:media-text -->
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<!-- /wp:group -->
