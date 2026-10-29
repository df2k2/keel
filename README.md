# Keel

A security-first block theme for local service businesses: fast and accessible by construction,
zero third-party requests, output ready for a strict content security policy, and designed to be
paired with a companion plugin that carries hardening and monitoring. "Keel" is a working codename.

Requires WordPress 7.1 or later and PHP 8.3 or later. Licensed GPL-2.0-or-later.

## What ships

- Thirteen templates, ten template parts and thirty-three patterns built from core blocks only.
- Eighteen block styles, six style variations, three self-hosted variable fonts with metric fallbacks.
- Three Interactivity API stores under 400 bytes each, loaded only where their part or pattern renders; static pages load no JavaScript.
- Accessibility (axe, keyboard journey, target size), performance (Lighthouse budgets), i18n and security gates in CI; a signed release zip with a file manifest and SBOM.
- A Spanish translation and a child theme example under `examples/keel-child`.

## Quick start

```bash
npm install && composer install
npm run build
npm run env:start && npm run env:seed   # WordPress 7.1 on PHP 8.3 at http://localhost:8888, Clinic variation
```

Design: [docs/2026-10-27-keel-theme-design.md](docs/2026-10-27-keel-theme-design.md). Contributing:
[CONTRIBUTING.md](CONTRIBUTING.md). Security: [SECURITY.md](SECURITY.md).
