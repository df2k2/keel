# Keel child theme

Copy this folder to `wp-content/themes/keel-child` next to the parent and activate it. The parent's
compiled stylesheet, block styles, patterns, templates and scripts keep working; this folder only
adds or overrides.

- `theme.json` here merges over the parent's: this example recolours `primary`. Keep the parent's
  palette slugs so patterns keep their meaning, and run the parent's `npm run check:contrast`
  against your values.
- Drop files into `templates/`, `parts/` or `patterns/` to override the parent's by name.
- Add a `functions.php` only for hooks; the parent already enqueues everything it needs.
- Translations for the `keel-child` text domain go in `languages/`.
