# Contributing to Keel

## Toolchain

Requirements: Node 24 or later, PHP 8.3 or later, Composer 2, Docker (for `wp-env`).

| Command | What it does |
| --- | --- |
| `npm install && composer install` | install every development dependency |
| `npm run build` | compile `src/css` into `build/css` and `src/js` into `build/js` |
| `npm run build:fonts` | re-subset the fonts from the pinned google/fonts commit (network; the only script that touches it) |
| `npm run lint:php` | PHPCS (WordPress-Extra, WPThemeReview, PHPCompatibilityWP) and PHPStan level 6 |
| `npm run lint:js` / `npm run lint:css` | ESLint on `bin` and `tests`; Stylelint with logical properties enforced |
| `npm run check:contrast` | contrast gate for `theme.json` and every style variation |
| `npm run test:unit` | unit tests for the `bin` tools, CSS budget, patterns and templates |
| `npm run test:wp` | WP-CLI assertions inside `wp-env` (fonts, block CSS, block styles, patterns, templates) |
| `npm run env:start` / `npm run env:seed` | local WordPress 7.1.3 on PHP 8.3 with seed content |
| `npm run check:theme` | Theme Check inside `wp-env` |
| `npm run test:e2e` | Playwright against `wp-env`: smoke, fonts, every template, interactivity, axe and keyboard, Spanish and RTL |
| `npm run test:a11y` / `npm run test:i18n` | just the accessibility or the i18n specs |
| `npm run test:perf` | Lighthouse CI on five demo pages with `tests/budgets.json` |
| `npm run i18n:pot` / `npm run i18n:check` / `npm run i18n:build` | regenerate, verify or compile `languages/` (`.po` to `.mo`; no `.l10n.php`, Theme Check rejects non-ASCII PHP) |
| `npm run check:forbidden` | grep gate against eval, superglobals, remote calls and file writes in shipped code |
| `npm run package` | build the release zip and manifest into `dist/` |

Commits follow Conventional Commits. `main` accepts pull requests only.

## Design tokens

`theme.json` is the single source of truth. Style variations in `styles/` override the palette,
the font families and the radius tokens only; every other token is shared.

### Color (`settings.color.palette`)

| Slug | Purpose | Harbor value |
| --- | --- | --- |
| `base` | page background | `#FFFFFF` |
| `contrast` | body text, dark bands | `#0F1B2D` |
| `primary` | links, buttons, headings accent | `#1F3A5F` |
| `primary-contrast` | text on primary | `#FFFFFF` |
| `accent` | secondary calls to action, highlights | `#8A6D0B` |
| `accent-contrast` | text on accent | `#FFFFFF` |
| `surface` | cards, wells | `#F4F6F9` |
| `surface-alt` | alternating bands | `#E3E8EF` |
| `border` | hairlines, form borders (3:1 on base and surface) | `#7B8698` |
| `success` / `warning` / `error` | form and status text | `#1B6F43` / `#8F5600` / `#B3261E` |

Every foreground and background pair the theme uses is listed in `tests/contrast-pairs.json` and
checked by `npm run check:contrast` at 4.5:1 for text and 3:1 for UI.

### Typography (`settings.typography`)

Families `body`, `display` and `serif` are roles, so patterns never name a typeface. `body` is
Figtree in every variation; `display` is Bricolage Grotesque in Harbor, Slate and Night, Fraunces
in Coral and Palm, and Figtree in Clinic and Contrast; `serif` is Fraunces everywhere, so a child
theme or a pattern can reach it without redeclaring font files (the heading `accent` style sets an
emphasised phrase in it). Every variation lists all three families, because a variation's list
replaces the theme's. All three are OFL fonts, subset to Latin from a pinned google/fonts commit by
`npm run build:fonts` and shipped under `assets/fonts/` with Capsize-generated `size-adjust`
fallbacks (Arial for the sans faces, Georgia for Fraunces); Fraunces italic is a static weight-400
instance. Fluid sizes (M1.6): `xs` 12 to 13 px (eyebrows, chips, tags), `sm` 13 to 14 (meta,
labels, captions), `md` 16 to 17 (the body size), `lg` 18 to 20 (card titles, leads), `xl` 22 to
26 (h3), `xxl` 30 to 38 (h2), `xxxl` 40 to 56 (h1), `display` 48 to 68 (hero titles). Headings
weigh 600 (500 in Coral and Palm) with letter spacing `tight` (-0.015em) at h1 and h2 and `snug`
(-0.01em) at h3; buttons are 0.9375rem at 600; navigation is `sm` at 600. Line heights `tight` 1.1,
`snug` 1.35, `normal` 1.65 and letter spacing `tight`, `snug`, `normal`, `wide` (0.12em, the
eyebrow tracking) live under `settings.custom.typography`.

### Spacing (`settings.spacing.spacingSizes`)

Slugs `10` through `80`: 0.25rem, 0.5rem, then fluid `clamp()` steps up to 4 to 8 rem. The
default WordPress scale is disabled. Content width 68rem, wide width 90rem.

### Shape and elevation (`settings.custom`)

Radius `none`, `sm` 4px, `md` 8px, `lg` 16px, `pill`; shadows `sm` and `md`; border width 1px;
focus ring `2px solid primary` with a 2px offset.

## Fonts

`assets/fonts/` holds Latin subsets built by `bin/build-fonts.js` from google/fonts commit
`9862abc0`: Figtree 20 KB roman and 21 KB italic, Bricolage Grotesque 84 KB (width pinned at 100,
weight 400 to 800), Fraunces 65 KB roman (SOFT 50, WONK 0, weight 300 to 800) and 42 KB italic
pinned to weight 400, so Coral pages with the italic accent stay under the font budget.
`src/css/fonts.css` is generated with Capsize and never edited by hand. Only the roman faces of the
active `body` and `display` families are preloaded.

## Interactivity

Three stores in `src/js` (`keel/header`, `keel/announcement`, `keel/carousel`) are built by esbuild
into `build/js` and registered in `inc/interactivity.php`. Directives are added in `render_block`
filters, never in pattern or part markup, so the editor only ever sees core blocks. A store is
enqueued only when its template part or pattern renders; `page-landing` loads no JavaScript.

## Patterns

One PHP file per pattern under `patterns/`, core blocks only, every string wrapped in
`esc_html_e()` or `esc_attr_e()`, images and icons through `get_theme_file_uri()`, no inline SVG,
no `core/html`. Heroes and page layouts carry the page's `h1`; everything else starts at `h2`, and
an eyebrow is a paragraph with the `keel-eyebrow` class, never a heading, so heading order holds.
Repeated cards and rows may be generated by PHP loops over translated arrays. Page layouts add
`Template Types: page`, `Post Types: page` and `Block Types: core/post-content` to their header so
the editor offers them for a new page; the dental pack adds a `Description` that says the practice
is fictional. The unit gate `tests/unit/patterns.test.js` enforces the rules; `tests/wp/patterns.php`
renders every pattern and counts its `h1`s; `npm run docs:patterns` regenerates `docs/patterns.md`.

### Cards

A card is a Group in the `card` style with the Stack layout
(`"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}`) and a block gap of
`spacing|30`. A column or query item that holds a card becomes a flex column, so every card in a
row shares the row's height, and the card's last Buttons block or any block with the
`keel-card-footer` class sits on the bottom edge. A photo bleeds to the card's edges through the
`keel-card__media` class on a Cover or Group placed first; a `keel-tag` paragraph on the photo, a
`keel-meta` row of icon-and-text pairs, and a `keel-price` with its `keel-price__label` make the
listing anatomy. Row cards are Media and Text in the `card` style; tiles are Covers in the `tile`
style; tickets are Groups in the `ticket` style; stamps are `keel-stamp` paragraphs. Never write a
card with the constrained layout: `node bin/migrate-cards.js` rewrites any that slipped through
(patterns, templates, parts, the style guide helper and the demo plugin by default; pass paths to
migrate a child theme or a vertical pack).

## Elements page

`inc/styleguide.php` holds the helpers the `elements-*` patterns call at render:
`active_palette()`, `contrast_pairs()` (kept in step with `tests/contrast-pairs.json` by hand),
`contrast_ratio()`, `active_font_families()`, `style_variations()`, `block_style_sample()`, which
returns the sample markup for one registered block style, and `element_label()`, the small mono
label that names an element's class, style or pattern. Add a sample when you add a style and the
block-styles section shows it; add a labelled entry to the matching `elements-*` section when you
add a pattern or a utility, so the page keeps naming everything the theme ships. The demo appends
its kitchen sink to the page as the "Every core block" section.

## Per-block CSS

`src/css/blocks/<block>.css` loads only when that block renders. When a block's rules outgrow the
4 KB compressed budget of one file, split them into `<block>--<part>.css` files (`group--callouts.css`,
`group--ticket.css`, `group--marquee.css`); `inc/enqueue.php` registers each for the block named
before the `--`. Search forms get an `aria-label` from the block's label at render, so several on
one page stay distinct landmarks.

## Demo plugin

`examples/keel-demo/` is mapped into wp-env as a plugin and excluded from the zip. It registers the
showcase-only patterns, measures the facts band, serves `?variation=<slug>` by laying that
variation over the user origin for the request, and provides `wp keel-demo seed`, which
`bin/seed.sh` runs after the M1 seed to build the showcase pages (one per pattern category from
the registry, the elements page with the kitchen sink from `fixtures/kitchen-sink.html` as its last
section, the page-set pages, twelve journal posts), the dental pages, the menu and the front page. PHPCS and PHPStan cover it with the theme. See its README for the known limits.

## Test helpers

`tests/wp-env/keel-test-helpers.php` is mapped into `wp-env` as a must-use plugin (never shipped):
`?keel_locale=es_ES` forces a locale and `?keel_rtl=1` forces right-to-left for the i18n specs.
