<?php
/**
 * Speculative loading: prerender same-origin links on hover.
 *
 * @package Keel
 */

namespace Keel\Theme;

defined( 'ABSPATH' ) || exit;

/**
 * Switches core's speculation rules from prefetch to prerender with moderate eagerness.
 *
 * Core passes null for logged-in users and sites without pretty permalinks; that stays off.
 *
 * @param array<string, string>|null $config Mode and eagerness, or null when disabled.
 * @return array<string, string>|null The configuration.
 */
function speculation_rules_configuration( ?array $config ): ?array {
	if ( null === $config ) {
		return null;
	}
	return array(
		'mode'      => 'prerender',
		'eagerness' => 'moderate',
	);
}
add_filter( 'wp_speculation_rules_configuration', __NAMESPACE__ . '\\speculation_rules_configuration' );
