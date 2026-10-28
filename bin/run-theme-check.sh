#!/usr/bin/env bash
# Packages the theme and runs the Theme Check plugin against the packaged copy inside wp-env.
set -euo pipefail
cd "$(dirname "$0")/.."
npm run --silent build
npm run --silent package >/dev/null
rm -rf dist/theme-check && mkdir -p dist/theme-check
unzip -q dist/keel-*.zip -d dist/theme-check
if ! npx wp-env run cli wp plugin is-installed theme-check >/dev/null 2>&1; then
	npx wp-env run cli wp plugin install theme-check >/dev/null
fi
npx wp-env run cli wp plugin activate theme-check >/dev/null 2>&1 || true
npx wp-env run cli wp eval-file wp-content/themes/keel/bin/run-theme-check.php wp-content/themes/keel/dist/theme-check
