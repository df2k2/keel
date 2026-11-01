# Keel child theme

Copy this folder to `wp-content/themes/keel-child` next to the parent and activate it. The parent's
compiled stylesheet, block styles, patterns, templates and scripts keep working; this folder only
adds or overrides.

- `theme.json` here merges over the parent's: this example recolours `primary`. Keep the parent's
  palette slugs so patterns keep their meaning, and run the parent's `npm run check:contrast`
  against your values. The parent ships three font families, `body`, `display` and `serif`
  (Fraunces), so a child can set headings in the serif without redeclaring any font file.
- Drop files into `templates/`, `parts/` or `patterns/` to override the parent's by name.
- Add a `functions.php` only for hooks; the parent already enqueues everything it needs.
- Translations for the `keel-child` text domain go in `languages/`.

## What a child usually overrides

- `parts/header-actions.html` (the example here): the search and call-to-action buttons every
  header shows. The sticky header pulls this part in, so a child changes the buttons without
  copying a header.
- `parts/header.html`, `parts/footer.html`, `parts/announcement-bar.html`,
  `parts/mobile-cta-bar.html` and `parts/footer-minimal.html`: Keel's versions carry sample copy and
  a sample phone number. To make the site's own `header` part stick or sit over a cover, give its
  root block the class `keel-header--sticky` or `keel-header--transparent`; Keel keeps the class and
  wires the scroll behaviour. The `keel_header_part_classes` filter does the same from PHP.
- Headings in another family: set `styles.elements.heading.typography.fontFamily` in `theme.json`
  to the family's preset and Keel preloads that family's roman face instead of the display one
  (`keel_preload_font_slugs` filters the list).
- Nothing in Keel calls another host: the author box and the comments part show no avatar, so a
  child that keeps them keeps that promise.
