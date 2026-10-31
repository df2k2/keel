#!/usr/bin/env bash
# Seeds the wp-env site: theme, permalinks, the M1 example pages and posts, then the keel-demo plugin's showcase and dental pages, menu and front page, and the Coral variation.
set -euo pipefail
cd "$(dirname "$0")/.."
npx wp-env run cli wp theme activate keel
npx wp-env run cli wp rewrite structure '/%postname%/' --hard
attachment=$(npx wp-env run cli wp post list --post_type=attachment --name=keel-placeholder --field=ID 2>/dev/null | tail -1 | tr -d '[:space:]')
if [ -n "$attachment" ]; then
	# A wp-env restart after a config change re-creates the WordPress directory and loses uploads while the
	# database keeps the attachment row; a missing file would render as a broken featured image.
	present=$(npx wp-env run cli wp eval "echo file_exists( (string) get_attached_file( $attachment ) ) ? 'yes' : 'no';" 2>/dev/null | tail -1 | tr -d '[:space:]')
	if [ "$present" != "yes" ]; then
		npx wp-env run cli wp post delete "$attachment" --force >/dev/null 2>&1 || true
		attachment=""
	fi
fi
if [ -z "$attachment" ]; then
	attachment=$(npx wp-env run cli wp media import wp-content/themes/keel/tests/fixtures/attachment.png --title="Keel placeholder" --porcelain 2>/dev/null | tail -1 | tr -d '[:space:]')
fi
npx wp-env run cli wp eval-file wp-content/themes/keel/bin/seed.php "$attachment"
npx wp-env run cli wp plugin activate keel-demo
npx wp-env run cli wp keel-demo seed
bash bin/apply-variation.sh coral
