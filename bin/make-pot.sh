#!/usr/bin/env bash
# Regenerates languages/keel.pot inside wp-env. With --check, fails when the committed POT is out of date
# (the creation date header is ignored).
set -euo pipefail
cd "$(dirname "$0")/.."
target=languages/keel.pot
[ "${1:-}" = "--check" ] && target=languages/keel.check.pot
npx wp-env run cli wp i18n make-pot wp-content/themes/keel "wp-content/themes/keel/$target" \
	--domain=keel --exclude=node_modules,vendor,build,dist,tests,examples,docs,bin,.superpowers,.lighthouseci \
	--skip-audit --headers='{"Report-Msgid-Bugs-To":"https://github.com/df2k2/keel/issues"}' >/dev/null
if [ "${1:-}" = "--check" ]; then
	if diff <(grep -v '^"POT-Creation-Date' languages/keel.pot) <(grep -v '^"POT-Creation-Date' "$target") >/dev/null; then
		rm -f "$target"; echo "languages/keel.pot is current."
	else
		rm -f "$target"; echo "languages/keel.pot is out of date: run npm run i18n:pot" >&2; exit 1
	fi
else
	echo "wrote $target"
fi
