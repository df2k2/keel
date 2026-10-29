#!/usr/bin/env bash
# Seeds the wp-env site: theme, permalinks, the M1 example pages and posts, then the keel-demo plugin's showcase and dental pages, menu and front page, and the Clinic variation.
set -euo pipefail
cd "$(dirname "$0")/.."
npx wp-env run cli wp theme activate keel
npx wp-env run cli wp rewrite structure '/%postname%/' --hard
attachment=$(npx wp-env run cli wp post list --post_type=attachment --name=keel-placeholder --field=ID 2>/dev/null | tail -1 | tr -d '[:space:]')
if [ -z "$attachment" ]; then
	attachment=$(npx wp-env run cli wp media import wp-content/themes/keel/tests/fixtures/attachment.png --title="Keel placeholder" --porcelain 2>/dev/null | tail -1 | tr -d '[:space:]')
fi
npx wp-env run cli wp eval-file wp-content/themes/keel/bin/seed.php "$attachment"
npx wp-env run cli wp plugin activate keel-demo
npx wp-env run cli wp keel-demo seed
bash bin/apply-variation.sh clinic
