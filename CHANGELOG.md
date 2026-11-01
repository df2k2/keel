# Changelog

All notable changes to Keel are recorded here. The format follows Keep a Changelog, and the project uses Semantic Versioning.

## Unreleased

## 0.3.1 (2026-10-31)

Child theme support, learnt from building the first site on Keel. The header actions are a
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
`accent` style renders an emphasised phrase in the serif italic and the accent colour; Fraunces
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
the Contrast variation (AAA colours, no shadows, 2 px borders); the header with utility bar part;
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
