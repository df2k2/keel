# Changelog

All notable changes to Keel are recorded here. The format follows Keep a Changelog, and the project uses Semantic Versioning.

## Unreleased

## 1.0.1 (2026-11-16)

The fixes from the first theme directory review, and what testing for them turned up.

Review items. The `portfolio` tag is removed: the theme has no portfolio layout. The Feather icons
ship their full MIT license, with the copyright line, in `assets/icons/LICENSE-feather.txt`, and
`readme.txt` points to it. `inc/setup.php` declares `custom-logo` support, which every header part
already used through the Site Logo block. Every pattern output that was not wrapped in an escaping
function now is, and the accordion patterns write their open-by-default attribute as static markup
in place of an echoed variable. `readme.txt` gains a Development section with the build steps. The
release zip keeps `keel-manifest.json` and drops `assets/fonts/manifest.json`, which only the unit
tests read.

Right-to-left. The sources were written with logical properties, but the build rewrote every one
of them to its left-to-right twin (72 physical declarations in the built CSS and no logical ones),
so nothing mirrored on an RTL site. `postcss.config.js` now turns the logical features of
postcss-preset-env off, and a unit test fails if a physical declaration reaches `build/css`. The
`?keel_rtl=1` test switch set the direction on `init`, after core had built its style registry, so
the page carried `dir="rtl"` with the left-to-right core stylesheets; it now runs on
`after_setup_theme`. Core pins a Cover's content position and a constrained group's left
justification to the physical side, so Keel's own uses of them as "start" now mirror: card media,
tiles, the place hero, the cover post header (new class `keel-post-cover`) and the sample groups
(new class `keel-justify-start`). The end-to-end suite renders twenty pages at three widths in
RTL and checks eight start-edge components for an exact mirror image.

Accessibility. A Search block with the button inside showed no focus indicator, because core
removes the field's outline there; the wrapper now wears the ring. The link over a card's photo
had its ring clipped away by the photo's rounded box; the box wears it. Dismissing the
announcement bar dropped focus to the document; it moves to the next control. The floating call
and book buttons covered the footer's last link at the end of the page; the page reserves room
below the footer and scroll padding keeps a focused element above them. A journal card for a post
without a featured image clipped its category tag away while the link stayed focusable; the tag
now shows as a chip.

Other fixes. Two full-width buttons in a vertical stack sat side by side inside a Stack card and
pushed 20 pixels off a phone screen (the listing price card): core's `flex-basis: 100%` reads as a
height in a column. Seventy blocks in twenty-nine patterns and the single-cover template failed the
block editor's validation and showed the invalid-content warning: Cover blocks with an aspect
ratio or a 50 or 55 percent overlay, accordion items open by default, Media and Text blocks with
image fill, and the style guide's accordion sample. All 7,631 blocks now validate.

## 1.0.0 (2026-11-02)

First stable release, prepared for the wordpress.org theme directory. The release zip now carries
`src/` beside `build/`, so the unminified CSS and JavaScript ship with their minified twins as the
directory requires. The marquee group style gains a Pause and Play button, wired by a fourth
Interactivity store, `keel/marquee`, so moving content can be stopped without hovering
(WCAG 2.2.2); reduced motion still stops the animation in CSS and hides the button. New tags:
`style-variations`, `post-formats`, `blog` and `portfolio`. The theme screenshot is now the dental
practice home, built only from shipped patterns behind a short menu, in place of the showcase
landing page. Spanish strings for the new control. Keel stays the theme's name.

## 0.3.1 (2026-10-31)

Child theme support, learned from building the first site on Keel. The header actions are a
template part, `parts/header-actions.html`, which the sticky header pulls in, so a child changes the
buttons by overriding one small file instead of copying a header. A child's own `header` part can
stick or sit over a cover by setting `keel-header--sticky` or `keel-header--transparent` on its root
block, and `keel_header_part_classes` filters the classes from PHP. Font preloads follow the family
the headings use (`keel_preload_font_slugs` to override), so headings set in the serif no longer
download the display face. The author box and the comments part no longer use the Avatar block,
which fetched from Gravatar and broke the zero-third-party promise. The child theme example under
`examples/keel-child` shows all of it.

## 0.3.0 (2026-10-31)

Elements (M1.6). The type scale matched to a travel-theme reference: body 16 to 17 px, card
titles 18 to 20, h2 30 to 38, h1 40 to 56 and a new `display` size of 48 to 68 for hero titles;
headings at weight 600 with tight tracking, line heights 1.1, 1.35 and 1.65, buttons at 15 px,
navigation at the small size. A third font family, `serif` (Fraunces), in theme.json and every
variation; Coral and Palm set headings to 500 and Coral is the showcase default; the heading
`accent` style renders an emphasized phrase in the serif italic and the accent color; Fraunces
italic is now a static 400 instance. Cards are Stacks: every card in a row shares its height and
the footer sits on the bottom edge (`bin/migrate-cards.js` rewrote the 94 existing patterns), with
a photo-first anatomy (tag on the image, meta row, price footer) and the card family: listing, row,
tile, mini list, ticket, polaroid, stamp. Thirty-seven new block styles for 65 across 19 blocks:
button sizes, light, outline-light, glass, soft, link and icon buttons; group paper, dot grid,
marquee, four callouts, search panels, ticket and rail; media-text card; cover tile; image
polaroid; heading accent and ghost; paragraph eyebrow-rule and small print; list crosses;
separator route; navigation wide submenu and highlight; table scroll; tabs pills; gallery mosaic;
forms styled for any plugin. Ninety-one new patterns for 185 in 23 categories: the card family,
the element gains (utility bar with contact, button row, rating, price formats, search panel,
journal card and grid, feature article, profile and review cards, marquee band, filter chips,
itinerary, steps row, deal cards, callouts, departures and best-time tables, breadcrumb row,
facts bar, map card, big footer, floating call to action, the header actions, the 404 explore row
and the sidebar list), six page sets (journal, places and
listings, events and deals, company pages, utility pages) with nineteen page layouts in the
new-page chooser, and the elements page that replaces the style guide, naming every element.
Four templates (post: cover, with sidebar, minimal; author archive), three parts (sticky header,
big footer, floating call to action), post formats with the format label in the post meta and
format looks on journal cards, enhanced pagination on the query grids. Search forms are named
after their label. The demo seeds the page-set pages and twelve journal posts and retires the
style guide and block styles pages.

## 0.2.0 (2026-10-29)

Showcase (M1.5). Sixty-one new patterns for ninety-four in all: twenty-three generic sections
(booking hero, services with prices, category tiles, services in Tabs, logo band, features,
before and after, providers, payment plan, comparison table, offer card, newsletter and promo
bands, utility bar, timeline, Media and Text steps, author box, related posts, post navigation,
listing grid and list, event grid, FAQ on the Accordion block), seven starter page layouts typed
for the new-page chooser, a living style guide of ten patterns whose values are read from the
active global styles at render (`inc/styleguide.php`), and a dental practice pack of twenty-one
patterns for the fictional Bright Harbor Dental. Nine new block styles (table striped and
compact, heading eyebrow, paragraph lead, list two-column, group textured and wave-bottom, cover
gradient-overlay, accordion faq, tabs boxed) with base rules for the Accordion, Tabs, Table,
Media and Text, Pullquote and Social Icons blocks; button hover and active states in theme.json;
the Contrast variation (AAA colors, no shadows, 2 px borders); the header with utility bar part;
descriptions on every pattern category. Tooling: the `keel-demo` plugin under `examples/`
(showcase patterns, measured facts band, `?variation=` switcher, `wp keel-demo seed`), the
kitchen sink fixture, `npm run docs:patterns`, screenshots per variation, and the showcase and
dental pages in the browser and Lighthouse gates.

## 0.1.0 (2026-10-29)

Theme MVP (M1). Thirteen templates and ten parts; thirty-three core-block patterns; eighteen
block styles; six variations (Harbor, Clinic, Slate, Coral, Palm, Night); self-hosted Figtree,
Bricolage Grotesque and Fraunces with Capsize fallbacks and preloads; three Interactivity API
stores (transparent header, announcement dismiss, testimonial carousel) loaded only where used;
plain HTML skip link and no JavaScript on static pages; axe, keyboard, Lighthouse, i18n and
forbidden-construct gates in CI; prerender on hover; a seeded demo site; a child theme example;
and a Spanish (es_ES) translation written by the builder, awaiting review by a native speaker.

## 0.0.1-m0 (2026-10-28)

M0 foundation prerelease, a proof of the release pipeline rather than a usable theme: minimal
block theme, design tokens, Harbor, Coral and Clinic variations behind a contrast gate, the
PostCSS pipeline, pattern scaffold, manifest and packager, rename script, seed and smoke tests,
Theme Check, CI, CodeQL, and a release workflow that publishes a Sigstore-signed zip, checksums
and a CycloneDX SBOM.
