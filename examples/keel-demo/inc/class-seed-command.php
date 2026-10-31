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
	private const CATEGORIES = array( 'hero', 'trust', 'services', 'process', 'team', 'testimonials', 'pricing', 'faq', 'location', 'gallery', 'cta', 'contact', 'footer', 'blog', 'pages', 'layouts', 'dental', 'cards', 'elements', 'places', 'events', 'company', 'utility' );

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
		$pages     = array();
		$thumbnail = $this->placeholder_id();

		foreach ( array( 'style-guide', 'block-styles' ) as $retired ) {
			$old = get_page_by_path( $retired );
			if ( $old instanceof \WP_Post ) {
				wp_delete_post( $old->ID, true );
				\WP_CLI::line( sprintf( '  removed /%s/', $retired ) );
			}
		}

		$pages['home']       = $this->page( 'showcase', 'Keel', $this->refs( array( 'keel-demo/showcase-hero', 'keel-demo/showcase-variations', 'keel-demo/showcase-facts', 'keel-demo/showcase-demos' ) ), 'page-no-title' );
		$pages['variations'] = $this->page( 'variations', 'Variations', $this->refs( array( 'keel-demo/showcase-variations' ) ) );
		$pages['patterns']   = $this->page( 'patterns', 'Patterns', $this->patterns_index() );
		$category_pages      = array();
		foreach ( self::CATEGORIES as $category ) {
			$category_pages[ $category ] = $this->page( $category, $this->category_title( $category ), $this->category_content( $category ), '', '', $pages['patterns'] );
		}
		$pages['templates'] = $this->page( 'templates', 'Templates', $this->refs( array( 'keel-demo/showcase-templates' ) ) );
		$pages['elements']  = $this->page( 'elements', 'Elements', $this->refs( array( 'keel/elements' ) ) . "\n\n" . $this->kitchen_sink(), 'page-no-title' );
		$pages['why-keel']  = $this->page( 'why-keel', 'Why Keel', $this->refs( array( 'keel-demo/showcase-why', 'keel-demo/showcase-facts' ) ) );
		$pages['get-keel']  = $this->page( 'get-keel', 'Get Keel', $this->refs( array( 'keel-demo/showcase-get-keel' ) ) );

		$set_pages = $this->page_sets( $thumbnail );
		$this->journal_posts( $thumbnail );

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

		$this->menu( $pages, $category_pages, $set_pages, $dental, $dental_pages );

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
				'Seeded %d showcase pages, %d pattern category pages, %d page-set pages, twelve journal posts and %d dental pages; the front page is %d.',
				count( $pages ),
				count( $category_pages ),
				count( $set_pages ),
				count( $dental_pages ) + 1,
				$pages['home']
			)
		);
	}

	/**
	 * The placeholder attachment the theme seed imported, for thumbnails.
	 *
	 * @return int Attachment ID, or 0 when none.
	 */
	private function placeholder_id(): int {
		$attachment = get_page_by_path( 'keel-placeholder', OBJECT, 'attachment' );
		return $attachment instanceof \WP_Post ? $attachment->ID : 0;
	}

	/**
	 * The registered content of a theme pattern, with optional literal replacements.
	 *
	 * @param string                $slug         Full pattern slug.
	 * @param array<string, string> $replacements Search => replace pairs applied to the markup.
	 * @return string Block markup.
	 */
	private function pattern_content( string $slug, array $replacements = array() ): string {
		$pattern = \WP_Block_Patterns_Registry::get_instance()->get_registered( $slug );
		$content = is_array( $pattern ) ? (string) ( $pattern['content'] ?? '' ) : '';
		if ( '' === $content ) {
			\WP_CLI::error( "Pattern {$slug} is not registered." );
		}
		return strtr( $content, $replacements );
	}

	/**
	 * Builds the page-set pages: journal, places, listings, events, deals, the company pages and the utility pages.
	 *
	 * @param int $thumbnail Placeholder attachment ID.
	 * @return array<string, int> Page IDs by slug, top-level pages only.
	 */
	private function page_sets( int $thumbnail ): array {
		$ids = array();

		$ids['journal'] = $this->page( 'journal', 'Journal', $this->refs( array( 'keel/page-journal' ) ), 'page-no-title', 'Stories from the water, the markets and the quiet lanes.' );

		$ids['places'] = $this->page( 'places', 'Places', $this->refs( array( 'keel/page-places' ) ), 'page-no-title', 'Six places, one coast.' );
		$places        = array(
			array( 'harbor-district', 'Harbor district', 'Working docks, the Saturday market and the best sunset bench in the county.' ),
			array( 'north-beach', 'North beach', 'The long quiet beach, the lighthouse and the dunes.' ),
			array( 'river-bend', 'River bend', 'Kayaks, herons and the slow brown river.' ),
		);
		foreach ( $places as $place ) {
			$this->thumbnail( $this->page( $place[0], $place[1], $this->refs( array( 'keel/page-place' ) ), 'page-no-title', $place[2], $ids['places'] ), $thumbnail );
		}

		$ids['listings'] = $this->page( 'listings', 'Listings', '', 'page-no-title', 'Where to eat, stay and play.' );
		$this->page( 'listings', 'Listings', $this->pattern_content( 'keel/page-listings', array( '"parents":[]' => '"parents":[' . $ids['listings'] . ']' ) ), 'page-no-title', 'Where to eat, stay and play.' );
		$listings = array(
			array( 'harbor-view-inn', 'Harbor View Inn', 'Twelve rooms over the water, breakfast on the deck and bikes at the door.' ),
			array( 'the-boathouse-kitchen', 'The Boathouse Kitchen', 'Fish from the morning boats and a short menu that changes with the catch.' ),
			array( 'reef-and-river-charters', 'Reef and River Charters', 'Half-day and full-day charters with a captain who knows every sandbar.' ),
			array( 'old-town-bike-hire', 'Old Town Bike Hire', 'Comfortable cruisers, child seats and a map of the quiet lanes.' ),
			array( 'sandbar-paddle-tours', 'Sandbar Paddle Tours', 'Sunrise paddles on glassy water before the wind picks up.' ),
			array( 'the-lantern-bookshop', 'The Lantern Bookshop', 'Maps, tide tables, local history and a cat on the counter.' ),
		);
		foreach ( $listings as $listing ) {
			$this->thumbnail( $this->page( $listing[0], $listing[1], $this->refs( array( 'keel/page-listing' ) ), 'page-no-title', $listing[2], $ids['listings'] ), $thumbnail );
		}

		$ids['events'] = $this->page( 'events', 'Events', $this->refs( array( 'keel/page-events' ) ), 'page-no-title', 'Markets, regattas, walks and music, by month.' );
		$this->page( 'harbor-night-market', 'Harbor night market', $this->refs( array( 'keel/page-event' ) ), 'page-no-title', 'Forty stalls, two bands and the lanterns at dusk.', $ids['events'] );
		$ids['deals'] = $this->page( 'deals', 'Deals', $this->refs( array( 'keel/page-deals' ) ), 'page-no-title', 'Offers from the businesses in the guide.' );

		$company = array(
			array( 'about', 'About', 'keel/page-about-story' ),
			array( 'team', 'Team', 'keel/page-team' ),
			array( 'careers', 'Careers', 'keel/page-careers' ),
			array( 'press', 'Press', 'keel/page-press' ),
			array( 'contact-map', 'Contact map', 'keel/page-contact-map' ),
			array( 'visitor-info', 'Visitor info', 'keel/page-visitor-info' ),
			array( 'coming-soon', 'Coming soon', 'keel/page-coming-soon' ),
			array( 'maintenance', 'Maintenance', 'keel/page-maintenance' ),
			array( 'thank-you', 'Thank you', 'keel/page-thank-you' ),
			array( 'legal', 'Legal', 'keel/page-legal' ),
		);
		foreach ( $company as $entry ) {
			$ids[ $entry[0] ] = $this->page( $entry[0], $entry[1], $this->refs( array( $entry[2] ) ), 'page-no-title' );
		}
		$ids['one-page'] = $this->page( 'one-page', 'One page', $this->refs( array( 'keel/page-one-page' ) ), 'page-landing' );

		return $ids;
	}

	/**
	 * Twelve journal posts across the post formats and the three post templates; one is sticky, one has no image.
	 *
	 * @param int $thumbnail Placeholder attachment ID.
	 * @return void
	 */
	private function journal_posts( int $thumbnail ): void {
		$term = term_exists( 'journal', 'category' );
		if ( ! is_array( $term ) ) {
			$term = wp_insert_term( 'Journal', 'category', array( 'slug' => 'journal' ) );
		}
		$category = is_array( $term ) ? (int) $term['term_id'] : 0;
		$posts    = array(
			array( 'a-day-on-the-water', 'A day on the water', 'standard', 'single-cover', true, true, 'From the first cast at dawn to the last swim at the sandbar: one long day on the inlet, hour by hour.' ),
			array( 'what-the-tide-tables-say', 'What the tide tables say', 'standard', 'single-sidebar', true, false, 'Reading the tables is easy once someone shows you. Here is the ten-minute version, and why it matters for the beaches.' ),
			array( 'the-quiet-season', 'The quiet season', 'standard', 'single-cover', false, false, 'September is empty, warm and cheap. A case for the month nobody books.' ),
			array( 'packing-light-for-a-long-weekend', 'Packing light for a long weekend', 'standard', '', true, false, 'Three days, one bag, no regrets. The list we hand to friends.' ),
			array( 'one-line-from-the-harbourmaster', 'One line from the harbourmaster', 'quote', 'single-minimal', true, false, 'If the pelicans are sitting on the pilings, you should be too.' ),
			array( 'the-view-from-the-jetty', 'The view from the jetty', 'image', '', true, false, 'Last light on the pier, the week the mullet ran.' ),
			array( 'six-frames-from-the-market', 'Six frames from the market', 'gallery', 'single-cover', true, false, 'Bread, fish, fiddles and one very patient dog: the Saturday market in six pictures.' ),
			array( 'how-the-bridge-opens', 'How the bridge opens', 'video', 'single-sidebar', true, false, 'Ninety seconds of the drawbridge doing its thing, with the tender explaining the schedule.' ),
			array( 'worth-reading-the-county-trail-map', 'Worth reading: the county trail map', 'link', '', true, false, 'The county finally published a map of the inland trails. It is better than ours.' ),
			array( 'small-note-on-parking', 'Small note on parking', 'aside', 'single-minimal', true, false, 'The lot on Flagler Street is free after 6 pm. That is the whole note.' ),
			array( 'what-locals-order', 'What locals order', 'quote', '', true, false, 'Whatever came off the boat this morning, and the fries.' ),
			array( 'walking-the-old-rail-line', 'Walking the old rail line', 'gallery', 'single-sidebar', true, false, 'Four miles of flat shade from the depot to the river, in pictures.' ),
		);
		foreach ( $posts as $index => $post ) {
			$existing = get_page_by_path( $post[0], OBJECT, 'post' );
			$data     = array(
				'post_type'     => 'post',
				'post_status'   => 'publish',
				'post_title'    => $post[1],
				'post_name'     => $post[0],
				'post_excerpt'  => $post[6],
				'post_content'  => '<!-- wp:paragraph --><p>' . esc_html( $post[6] ) . '</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Every post in the journal is written by someone who lives here, checked against a tide table and a map, and updated when a place changes hands. If something is wrong, tell us and we fix it the same week.</p><!-- /wp:paragraph -->',
				'post_date'     => gmdate( 'Y-m-d H:i:s', time() - ( $index * DAY_IN_SECONDS ) ),
				'post_category' => $category > 0 ? array( $category ) : array(),
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
			set_post_format( $id, 'standard' === $post[2] ? false : $post[2] );
			if ( '' !== $post[3] ) {
				update_post_meta( $id, '_wp_page_template', $post[3] );
			} else {
				delete_post_meta( $id, '_wp_page_template' );
			}
			if ( $post[4] ) {
				$this->thumbnail( $id, $thumbnail );
			} else {
				delete_post_thumbnail( $id );
			}
			if ( $post[5] ) {
				stick_post( $id );
			} else {
				unstick_post( $id );
			}
		}
	}

	/**
	 * Sets the placeholder as the featured image when one exists.
	 *
	 * @param int $post_id   Post or page ID.
	 * @param int $thumbnail Attachment ID.
	 * @return void
	 */
	private function thumbnail( int $post_id, int $thumbnail ): void {
		if ( $thumbnail > 0 ) {
			set_post_thumbnail( $post_id, $thumbnail );
		}
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
		$heading = '<!-- wp:heading {"anchor":"core-blocks"} --><h2 class="wp-block-heading" id="core-blocks">Every core block</h2><!-- /wp:heading -->';
		return $heading . "\n\n" . str_replace( '{{KEEL}}', get_stylesheet_directory_uri(), $fixture );
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
	 * Writes the Primary menu: Demos, Patterns, Templates, Elements, Pages, Why Keel, Blog, Get Keel.
	 *
	 * @param array<string, int> $pages          Showcase page IDs by key.
	 * @param array<string, int> $category_pages Category page IDs by slug.
	 * @param array<string, int> $set_pages      Page-set page IDs by slug.
	 * @param int                $dental         Dental home ID.
	 * @param array<string, int> $dental_pages   Dental child page IDs by slug.
	 * @return void
	 */
	private function menu( array $pages, array $category_pages, array $set_pages, int $dental, array $dental_pages ): void {
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
		$set_links = '';
		foreach ( $set_pages as $id ) {
			$set_links .= $this->link( (string) get_the_title( $id ), $id );
		}
		$content = $this->submenu( 'Demos', $dental, $dental_links )
			. $this->submenu( 'Patterns', $pages['patterns'], $category_links )
			. $this->link( 'Templates', $pages['templates'] )
			. $this->link( 'Elements', $pages['elements'] )
			. $this->submenu( 'Pages', $set_pages['journal'], $set_links )
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
