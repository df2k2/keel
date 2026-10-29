# Keel

A security-first block theme for local service businesses: fast and accessible by construction,
zero third-party requests, output ready for a strict content security policy, and designed to be
paired with a companion plugin that carries hardening and monitoring. "Keel" is a working codename.

Requires WordPress 7.1 or later and PHP 8.3 or later. Licensed GPL-2.0-or-later.

## What ships

- Thirteen templates, eleven template parts and ninety-four patterns built from core blocks only, including seven starter page layouts offered in the new-page chooser and a dental practice pack of twenty-one patterns.
- A living style guide page (`keel/styleguide`) that reads colours, contrast ratios, type, spacing, shape and every block style from the active global styles when it renders.
- Twenty-seven block styles, seven style variations (Contrast is the high-contrast one), three self-hosted variable fonts with metric fallbacks.
- Three Interactivity API stores under 400 bytes each, loaded only where their part or pattern renders; static pages load no JavaScript.
- Accessibility (axe, keyboard journey, target size), performance (Lighthouse budgets), i18n and security gates in CI; a signed release zip with a file manifest and SBOM.
- A Spanish translation, a child theme example under `examples/keel-child`, and the demo plugin under `examples/keel-demo` that builds the showcase site (never shipped in the zip).

## Quick start

```bash
npm install && composer install
npm run build
npm run env:start && npm run env:seed   # WordPress 7.1 on PHP 8.3 at http://localhost:8888, Clinic variation
```

The seed builds the showcase site: Keel on display at `/`, patterns by category under `/patterns/`,
the style guide at `/style-guide/`, every core block in every style at `/block-styles/`, and the
dental practice demo under `/dental/`. Add `?variation=night` (or any variation slug) to see the
whole site in another look. `docs/patterns.md` lists every pattern.

Design: [docs/2026-10-27-keel-theme-design.md](docs/2026-10-27-keel-theme-design.md). Contributing:
[CONTRIBUTING.md](CONTRIBUTING.md). Security: [SECURITY.md](SECURITY.md).
