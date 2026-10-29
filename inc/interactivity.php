<?php
/**
 * Interactivity API stores: registration and the render filters that attach directives.
 *
 * @package Keel
 */

namespace Keel\Theme;

defined( 'ABSPATH' ) || exit;

const HEADER_PARTS = array( 'header', 'header-centered', 'header-transparent' );

/**
 * Registers the three script modules; each is enqueued only when its part or pattern renders.
 *
 * @return void
 */
function register_script_modules(): void {
	foreach ( array( 'header', 'announcement', 'carousel' ) as $name ) {
		wp_register_script_module(
			'keel-' . $name,
			get_theme_file_uri( 'build/js/' . $name . '.js' ),
			array( '@wordpress/interactivity' ),
			KEEL_VERSION
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\\register_script_modules' );

/**
 * Sets directives on the first tag of a block's output.
 *
 * @param string                $content    Block HTML.
 * @param array<string, string> $attributes Attribute name => value.
 * @param string[]              $classes    Class names to append to the tag's class attribute.
 * @return string Updated HTML, or the original when it has no tag.
 */
function add_directives( string $content, array $attributes, array $classes = array() ): string {
	$processor = new \WP_HTML_Tag_Processor( $content );
	if ( ! $processor->next_tag() ) {
		return $content;
	}
	foreach ( $attributes as $name => $value ) {
		$processor->set_attribute( $name, $value );
	}
	if ( array() !== $classes ) {
		$existing = $processor->get_attribute( 'class' );
		$processor->set_attribute( 'class', trim( ( is_string( $existing ) ? $existing . ' ' : '' ) . implode( ' ', $classes ) ) );
	}
	return $processor->get_updated_html();
}

/**
 * Attaches the header and announcement stores to their template parts.
 *
 * @param string               $content Rendered part.
 * @param array<string, mixed> $block   Parsed block.
 * @return string Rendered part with directives.
 */
function filter_template_part( string $content, array $block ): string {
	$slug = $block['attrs']['slug'] ?? '';
	if ( in_array( $slug, HEADER_PARTS, true ) ) {
		wp_enqueue_script_module( 'keel-header' );
		return wp_interactivity_process_directives(
			add_directives(
				$content,
				array(
					'data-wp-interactive'             => 'keel/header',
					'data-wp-context'                 => (string) wp_json_encode( array( 'scrolled' => false ) ),
					'data-wp-init'                    => 'callbacks.init',
					'data-wp-on-async-window--scroll' => 'callbacks.onScroll',
					'data-wp-class--is-scrolled'      => 'context.scrolled',
				),
				'header-transparent' === $slug ? array( 'keel-header', 'keel-header--transparent' ) : array( 'keel-header' )
			)
		);
	}
	if ( 'announcement-bar' === $slug ) {
		wp_enqueue_script_module( 'keel-announcement' );
		return wp_interactivity_process_directives(
			add_directives(
				$content,
				array(
					'data-wp-interactive'  => 'keel/announcement',
					'data-wp-context'      => (string) wp_json_encode(
						array(
							'id'        => substr( md5( $content ), 0, 8 ),
							'dismissed' => false,
						)
					),
					'data-wp-init'         => 'callbacks.restore',
					'data-wp-bind--hidden' => 'context.dismissed',
				)
			)
		);
	}
	return $content;
}
add_filter( 'render_block_core/template-part', __NAMESPACE__ . '\\filter_template_part', 10, 2 );

/**
 * Whether a parsed block carries a class name.
 *
 * @param array<string, mixed> $block Parsed block.
 * @param string               $class_name Class name to look for.
 * @return bool True when present.
 */
function block_has_class( array $block, string $class_name ): bool {
	$classes = $block['attrs']['className'] ?? '';
	if ( ! is_string( $classes ) ) {
		return false;
	}
	$names = preg_split( '/\s+/', $classes );
	return is_array( $names ) && in_array( $class_name, $names, true );
}

/**
 * Attaches the carousel store to a keel-carousel group.
 *
 * @param string               $content Rendered group.
 * @param array<string, mixed> $block   Parsed block.
 * @return string Rendered group with directives.
 */
function filter_carousel_group( string $content, array $block ): string {
	if ( ! block_has_class( $block, 'keel-carousel' ) ) {
		return $content;
	}
	wp_enqueue_script_module( 'keel-carousel' );
	return wp_interactivity_process_directives(
		add_directives(
			$content,
			array(
				'data-wp-interactive' => 'keel/carousel',
				'data-wp-context'     => (string) wp_json_encode( array( 'ready' => false ) ),
				'data-wp-init'        => 'callbacks.ready',
			)
		)
	);
}
add_filter( 'render_block_core/group', __NAMESPACE__ . '\\filter_carousel_group', 10, 2 );

/**
 * Hides the carousel controls until the store is ready, so they never show without JavaScript.
 *
 * @param string               $content Rendered buttons block.
 * @param array<string, mixed> $block   Parsed block.
 * @return string Rendered block with directives.
 */
function filter_carousel_controls( string $content, array $block ): string {
	if ( ! block_has_class( $block, 'keel-carousel__controls' ) ) {
		return $content;
	}
	return add_directives( $content, array( 'data-wp-bind--hidden' => '!context.ready' ) );
}
add_filter( 'render_block_core/buttons', __NAMESPACE__ . '\\filter_carousel_controls', 10, 2 );

/**
 * Wires the dismiss, previous and next buttons: click actions and accessible names.
 *
 * @param string               $content Rendered button block.
 * @param array<string, mixed> $block   Parsed block.
 * @return string Rendered block with directives on its button element.
 */
function filter_action_buttons( string $content, array $block ): string {
	$actions = array(
		'keel-announcement__dismiss' => array( 'actions.dismiss', __( 'Dismiss announcement', 'keel' ) ),
		'keel-carousel__prev'        => array( 'actions.prev', __( 'Previous testimonial', 'keel' ) ),
		'keel-carousel__next'        => array( 'actions.next', __( 'Next testimonial', 'keel' ) ),
	);
	foreach ( $actions as $class => $action ) {
		if ( ! block_has_class( $block, $class ) ) {
			continue;
		}
		$processor = new \WP_HTML_Tag_Processor( $content );
		if ( ! $processor->next_tag( array( 'tag_name' => 'button' ) ) ) {
			return $content;
		}
		$processor->set_attribute( 'data-wp-on--click', $action[0] );
		$processor->set_attribute( 'aria-label', $action[1] );
		return $processor->get_updated_html();
	}
	return $content;
}
add_filter( 'render_block_core/button', __NAMESPACE__ . '\\filter_action_buttons', 10, 2 );
