<?php
/**
 * WP-CLI: wp keel-demo seed builds the showcase and dental pages, the menu and the front page.
 *
 * @package KeelDemo
 */

namespace Keel_Demo;

defined( 'ABSPATH' ) || exit;

/**
 * Seeds the showcase site from the registered patterns. Idempotent by page slug.
 */
class Seed_Command {

	/**
	 * Category slugs of the theme's pattern categories (without the keel/ prefix) in menu order.
	 *
	 * @var string[]
	 */
	private const CATEGORIES = array( 'hero', 'trust', 'services', 'process', 'team', 'testimonials', 'pricing', 'faq', 'location', 'gallery', 'cta', 'contact', 'footer', 'blog', 'pages', 'layouts', 'dental' );

	/**
	 * Builds every showcase page, the dental pages, the Primary menu and the front page.
	 *
	 * ## EXAMPLES
	 *
	 *     wp keel-demo seed
	 *
	 * @param string[]              $args       Positional arguments (unused).
	 * @param array<string, string> $assoc_args Named arguments (unused).
	 * @return void
	 */
	public function seed( array $args = array(), array $assoc_args = array() ): void { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter -- WP-CLI signature.
		$pages = array();

		$pages['home']       = $this->page( 'showcase', 'Keel', $this->refs( array( 'keel-demo/showcase-hero', 'keel-demo/showcase-variations', 'keel-demo/showcase-facts', 'keel-demo/showcase-demos' ) ), 'page-no-title' );
		$pages['variations'] = $this->page( 'variations', 'Variations', $this->refs( array( 'keel-demo/showcase-variations' ) ) );
		$pages['patterns']   = $this->page( 'patterns', 'Patterns', $this->patterns_index() );
		$category_pages      = array();
		foreach ( self::CATEGORIES as $category ) {
			$category_pages[ $category ] = $this->page( $category, $this->category_title( $category ), $this->category_content( $category ), '', '', $pages['patterns'] );
		}
		$pages['templates']    = $this->page( 'templates', 'Templates', $this->refs( array( 'keel-demo/showcase-templates' ) ) );
		$pages['block-styles'] = $this->page( 'block-styles', 'Block styles', $this->kitchen_sink() );
		$pages['style-guide']  = $this->page( 'style-guide', 'Style guide', $this->refs( array( 'keel/styleguide' ) ), 'page-no-title' );
		$pages['why-keel']     = $this->page( 'why-keel', 'Why Keel', $this->refs( array( 'keel-demo/showcase-why', 'keel-demo/showcase-facts' ) ) );
		$pages['get-keel']     = $this->page( 'get-keel', 'Get Keel', $this->refs( array( 'keel-demo/showcase-get-keel' ) ) );

		$dental          = $this->page( 'dental', 'Bright Harbor Dental', $this->refs( array( 'keel/dental-home' ) ), 'page-no-title', 'A fictional dental practice built from the Keel dental pattern pack.' );
		$dental_children = array(
			array( 'services', 'Treatments', array( 'keel/dental-treatments', 'keel/dental-booking', 'keel/dental-disclaimer' ), 'page-service' ),
			array( 'whitening', 'Teeth whitening', array( 'keel/dental-service-whitening' ), 'page-no-title' ),
			array( 'implants', 'Dental implants', array( 'keel/dental-service-implants' ), 'page-no-title' ),
			array( 'dentists', 'Our dentists', array( 'keel/dental-dentists', 'keel/dental-booking', 'keel/dental-disclaimer' ), '' ),
			array( 'dr-sofia-ramirez', 'Dr. Sofia Ramirez', array( 'keel/dental-provider' ), 'page-no-title' ),
			array( 'pricing', 'Prices and plans', array( 'keel/dental-pricing' ), 'page-no-title' ),
			array( 'reviews', 'Patient stories', array( 'keel/dental-stories', 'keel/dental-booking', 'keel/dental-disclaimer' ), '' ),
			array( 'location', 'Location and hours', array( 'keel/hours-location', 'keel/gallery', 'keel/dental-urgent', 'keel/dental-disclaimer' ), 'page-location' ),
			array( 'contact', 'Contact', array( 'keel/dental-contact' ), 'page-no-title' ),
			array( 'implants-offer', 'Implants offer', array( 'keel/dental-landing-implants' ), 'page-landing' ),
			array( 'faq', 'Questions', array( 'keel/dental-faq', 'keel/dental-booking', 'keel/dental-disclaimer' ), '' ),
			array( 'about', 'About the practice', array( 'keel/dental-about' ), 'page-no-title' ),
		);
		$dental_pages    = array();
		foreach ( $dental_children as $child ) {
			$dental_pages[ $child[0] ] = $this->page( $child[0], $child[1], $this->refs( $child[2] ), $child[3], '', $dental );
		}

		$this->menu( $pages, $category_pages, $dental, $dental_pages );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $pages['home'] );
		$blog = get_page_by_path( 'blog' );
		if ( $blog instanceof \WP_Post ) {
			update_option( 'page_for_posts', $blog->ID );
		}
		update_option( 'blogname', 'Keel' );
		update_option( 'blogdescription', 'A security-first block theme for local service businesses' );

		\WP_CLI::success(
			sprintf(
				'Seeded %d showcase pages, %d pattern category pages and %d dental pages; the front page is %d.',
				count( $pages ),
				count( $category_pages ),
				count( $dental_pages ) + 1,
				$pages['home']
			)
		);
	}

	/**
	 * Block markup for a list of pattern references.
	 *
	 * @param string[] $slugs Full pattern slugs.
	 * @return string
	 */
	private function refs( array $slugs ): string {
		$blocks = array();
		foreach ( $slugs as $slug ) {
			$blocks[] = '<!-- wp:pattern {"slug":"' . $slug . '"} /-->';
		}
		return implode( "\n\n", $blocks );
	}

	/**
	 * Creates or updates a page and returns its ID.
	 *
	 * @param string $slug     Page slug.
	 * @param string $title    Page title.
	 * @param string $content  Block markup.
	 * @param string $template Custom template slug, or '' for the default.
	 * @param string $excerpt  Excerpt.
	 * @param int    $parent_id Parent page ID.
	 * @return int
	 */
	private function page( string $slug, string $title, string $content, string $template = '', string $excerpt = '', int $parent_id = 0 ): int {
		$path     = $parent_id > 0 ? get_page_uri( $parent_id ) . '/' . $slug : $slug;
		$existing = get_page_by_path( (string) $path );
		$data     = array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_content' => $content,
			'post_excerpt' => $excerpt,
			'post_parent'  => $parent_id,
		);
		if ( $existing instanceof \WP_Post ) {
			$data['ID'] = $existing->ID;
			$id         = wp_update_post( wp_slash( $data ), true );
		} else {
			$id = wp_insert_post( wp_slash( $data ), true );
		}
		if ( is_wp_error( $id ) ) {
			\WP_CLI::error( $id->get_error_message() );
		}
		if ( '' !== $template ) {
			update_post_meta( $id, '_wp_page_template', $template );
		} else {
			delete_post_meta( $id, '_wp_page_template' );
		}
		\WP_CLI::line( sprintf( '  %s (%d) %s', $path, $id, '' !== $template ? "[$template]" : '' ) );
		return $id;
	}

	/**
	 * The registered theme patterns in one category.
	 *
	 * @param string $category Category slug without the keel/ prefix.
	 * @return array<int, array<string, mixed>>
	 */
	private function patterns_in( string $category ): array {
		static $registered = null;
		if ( null === $registered ) {
			$registered = \WP_Block_Patterns_Registry::get_instance()->get_all_registered();
		}
		$found = array();
		foreach ( $registered as $pattern ) {
			if ( str_starts_with( (string) $pattern['name'], 'keel/' ) && in_array( 'keel/' . $category, $pattern['categories'] ?? array(), true ) ) {
				$found[] = $pattern;
			}
		}
		usort( $found, static fn( array $a, array $b ): int => strcmp( (string) $a['title'], (string) $b['title'] ) );
		return $found;
	}

	/**
	 * Human title of a category from its registration.
	 *
	 * @param string $category Category slug without the keel/ prefix.
	 * @return string
	 */
	private function category_title( string $category ): string {
		$registered = \WP_Block_Pattern_Categories_Registry::get_instance()->get_registered( 'keel/' . $category );
		$label      = is_array( $registered ) ? (string) ( $registered['label'] ?? $category ) : $category;
		return trim( (string) preg_replace( '/^Keel:\s*/', '', $label ) );
	}

	/**
	 * The Patterns index: every category with its count and a link to its page.
	 *
	 * @return string
	 */
	private function patterns_index(): string {
		$items = '';
		foreach ( self::CATEGORIES as $category ) {
			$count  = count( $this->patterns_in( $category ) );
			$items .= sprintf(
				'<!-- wp:list-item --><li><a href="%1$s">%2$s</a> (%3$d)</li><!-- /wp:list-item -->',
				esc_url( home_url( '/patterns/' . $category . '/' ) ),
				esc_html( $this->category_title( $category ) ),
				$count
			);
		}
		return '<!-- wp:paragraph {"className":"is-style-lead"} --><p class="is-style-lead">Every pattern in the theme, inserted live on its category page: what you see is what the editor inserts. Page layouts and the dental pack are whole pages.</p><!-- /wp:paragraph -->'
			. '<!-- wp:list {"className":"is-style-two-column"} --><ul class="wp-block-list is-style-two-column">' . $items . '</ul><!-- /wp:list -->';
	}

	/**
	 * A category page: each pattern preceded by its title and slug.
	 *
	 * @param string $category Category slug without the keel/ prefix.
	 * @return string
	 */
	private function category_content( string $category ): string {
		$blocks = array( '<!-- wp:paragraph --><p><a href="' . esc_url( home_url( '/patterns/' ) ) . '">All categories</a></p><!-- /wp:paragraph -->' );
		foreach ( $this->patterns_in( $category ) as $pattern ) {
			$blocks[] = sprintf(
				'<!-- wp:group {"align":"full","backgroundColor":"surface-alt","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} --><div class="wp-block-group alignfull has-surface-alt-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:heading {"level":2,"fontSize":"md"} --><h2 class="wp-block-heading has-md-font-size">%1$s <code>%2$s</code></h2><!-- /wp:heading --></div><!-- /wp:group -->',
				esc_html( (string) $pattern['title'] ),
				esc_html( (string) $pattern['name'] )
			);
			$blocks[] = '<!-- wp:pattern {"slug":"' . esc_attr( (string) $pattern['name'] ) . '"} /-->';
		}
		return implode( "\n\n", $blocks );
	}

	/**
	 * The kitchen sink fixture with the theme URL filled in.
	 *
	 * @return string
	 */
	private function kitchen_sink(): string {
		$fixture = file_get_contents( dirname( __DIR__ ) . '/fixtures/kitchen-sink.html' ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Local plugin file.
		if ( false === $fixture ) {
			\WP_CLI::error( 'fixtures/kitchen-sink.html is missing.' );
		}
		return str_replace( '{{KEEL}}', get_stylesheet_directory_uri(), $fixture );
	}

	/**
	 * A navigation-link block.
	 *
	 * @param string $label Link text.
	 * @param int    $id    Page ID.
	 * @return string
	 */
	private function link( string $label, int $id ): string {
		return sprintf(
			'<!-- wp:navigation-link {"label":"%1$s","type":"page","id":%2$d,"url":"%3$s","kind":"post-type"} /-->',
			esc_attr( $label ),
			$id,
			esc_url( (string) get_permalink( $id ) )
		);
	}

	/**
	 * A navigation-submenu block around links.
	 *
	 * @param string $label Parent label.
	 * @param int    $id    Parent page ID.
	 * @param string $inner Inner navigation-link blocks.
	 * @return string
	 */
	private function submenu( string $label, int $id, string $inner ): string {
		return sprintf(
			'<!-- wp:navigation-submenu {"label":"%1$s","type":"page","id":%2$d,"url":"%3$s","kind":"post-type"} -->%4$s<!-- /wp:navigation-submenu -->',
			esc_attr( $label ),
			$id,
			esc_url( (string) get_permalink( $id ) ),
			$inner
		);
	}

	/**
	 * Writes the Primary menu: Demos, Patterns, Templates, Style guide, Why Keel, Blog, Get Keel.
	 *
	 * @param array<string, int> $pages          Showcase page IDs by key.
	 * @param array<string, int> $category_pages Category page IDs by slug.
	 * @param int                $dental         Dental home ID.
	 * @param array<string, int> $dental_pages   Dental child page IDs by slug.
	 * @return void
	 */
	private function menu( array $pages, array $category_pages, int $dental, array $dental_pages ): void {
		$dental_links = $this->link( 'Dental home', $dental );
		foreach ( $dental_pages as $slug => $id ) {
			if ( in_array( $slug, array( 'services', 'dentists', 'pricing', 'reviews', 'location', 'contact', 'implants-offer' ), true ) ) {
				$dental_links .= $this->link( (string) get_the_title( $id ), $id );
			}
		}
		$category_links = '';
		foreach ( $category_pages as $slug => $id ) {
			$category_links .= $this->link( $this->category_title( $slug ), $id );
		}
		$content = $this->submenu( 'Demos', $dental, $dental_links )
			. $this->submenu( 'Patterns', $pages['patterns'], $category_links )
			. $this->link( 'Templates', $pages['templates'] )
			. $this->link( 'Style guide', $pages['style-guide'] )
			. $this->link( 'Why Keel', $pages['why-keel'] )
			. $this->link( 'Blog', (int) get_option( 'page_for_posts' ) )
			. $this->link( 'Get Keel', $pages['get-keel'] );

		$menu = get_page_by_path( 'primary', OBJECT, 'wp_navigation' );
		$data = array(
			'post_type'    => 'wp_navigation',
			'post_status'  => 'publish',
			'post_title'   => 'Primary',
			'post_name'    => 'primary',
			'post_content' => $content,
		);
		if ( $menu instanceof \WP_Post ) {
			$data['ID'] = $menu->ID;
			$result     = wp_update_post( wp_slash( $data ), true );
		} else {
			$result = wp_insert_post( wp_slash( $data ), true );
		}
		if ( is_wp_error( $result ) ) {
			\WP_CLI::error( $result->get_error_message() );
		}
	}
}
