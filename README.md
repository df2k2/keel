# Keel

A security-first block theme for local service businesses: fast and accessible by construction,
zero third-party requests, output ready for a strict content security policy, and designed to be
paired with a companion plugin that carries hardening and monitoring. "Keel" is a working codename.

Requires WordPress 7.1 or later and PHP 8.3 or later. Licensed GPL-2.0-or-later.

## What ships

- Seventeen templates, fourteen template parts and 185 patterns in 23 categories built from core blocks only, including twenty-six starter page layouts offered in the new-page chooser (journal, places, listings, events, deals, company and utility pages among them), the card family with equal heights in every row, and a dental practice pack of twenty-one patterns.
- An elements page (`keel/elements`) that names every element the theme ships with its class, style or pattern, and reads colours, contrast ratios, type, spacing, shape and every block style from the active global styles when it renders.
- Sixty-five block styles across nineteen blocks, seven style variations (Coral carries the editorial look with serif headings and the italic accent; Contrast is the high-contrast one), three self-hosted fonts as the body, display and serif families with metric fallbacks.
- Three Interactivity API stores under 400 bytes each, loaded only where their part or pattern renders; static pages load no JavaScript.
- Accessibility (axe, keyboard journey, target size), performance (Lighthouse budgets), i18n and security gates in CI; a signed release zip with a file manifest and SBOM.
- A Spanish translation, a child theme example under `examples/keel-child`, and the demo plugin under `examples/keel-demo` that builds the showcase site (never shipped in the zip).

## Quick start

```bash
npm install && composer install
npm run build
npm run env:start && npm run env:seed   # WordPress 7.1 on PHP 8.3 at http://localhost:8888, Coral variation
```

The seed builds the showcase site: Keel on display at `/`, patterns by category under `/patterns/`,
the elements page at `/elements/` with every core block as its last section, the page sets
(`/journal/`, `/places/`, `/listings/`, `/events/`, `/deals/`, `/about/` and the rest of the Pages
menu), twelve journal posts across the post formats, and the dental practice demo under `/dental/`.
Add `?variation=night` (or any variation slug) to see the whole site in another look.
`docs/patterns.md` lists every pattern.

Design: [docs/2026-10-27-keel-theme-design.md](docs/2026-10-27-keel-theme-design.md). Contributing:
[CONTRIBUTING.md](CONTRIBUTING.md). Security: [SECURITY.md](SECURITY.md).
