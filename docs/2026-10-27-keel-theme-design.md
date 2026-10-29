# Keel Theme Build: Design

Date: 2026-10-27. Owner: Chris Snedaker. Status: approved 2026-10-28; M0 design review closed 2026-10-29 (palettes unchanged, fonts pinned).

This is the build-ready design for the Keel WordPress theme, milestones M0 and M1 of the proposal at
`docs/plan/keel-proposal/PROPOSAL.md`. The proposal is the reference for market data, positioning,
and the full feature set. This document records what is decided for the theme build, what changed
from the proposal, what is left to the builder, and what is still open. The companion plugin, the
three sites' content, and the hosting platform (`2026-10-27-honeypot-design.md`) are separate
designs that depend on this one. Where this document and the proposal disagree, this one wins.

## 1. Intent

Build Keel: a pure block theme for local service businesses that replaces the page-builder-plus-
twelve-plugins stack with core blocks, curated patterns, measured performance budgets, WCAG 2.2 AA
by construction, zero third-party requests, and output that is ready for a strict content security
policy. The theme is presentation only and passes wordpress.org theme review as submitted.

Why: Chris's Florida scan shows the market runs builders and mega-themes with the worst update
hygiene and the highest compromise rates, while block-native sites are the best-maintained tier and
almost nobody serves this segment with a block theme. Keel is also the foundation for three real
sites Chris will host on the hardened platform: a theme demo, sailfishcoast.com, and the agency
site. The theme ships first because all three depend on it.

## 2. Goals, non-goals, anti-goals

Goals

- A wordpress.org-compliant block theme (`keel`) with `theme.json` version 3 as the single source
  of truth, six style variations, thirteen templates, ten template parts, twenty-five patterns at
  M1 growing to about sixty, block styles for ten core blocks, and three small Interactivity API
  behaviours.
- Every page the theme renders meets WCAG 2.2 AA, passes automated accessibility checks, and is
  fully keyboard-operable.
- Performance budgets enforced in CI: 35 KB of CSS, 0 KB of JavaScript on pages without
  interactive blocks, 15 KB with them, zero third-party requests.
- Security properties guaranteed by construction and checked in CI: no inline event handlers, no
  eval, nonce-ready script output, all output escaped, no remote fetches, no file writes, no
  settings surface.
- A child-theme story, a pattern scaffold, a contrast checker and a signed file manifest, so an
  agency can adopt the theme and keep it updated without forking.
- The theme alone is enough to build the demo site and the agency site; sailfishcoast.com needs
  only one integration (The Events Calendar) styled.

Non-goals

- Anything wordpress.org classifies as plugin territory: custom blocks, custom post types,
  shortcodes, settings pages, SEO, analytics, forms, caching, security hardening. All of that is
  the companion plugin, designed separately.
- Page-builder compatibility work. Builders run alongside block themes; Keel does not style them.
- Automatic dark mode by `prefers-color-scheme`. Core has no native support for switching style
  variations by media query, so Night ships as a site-wide variation.
- A custom lightbox. Core's built-in "expand on click" lightbox (Interactivity API, since 6.4)
  covers images and galleries; Keel enables it by default through
  `settings.blocks.core/image.lightbox` in `theme.json` and styles it.

Anti-goals

- A regression on any bullet of proposal section 7.2. CI blocks the merge.
- Any remote request in default operation, including fonts and icons.
- Any requirement pinned to an old version for reach. Floors are the current recommendations.
- Content that only renders with Keel active. Switch the theme off and the content still works.

## 3. Constraints

- Platform floors track current recommendations and rise with each Keel minor release (C):
  WordPress 7.1 (current 7.1.3), PHP 8.3 (WordPress's recommendation), tested on 8.3, 8.4 and 8.5;
  MariaDB 10.11 or MySQL 8.0 for the hosting; Node current LTS for the build; `theme.json`
  version 3; `$schema` pinned to the current WordPress release's schema URL.
- wordpress.org theme requirements as of their 2026-06-09 revision: `style.css`, `readme.txt`,
  `theme.json` and `templates/index.html` required; GPL-compatible everything; no remote resources
  without consent; no bundled plugins, plugins installed only by user action; no custom post
  types, blocks, roles, shortcodes, analytics, SEO, forms or caching in the theme.
- Build toolchain is `@wordpress/scripts` with PostCSS. No Tailwind, no Sass, no jQuery.
- Front-end JavaScript uses the Interactivity API only, loaded as script modules.
- Local development with `@wordpress/env` on Chris's Docker, WSL2.
- Repository under the `df2k2` GitHub account, public, GPL-2.0-or-later, at `~/Sites/keel` locally.
  This design and its implementation plan live in this ops repository until the theme repository
  exists, then a copy goes into `keel/docs/` and the ops copy points at it.
- One builder (Chris with Claude), work done inline, no sub-agents.

## 4. Decisions

Marked (C) when Chris decided it, (D) when it is the designer's call and Chris can overrule.

Identity and packaging

- (C) Working codename "Keel" everywhere until a wordpress.org slug check and trademark search
  clear a final name. (D) Slug, text domain and prefix are `keel`; block style and pattern
  namespace `keel/`; PHP namespace `Keel\Theme`; version `0.1.0`; author `df2k2`; license
  GPL-2.0-or-later. A rename is a scripted find-and-replace tracked in `bin/rename.sh`.
- (D) `style.css` header: `Requires at least: 7.1`, `Tested up to: 7.1`, `Requires PHP: 8.3`,
  raised on every minor release to match wordpress.org's current recommendation.
- (D) The release artefact is a zip built in CI from the tag, containing `build/` output, fonts,
  patterns, templates, parts, styles, `readme.txt`, `screenshot.png`, `LICENSE`, and
  `keel-manifest.json` (SHA-256 of every shipped file). The zip excludes `src/`, `bin/`,
  `tests/`, `examples/`, `.github/` and all tooling configuration, so Theme Check sees only what
  ships. `build/`, `node_modules/` and `vendor/` are not committed.

Repository layout

```
keel/
  style.css  readme.txt  theme.json  functions.php  screenshot.png  LICENSE
  SECURITY.md  CHANGELOG.md  CONTRIBUTING.md  CODE_OF_CONDUCT.md
  templates/        index, front-page, home, single, page, page-no-title, page-landing,
                    page-service, page-location, archive, search, 404, attachment
  parts/            header, header-centered, header-transparent, footer, footer-minimal,
                    cta-band, mobile-cta-bar, announcement-bar, post-meta, comments
  patterns/         one PHP file per pattern, categories registered in inc/patterns.php
  styles/           harbor.json  clinic.json  slate.json  coral.json  palm.json  night.json
  assets/fonts/     self-hosted variable WOFF2, OFL licensed, with LICENSE files
  assets/icons/     sprite.svg (build-time sanitised, inlined where used)
  assets/images/    placeholder and pattern imagery, GPL-compatible, small
  src/css/          PostCSS sources: tokens, base, blocks/*, parts, utilities
  src/js/           Interactivity API stores: header-transparent, announcement, carousel
  inc/              setup.php, enqueue.php, block-styles.php, patterns.php, fonts.php
  bin/              scaffold-pattern.js, check-contrast.js, build-manifest.js, rename.sh
  languages/        keel.pot
  tests/            playwright/, pa11y.json, lighthouserc.json, budgets.json
  .github/workflows ci.yml  release.yml
  .wp-env.json  package.json  composer.json  phpcs.xml.dist  phpstan.neon.dist
  .eslintrc.js  .stylelintrc.js  .editorconfig  .gitignore
```

Design tokens (`theme.json`)

- (D) Color palette slugs, identical across variations so patterns never reference a hue:
  `base`, `contrast`, `primary`, `primary-contrast`, `accent`, `accent-contrast`, `surface`,
  `surface-alt`, `border`, `success`, `warning`, `error`. Each variation redefines values only.
  Every foreground and background pairing the theme uses is listed in `tests/contrast-pairs.json`
  and checked in CI at 4.5:1 for text and 3:1 for UI. Duotone and gradient presets are limited to
  pairs that pass.
- (D) Typography: fluid, `settings.typography.fluid` on, seven size steps `xs` through `xxxl`
  defined with explicit min and max, line-height and letter-spacing per step in `custom`.
  Three OFL variable families ship in the theme and each variation uses at most two. Pinned at
  the M0 design review on 2026-10-29 (C): Figtree (Erik Kennedy, OFL) for body and UI in every
  variation; Bricolage Grotesque (Mathieu Triay, OFL) as the display face for Harbor, Slate and
  Night; Fraunces (Undercase Type, OFL) as the display face for Coral and Palm; Clinic uses
  Figtree alone. Sources are the google/fonts repository at a pinned commit, subset to Latin at
  build time with the width axis of Bricolage Grotesque and the SOFT and WONK axes of Fraunces
  pinned; `size-adjust` fallbacks (Arial for the sans faces, Georgia for Fraunces) are generated
  so swapping to the web font causes no layout shift. No remote font ever. M0 rendered with the
  system UI stack; M1 ships the files.
- (D) Spacing: eight fluid steps in `spacingSizes` (slugs `10` through `80`), used for block gap,
  padding and section rhythm. Content width 68rem, wide 90rem, root-padding-aware alignments on.
- (D) Shape and elevation in `custom`: radius `none`, `sm`, `md`, `lg`, `pill`; two shadows;
  one border width. A variation may set every radius to zero.
- (D) `appearanceTools` on; `useRootPaddingAwareAlignments` on; `settings.layout` as above;
  `styles.elements` for links, buttons, headings h1 to h6 and captions; `styles.blocks` only for
  core blocks that need base rules; per-block CSS stays in `src/css/blocks/*` and loads only when
  the block is present.

Style variations

- (D) Six variations, each a complete `styles/*.json` that overrides palette, font families and
  radius only: Harbor (navy and slate, trust-forward), Clinic (calm teal and white, large touch
  targets), Slate (charcoal with a safety-orange accent), Coral (warm sand and coral), Palm (deep
  green and cream), Night (dark, usable site-wide). M0 ships Harbor, Coral and Clinic because the
  agency site, sailfishcoast.com and the demo use them. The other three land in M1.

Templates and template parts

- (D) Thirteen templates as listed in the layout. `page-landing` has no navigation and one CTA;
  `page-service` and `page-location` are the service-business staples (service detail with trust
  bar and CTA; service-area page with map image, hours and directions). `404` carries search and
  a top-services pattern. All templates use template parts for header and footer so a child theme
  swaps them once.
- (D) Ten template parts as listed. `header-transparent` sits over a hero and switches to solid
  on scroll through the `keel/header` Interactivity store. `mobile-cta-bar` is a sticky bottom bar
  with Call, Text, Book and Directions links, pure CSS, reserving scroll padding so focus is never
  obscured. `announcement-bar` dismisses through the `keel/announcement` store with the state in
  `sessionStorage`, no cookie. Header and footer parts use `templateLock` so owners edit content
  inside them without breaking layout.

Patterns

- (D) M1 ships twenty-five patterns across the registered categories `keel/hero`, `keel/trust`,
  `keel/services`, `keel/process`, `keel/team`, `keel/testimonials`, `keel/pricing`, `keel/faq`,
  `keel/location`, `keel/gallery`, `keel/cta`, `keel/contact`, `keel/footer`, `keel/blog`,
  `keel/pages`: four heroes (image, split, video-poster-only, text-only); trust bar; services grid
  in three, four and six; service detail; process steps; stats band; team grid; testimonials grid
  and scroll-snap carousel; reviews summary; pricing table; FAQ on Details blocks; hours and
  location; gallery with core lightbox; four CTA bands; a contact layout shell for form plugins;
  two footers; two blog layouts; 404 content. The remaining patterns and the six vertical packs
  follow in M3 per the proposal.
- (D) Patterns contain only core blocks and placeholder text and images that ship with the theme.
  Business facts such as phone numbers appear as editable placeholders until the companion's Block
  Bindings replace them.
- (D) The mega menu is a pattern on core Navigation submenus, not a plugin.

Block styles

- (D) Registered in `inc/block-styles.php` with per-style CSS files that load only when used:
  Button (secondary, ghost, pill), Group (card, surface, band, bordered), Image (rounded, framed),
  List (checkmarks), Quote (testimonial), Separator (short, wave), Navigation (pill, underline),
  Details (faq), Columns (equal-cards), Cover (band).

Interactivity and JavaScript

- (D) Three script modules, each under 2 KB compressed, registered as Interactivity API stores and
  enqueued only when their part or pattern is present, from a `render_block` filter keyed on the
  template part slug or the pattern's wrapper class, never globally: `keel/header` (transparent-to-solid on
  scroll), `keel/announcement` (dismiss), `keel/carousel` (optional previous and next controls for
  the scroll-snap testimonial carousel). Everything else, including the mobile CTA bar, stats
  counters and FAQ accordions, is CSS or native HTML. Stats counters animate with CSS `@property`
  and honour `prefers-reduced-motion`.
- (D) Scripts are emitted through core's script module API so a nonce from the companion's CSP
  generator attaches without theme changes. ESLint rules `no-eval`, `no-implied-eval` and
  `no-new-func` are errors and `eslint-plugin-security` is on.

Accessibility

- As proposal section 5.6, with these made concrete: skip link in every template; one `h1` per
  template guaranteed by template structure; a 2px offset focus ring token never removed;
  24 by 24 CSS pixel minimum targets; `scroll-padding` on the root so sticky bars never obscure
  focus; keyboard-complete navigation submenus, Details accordions, lightbox and carousel; `inert`
  on the page behind the open mobile menu; in-text links underlined; `prefers-reduced-motion`
  honoured globally; text resizes to 200 percent without loss. An Accessibility Statement page
  pattern ships in M1.
- (D) CI runs `pa11y-ci` with axe on six demo pages (home, service, location, blog index, single
  post, 404) rendered in `wp-env`, and a Playwright keyboard-only journey through header, menu,
  accordion, carousel and lightbox. Either failing blocks the merge.

Performance

- As proposal section 5.7. (D) Enforced by Lighthouse CI against the same six pages with
  `tests/budgets.json`: theme CSS at most 35 KB compressed in total; JavaScript 0 KB on pages
  without interactive parts and at most 15 KB including the Interactivity runtime with them;
  zero third-party requests; LCP at most 1.8 s, CLS at most 0.05, INP at most 150 ms on the
  mid-tier mobile profile. `should_load_separate_core_block_assets` is on; fonts are preloaded
  with `size-adjust` fallbacks; the hero image gets `fetchpriority="high"`; Speculation Rules are
  configured for same-origin `prerender` on hover.

Security (theme level)

- As proposal section 7.2, enforced by CI: PHPCS with `WordPress-Extra`, `WordPress-Security` and
  `WPThemeReview` at error level; PHPStan level 6 with the WordPress extension; Theme Check with
  zero warnings; Semgrep WordPress rules; CodeQL on JavaScript; a license check limited to
  GPL-compatible dependencies; and a grep gate that fails on `eval`, `unserialize`, `extract`,
  variable includes, file writes, `wp_remote_*` and superglobals anywhere in the theme.
- (D) `functions.php` only requires files from `inc/`. The theme registers no REST routes, no
  AJAX handlers, no options, no admin pages. It never enables SVG uploads or new MIME types.
- (D) Releases ship `keel-manifest.json`, produced by `bin/build-manifest.js` and signed with
  Sigstore cosign in CI, plus `SHA256SUMS` and a CycloneDX SBOM of build dependencies. Actions
  are pinned by SHA; `npm ci` and `composer install --no-dev` only; Dependabot weekly; audit
  failures on high severity block the release.

Internationalisation and child themes

- (D) Every string translatable in the `keel` text domain, `languages/keel.pot` regenerated in CI,
  CSS written with logical properties only so RTL needs no overrides, patterns tested with Spanish
  copy length. A `keel-child` scaffold lives in the repo under `examples/keel-child/` and is also
  published as its own repo at M5.

Development workflow

- (D) `.wp-env.json` runs WordPress 7.1.3 on PHP 8.3 with the theme mounted and the six demo pages
  imported from `tests/fixtures/demo-content.xml` on `npm run env:seed`. `npm start` watches and
  builds; `npm run lint`, `npm run test:e2e`, `npm run test:a11y`, `npm run test:perf` mirror CI.
  Pre-commit runs the fast subset (PHPCS, ESLint, Stylelint, contrast check).
- (D) Branch protection on `main`: pull requests only, required CI, linear history, signed
  commits. `release/x.y` branches cut from `main`; tags `vX.Y.Z` trigger the release workflow.
- (D) Conventional commits and a generated `CHANGELOG.md`; security fixes called out.

What the three sites need from the theme

| Site | Variation | Templates and parts used | Patterns needed at M1 | Beyond the theme |
| --- | --- | --- | --- | --- |
| Theme demo | Clinic | front-page, page-service, page-location, archive, single, 404; header, mobile-cta-bar | hero split, trust bar, services grid, process steps, stats band, team grid (providers), testimonials, FAQ, hours and location, CTA bands, contact shell, footer; a Slate-variation trades landing page in the pattern showcase | demo content fixtures; companion blocks later |
| sailfishcoast.com | Coral | front-page, page, page-landing, home, single, archive, search; header, footer, cta-band | hero image, services grid repurposed as "things to do", gallery, testimonials carousel, blog layouts, location | The Events Calendar styles (companion integrations shim), listings and itinerary planner deferred to the sites design |
| Agency site | Harbor | front-page, page-service, page-landing, single, archive; header-centered, footer-minimal, cta-band | hero text-only, services grid, process steps, team grid, pricing table, testimonials grid, FAQ, CTA bands, contact shell | a form plugin for contact; portfolio as posts in a category |

## 5. Order of work

M0, foundation (proposal weeks 1 to 2)

1. Create `~/Sites/keel`, the GitHub repository under `df2k2`, branch protection, CI skeleton with
   every gate from this document running green on an empty theme.
2. `theme.json` with the full token set; `src/css` base layer; the three M0 variations (Harbor,
   Coral, Clinic).
3. `bin/check-contrast.js` and `tests/contrast-pairs.json`; `bin/build-manifest.js`;
   `bin/scaffold-pattern.js`; `bin/rename.sh`.
4. `wp-env` running with the seed content; one page rendered in each M0 variation.
5. Checkpoint: CI green on a pull request; tokens documented in `CONTRIBUTING.md`; a design
   review with Chris of the three variations and the candidate fonts, after which fonts are
   pinned. Done 2026-10-29: Harbor, Coral and Clinic approved unchanged; fonts pinned as in
   section 4.

M1, theme MVP (proposal weeks 3 to 6)

6. Templates and template parts; `inc/block-styles.php` and the per-style CSS; fonts with
   `size-adjust` fallbacks; the three Interactivity stores.
7. The twenty-five patterns; the Accessibility Statement page pattern; `readme.txt`;
   `screenshot.png`; the remaining three variations.
8. Playwright keyboard journey, pa11y and Lighthouse configurations with the six demo pages.
9. i18n pass and `keel.pot`; RTL check with a forced RTL locale in `wp-env`; Spanish copy test.
10. Checkpoint: Theme Check clean; pa11y and axe clean on all six pages; Lighthouse budgets met;
    keyboard journey passes; `v0.1.0` tagged, zip built, manifest signed, release published on
    GitHub. wordpress.org submission waits for M5 per the proposal.

After M1, in this order, each with its own design: the companion plugin (lean, proposal M2), the
three sites' content and configuration, then the hosting platform build already designed.

## 6. Left to the builder

- Exact color values inside each variation, within the contrast constraints.
- Final pattern markup and copy, pattern imagery, and the demo fixture content.
- CSS architecture inside `src/css`, PostCSS plugin choices, font subsetting ranges.
- The precise CI configuration for each tool and the Lighthouse mobile profile.
- Carousel and header store implementation details.
- Whether `page-no-title` is a template or a template variation of `page`.

## 7. Open items for Chris

- The final name, once a wordpress.org slug check and a trademark search clear one. The build
  proceeds under the codename either way.
- Font approval at the M0 design review: done 2026-10-29, see Typography in section 4.
- Demo site's vertical: confirmed by Chris on 2026-10-28 (C). From the vertical analysis in
  `docs/plan/keel-proposal/research/business-verticals.md`: a fictional dental practice on the
  Clinic variation with the Health and Dental pack, health and medical being the largest
  local-service family in Chris's data, with the biggest and best-maintained businesses and proven
  demand for vertical-specific themes. Runner-up is a home services company on Slate.
- The agency's name and brand identity for the Harbor build. Not needed until the sites design,
  but it shapes the Harbor variation's review.
