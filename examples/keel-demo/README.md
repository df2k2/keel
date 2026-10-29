# Keel demo plugin

Showcase-only pieces for the Keel demo site. It is mapped into wp-env from this folder and is
never part of the theme zip (`examples/` is excluded by `bin/package.js`). Do not install it on a
production site: it reads a query string to restyle the page and exists to show the theme off.

## What it does

- **Showcase patterns** (`patterns/*.php`, category "Keel demo", hidden from the inserter): the
  hero, the variations strip, the facts band, the demos row, the templates table, Why Keel and
  Get Keel. Registered lazily from their files like core does for theme patterns.
- **Facts band** (`inc/facts.php`): measures the compressed size of `build/css/keel.css`, the
  theme's script modules and their compressed sizes, and counts the registered patterns,
  variations and block styles at render. The claims are stated; the numbers are measured.
- **Variation switcher** (`inc/switcher.php`, `src/switcher.js`): `?variation=<slug>` lays
  `styles/<slug>.json` over the user origin for that request through `wp_theme_json_data_user`.
  Unknown slugs are ignored and the page renders unchanged. A script module under 1 KB, loaded
  only where the variations strip renders, stores the clicked slug in `localStorage` and appends
  `?variation=` to same-origin links so the choice follows the visitor. `?variation=` (empty)
  clears it.
- **`wp keel-demo seed`** (`inc/class-seed-command.php`): builds the showcase pages (Home as the
  front page, Variations, Patterns index and one page per category from the registry, Templates,
  Block styles from `fixtures/kitchen-sink.html`, Style guide, Why Keel, Get Keel), the dental
  pages under `/dental/`, the Primary menu, the posts page and the site title. Idempotent by slug:
  run it again after changing a pattern and the pages re-render from the registry.

`bin/seed.sh` activates the plugin and runs the command after the M1 seed.

## Known limits

- The switcher relies on the global stylesheet being computed per request. With a persistent
  object cache that stores `wp_get_global_stylesheet`, the first requested variation could be
  served to later visitors until the cache clears. wp-env runs in theme development mode, which
  disables that cache; the hosted demo must do the same or exclude the `theme_json` group.
- Screenshots in `assets/variations/` (600 by 450 JPEG tiles) and `assets/dental.jpg` are written
  by `bin/screenshot.js`; a tile shows its palette strip alone until the file exists.
