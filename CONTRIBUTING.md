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
| `npm run i18n:pot` / `npm run i18n:check` / `npm run i18n:build` | regenerate, verify or compile `languages/` |
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

Families `body` and `display` are roles, so patterns never name a typeface. Pinned at the M0
design review (2026-10-29): `body` is Figtree in every variation; `display` is Bricolage Grotesque
in Harbor, Slate and Night, Fraunces in Coral and Palm, and Figtree in Clinic. All three are OFL
variable fonts, subset to Latin from a pinned google/fonts commit by `npm run build:fonts` (M1)
and shipped under `assets/fonts/` with Capsize-generated `size-adjust` fallbacks (Arial for the
sans faces, Georgia for Fraunces). M0 still renders the system stack. Fluid sizes `xs`
(13 to 14 px), `sm` (14 to 16), `md` (16 to 18, the body size), `lg` (18 to 22), `xl` (22 to 28),
`xxl` (28 to 40), `xxxl` (36 to 56). Line heights `tight` 1.15, `snug` 1.3, `normal` 1.6 and
letter spacing `tight`, `normal`, `wide` live under `settings.custom.typography`.

### Spacing (`settings.spacing.spacingSizes`)

Slugs `10` through `80`: 0.25rem, 0.5rem, then fluid `clamp()` steps up to 4 to 8 rem. The
default WordPress scale is disabled. Content width 68rem, wide width 90rem.

### Shape and elevation (`settings.custom`)

Radius `none`, `sm` 4px, `md` 8px, `lg` 16px, `pill`; shadows `sm` and `md`; border width 1px;
focus ring `2px solid primary` with a 2px offset.

## Fonts

`assets/fonts/` holds Latin subsets built by `bin/build-fonts.js` from google/fonts commit
`9862abc0`: Figtree 20 KB roman and 21 KB italic, Bricolage Grotesque 84 KB (width pinned at 100,
weight 400 to 800), Fraunces 65 KB roman and 79 KB italic (SOFT 50, WONK 0, weight 300 to 800).
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
no `core/html`. Heroes carry the page's `h1`; everything else starts at `h2`. The unit gate
`tests/unit/patterns.test.js` enforces this; `tests/wp/patterns.php` renders every pattern.

## Test helpers

`tests/wp-env/keel-test-helpers.php` is mapped into `wp-env` as a must-use plugin (never shipped):
`?keel_locale=es_ES` forces a locale and `?keel_rtl=1` forces right-to-left for the i18n specs.
