#!/usr/bin/env bash
# Seeds the wp-env site: activates the theme, pretty permalinks, a Home page as the static front page.
set -euo pipefail
cd "$(dirname "$0")/.."
npx wp-env run cli wp theme activate keel
npx wp-env run cli wp rewrite structure '/%postname%/' --hard
npx wp-env run cli wp eval-file wp-content/themes/keel/bin/seed.php
