#!/usr/bin/env bash
# Applies styles/<slug>.json to the wp-env site's global styles.
# Usage: bin/apply-variation.sh <slug>
set -euo pipefail
[ $# -eq 1 ] || { echo "usage: bin/apply-variation.sh <slug>" >&2; exit 2; }
cd "$(dirname "$0")/.."
npx wp-env run cli wp eval-file wp-content/themes/keel/bin/apply-variation.php "$1"
