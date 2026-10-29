#!/usr/bin/env bash
# Runs Lighthouse CI against the seeded wp-env site using Playwright's Chromium.
set -euo pipefail
cd "$(dirname "$0")/.."
export TMPDIR=/tmp TMP=/tmp TEMP=/tmp LOCALAPPDATA=/tmp APPDATA=/tmp
export CHROME_PATH="${CHROME_PATH:-$(node -e "process.stdout.write(require('@playwright/test').chromium.executablePath())")}"
npx --yes @lhci/cli@0.15.1 autorun --config=lighthouserc.cjs
