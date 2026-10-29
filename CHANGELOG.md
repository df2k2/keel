# Changelog

All notable changes to Keel are recorded here. The format follows Keep a Changelog, and the project uses Semantic Versioning.

## Unreleased

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
