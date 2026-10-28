# Contributing to Keel

## Toolchain

Requirements: Node 24 or later, PHP 8.3 or later, Composer 2, Docker (for `wp-env`).

| Command | What it does |
| --- | --- |
| `npm install && composer install` | install every development dependency |
| `npm run build` | compile `src/css` into `build/css` |
| `npm run lint:php` | PHPCS (WordPress-Extra, WPThemeReview, PHPCompatibilityWP) and PHPStan level 6 |
| `npm run lint:js` / `npm run lint:css` | ESLint on `bin` and `tests`; Stylelint with logical properties enforced |
| `npm run check:contrast` | contrast gate for `theme.json` and every style variation |
| `npm run test:unit` | unit tests for the `bin` tools |
| `npm run env:start` / `npm run env:seed` | local WordPress 7.1.3 on PHP 8.3 with seed content |
| `npm run check:theme` | Theme Check inside `wp-env` |
| `npm run test:e2e` | Playwright smoke tests against `wp-env` |
| `npm run package` | build the release zip and manifest into `dist/` |

Commits follow Conventional Commits. `main` accepts pull requests only.

## Design tokens

(Documented in Task 3 of the M0 plan.)
