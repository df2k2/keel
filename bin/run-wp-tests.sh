#!/usr/bin/env bash
# Runs every WP-CLI assertion script under tests/wp/ inside wp-env and stops at the first failure.
set -euo pipefail
cd "$(dirname "$0")/.."
for f in tests/wp/*.php; do
	echo "== $f"
	if ! npx wp-env run cli wp eval-file "wp-content/themes/keel/$f"; then
		echo "FAILED: $f" >&2
		exit 1
	fi
done
echo "All WP assertions passed."
