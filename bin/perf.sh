#!/usr/bin/env bash
# Runs Lighthouse CI against the seeded wp-env site using Playwright's Chromium.
set -euo pipefail
cd "$(dirname "$0")/.."
export TMPDIR=/tmp
export CHROME_PATH="${CHROME_PATH:-$(node -e "process.stdout.write(require('@playwright/test').chromium.executablePath())")}"
npx lhci autorun --config=lighthouserc.cjs
