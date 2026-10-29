#!/usr/bin/env bash
# Fails when shipped theme code contains a construct the security design forbids.
# Usage: bin/check-forbidden.sh [path ...]   (default: the shipped PHP and JavaScript sources)
set -uo pipefail
cd "$(dirname "$0")/.."
paths=("$@")
[ ${#paths[@]} -eq 0 ] && paths=(functions.php inc patterns templates parts src/js)
pattern='\beval\s*\(|\bunserialize\s*\(|\bextract\s*\(|\b(include|require)(_once)?\s*\(?\s*\$|\bfile_put_contents\s*\(|\bfopen\s*\(|\bwp_remote_|\$_(GET|POST|REQUEST|SERVER|COOKIE|FILES)\b|\bcreate_function\b|\bbase64_decode\s*\(|new Function\b|\.innerHTML\s*='
if grep -rnE --include='*.php' --include='*.js' --include='*.html' "$pattern" "${paths[@]}"; then
	echo "Forbidden constructs found." >&2
	exit 1
fi
echo "No forbidden constructs in: ${paths[*]}"
