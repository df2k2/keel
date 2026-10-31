=== Keel ===
Contributors: df2k2
Tags: full-site-editing, block-patterns, block-styles, accessibility-ready, custom-colors, custom-logo, editor-style, translation-ready, rtl-language-support, wide-blocks
Requires at least: 7.1
Tested up to: 7.1
Requires PHP: 8.3
Stable tag: 0.3.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A security-first block theme for local service businesses.

== Description ==

Keel is a block theme for local service businesses: fast and accessible by construction, with zero third-party requests, output ready for a strict content security policy, curated patterns in place of a page builder, and a companion plugin that carries hardening and monitoring. Everything is core blocks and theme.json, so the content stays portable.

* Seventeen templates and fourteen template parts, including service, location and landing page templates, three post templates (cover, with sidebar, minimal), an author archive, a transparent header, a sticky header, a header with a utility bar, a big footer, a floating call to action and a mobile call-to-action bar.
* One hundred and eighty-five patterns in twenty-three categories: heroes, trust, services, process, team, testimonials, pricing, FAQ, location, gallery, calls to action, contact, footers, blog and journal, cards (listing, row, tile, mini list, ticket, polaroid), elements (section titles, button rows, ratings, prices, search panel, chips, callouts, tables, breadcrumbs, marquee), places and listings, events and deals, company and utility sections, 404 and an accessibility statement.
* Twenty-six starter page layouts offered when a new page is created: service detail, provider profile, pricing, landing offer, about, contact, FAQ, journal, places, place, listings, listing, events, event, deals, about with story, team, careers, press, contact with map, visitor information, coming soon, maintenance, thank you, legal and one page.
* An elements page that names every element the theme ships with its class, style or pattern: colours with contrast ratios, type, spacing, shape, buttons, badges and prices, forms, search, cards, journal and team and reviews, decorations, tabs and filters, itinerary and steps, deals, callouts, tables, rails, pagination, stats and media, newsletter and footer, every block style, icons and variations, read from the active styles each time it renders.
* Cards of equal height in every row with the footer on the bottom edge, a photo-first card anatomy, post formats with their own card looks, and enhanced pagination on the query grids.
* A dental practice pattern pack: thirteen sections and eight pages for a fictional practice, the shape for further vertical packs.
* Sixty-five block styles across nineteen blocks: buttons (sizes, light, glass, soft, link, icon buttons), groups (card, band, ticket, rail, paper, dot grid, marquee, callouts, search panels), images, lists, quotes, separators, navigation, details, columns, covers, tables, headings, paragraphs, galleries, Media and Text, the Accordion and the Tabs blocks.
* Seven style variations: Harbor, Clinic, Slate, Coral, Palm, Night and Contrast (WCAG AAA colours, no shadows, 2 pixel borders). Coral and Palm set headings in Fraunces with an italic accent style.
* Three self-hosted fonts as three families, body, display and serif (Figtree, Bricolage Grotesque, Fraunces), with metric-matched fallbacks, so text never jumps.
* Three tiny Interactivity API behaviours (transparent header, announcement dismiss, testimonial carousel) that load only on pages that use them; static pages load no JavaScript at all.
* WCAG 2.2 AA by construction: one h1 per page, landmarks, a plain HTML skip link, visible focus, 24 pixel targets, reduced-motion support, and automated accessibility checks in the theme's test suite.
* Ships with a Spanish (es_ES) translation.

== Installation ==

1. In the WordPress admin go to Appearance, Themes, Add New and upload the zip, or copy the unzipped folder to wp-content/themes/keel.
2. Activate Keel.
3. Pick a style variation under Appearance, Editor, Styles, then build pages from the Keel patterns.

== Frequently Asked Questions ==

= Does Keel load anything from other servers? =

No. Fonts, icons and images ship inside the theme and no page makes a request to a third party.

= Where are the forms and contact features? =

Keel is presentation only. Use any form plugin that outputs standard blocks inside the contact shell pattern; the theme styles it.

= Can I customise it without losing updates? =

Yes. Use a child theme (an example ships in the repository under examples/keel-child) or the site editor; Keel never writes to its own files.

== Changelog ==

= 0.3.0 =
* The type scale with a display size, the serif family and accent headings, Coral as the showcase default; equal-height Stack cards and the card family; thirty-seven block styles, ninety-one patterns, six page sets with nineteen page layouts, three post templates and the author archive, post formats, the elements page that replaces the style guide, three new parts.

= 0.2.0 =
* Sixty-one new patterns (generic sections, seven starter page layouts, the living style guide, the dental pack), nine block styles including Accordion and Tabs, button hover and active states, the Contrast variation, the header with utility bar, and pattern category descriptions.

= 0.1.0 =
* First release: templates, parts, patterns, block styles, variations, fonts, Interactivity stores, accessibility and performance gates, Spanish translation.

== Copyright ==

Keel WordPress Theme, (C) 2026 df2k2
Keel is distributed under the terms of the GNU GPL v2 or later.

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

Figtree font
Copyright 2022 The Figtree Project Authors (https://github.com/erikdkennedy/figtree), designer Erik Kennedy.
Licensed under the SIL Open Font License 1.1, see assets/fonts/OFL-figtree.txt.

Bricolage Grotesque font
Copyright 2023 The Bricolage Grotesque Project Authors (https://github.com/ateliertriay/bricolage), designer Mathieu Triay.
Licensed under the SIL Open Font License 1.1, see assets/fonts/OFL-bricolage-grotesque.txt.

Fraunces font
Copyright 2020 The Fraunces Project Authors (https://github.com/undercasetype/Fraunces), Undercase Type, Phaedra Charles and Flavia Zimbardi.
Licensed under the SIL Open Font License 1.1, see assets/fonts/OFL-fraunces.txt.

Icons in assets/icons are adapted from Feather Icons, Copyright (c) 2013-2023 Cole Bemis, MIT License, https://github.com/feathericons/feather.

Placeholder images in assets/images are original work by df2k2, released under the GPL v2 or later with the theme.
