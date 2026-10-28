#!/usr/bin/env bash
# Renames the theme from the "keel" codename to a new slug and display name.
#
# Usage: bin/rename.sh <new-slug> "<New Name>" [--dry-run]
#   new-slug  lowercase letters, digits and hyphens, starting with a letter
#   New Name  the display name for style.css and readme.txt
# Exit codes: 0 done, 2 invalid arguments.
#
# Rewrites every tracked text file except LICENSE, CHANGELOG.md and docs/:
#   "Theme Name: Keel" and "=== Keel ===" take the new name;
#   KEEL  -> NEW_SLUG (upper case, hyphens to underscores), for constants;
#   Keel  -> NewSlug (PascalCase from the slug), for namespaces and prefixes;
#   keel  -> new-slug, for the text domain, handles and paths;
# and renames src/css/keel.css to src/css/<new-slug>.css.
set -euo pipefail

if [ $# -lt 2 ] || [ $# -gt 3 ]; then
	echo "usage: bin/rename.sh <new-slug> \"<New Name>\" [--dry-run]" >&2
	exit 2
fi

slug=$1
name=$2
dry=0
if [ $# -eq 3 ]; then
	[ "$3" = "--dry-run" ] || { echo "unknown option: $3" >&2; exit 2; }
	dry=1
fi

if ! printf '%s' "$slug" | grep -Eq '^[a-z][a-z0-9-]*$'; then
	echo "invalid slug: $slug (use lowercase letters, digits and hyphens, starting with a letter)" >&2
	exit 2
fi

upper=$(printf '%s' "$slug" | tr 'a-z-' 'A-Z_')
pascal=$(printf '%s' "$slug" | awk -F- '{ for (i = 1; i <= NF; i++) printf "%s%s", toupper(substr($i, 1, 1)), substr($i, 2) }')

while IFS= read -r file; do
	case "$file" in
		LICENSE|CHANGELOG.md|docs/*) continue ;;
	esac
	[ -f "$file" ] || continue
	grep -Iq -e 'keel' -e 'Keel' -e 'KEEL' "$file" || continue
	if [ "$dry" -eq 1 ]; then
		echo "would change: $file"
		continue
	fi
	sed -i \
		-e "s/Theme Name: Keel/Theme Name: $name/" \
		-e "s/=== Keel ===/=== $name ===/" \
		-e "s/KEEL/$upper/g" \
		-e "s/Keel/$pascal/g" \
		-e "s/keel/$slug/g" \
		"$file"
done < <(git ls-files)

if [ -f src/css/keel.css ]; then
	if [ "$dry" -eq 1 ]; then
		echo "would rename: src/css/keel.css -> src/css/$slug.css"
	else
		git mv src/css/keel.css "src/css/$slug.css"
	fi
fi

[ "$dry" -eq 1 ] && echo "dry run: nothing changed" || echo "renamed to $slug ($name)"
