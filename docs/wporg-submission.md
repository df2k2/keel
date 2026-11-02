# Submitting Keel to the wordpress.org theme directory

What to do, what to upload, and the notes to paste into the review ticket. Checked against the
Theme Handbook's required rules, the accessibility-ready requirements (last revised May 2026) and
the review process page on 2026-11-02.

## Before you upload

1. **Account.** The `Contributors:` line in `readme.txt` must be a wordpress.org username. It says
   `df2k2`, and `https://profiles.wordpress.org/df2k2/` returned 404 on 2026-11-02: register that
   username or change the line to the account you will upload from.
2. **Zip.** Use the release asset, not a local build: `keel-1.0.0.zip` from
   `https://github.com/df2k2/keel/releases/tag/v1.0.0`. It was built by the release workflow, is
   signed, and carries `src/` beside `build/` as the directory requires for minified files.
3. **Upload** at `https://wordpress.org/themes/upload/`. One theme per author may be in the queue
   at a time. The uploader runs Theme Check first; CI runs the same check on every pull request.
4. **Watch the Trac ticket.** A ticket with no reply from the author for seven days can be closed.
   A reviewer who has not responded within 48 hours of assignment can be asked to return the theme
   to the queue.

## Notes for the review ticket

Paste or adapt these where a reviewer asks.

- **Emoji detection script.** `inc/setup.php` unhooks `print_emoji_detection_script` and the
  emoji styles. The script is presentational (it swaps emoji glyphs for images in browsers without
  emoji fonts, which no supported browser lacks), it is the only inline JavaScript core prints on
  a static page, and Keel's contract is that pages without interactive blocks load no JavaScript
  and are ready for a strict content security policy. The handbook's examples of
  non-presentational hooks are `wp_generator`, `feed_links`, `rsd_link` and `rel_canonical`; none
  of those is touched. If the team still asks, the two `remove_action` calls can be dropped and
  the companion plugin will carry them.
- **Skip link.** Keel prints a plain HTML skip link at `wp_body_open` and unhooks core's, which is
  injected by JavaScript. One link, present without JavaScript, first in tab order, visible on
  focus. The e2e suite asserts it on every page type.
- **Speculation rules.** `inc/speculation.php` uses core's `wp_speculation_rules_configuration`
  filter to switch core's own speculative loading from prefetch to prerender on hover. Nothing is
  added; a core feature is configured through the filter core provides for it.
- **Minified files.** `build/css` and `build/js` are minified by PostCSS and esbuild; the originals
  are in `src/css` and `src/js` inside the zip. `keel-manifest.json` lists every file with its hash.
- **Bundled resources.** Three OFL fonts (Figtree, Bricolage Grotesque, Fraunces) with their
  licences under `assets/fonts/`, icons adapted from Feather (MIT), placeholder SVGs that are
  original GPL work. All credited in `readme.txt` under Copyright. No remote requests of any kind;
  the e2e suite fails on one.
- **Screenshot.** The dental practice home, built only from patterns in the zip, behind a
  five-item menu. The practice is fictional and the patterns say so in their descriptions.
- **Tags.** `post-formats` is backed by `add_theme_support( 'post-formats', ... )` in
  `inc/setup.php`; `style-variations` by the seven files under `styles/`; `blog` by the journal
  templates, post formats and three post templates; `portfolio` by the gallery, before-and-after,
  listing grid and provider profile patterns.

## Accessibility-ready tag

The eighteen requirements and how Keel meets each:

| Requirement | Where |
| --- | --- |
| Skip-to-content link | plain HTML link at `wp_body_open`, visible on focus |
| Landmarks with names | header, nav, main, footer in every template; search forms named after their label; the carousel is a named region |
| Keyboard navigation | e2e keyboard journey: skip link, menu, accordion, carousel, lightbox; mobile menu traps focus and makes the page inert |
| Controls with names, roles, states | dismiss, previous, next and the marquee Pause/Play buttons carry labels; details and tabs are core blocks |
| Form fields labelled | the Search block label is the form's `aria-label`; the contact shell relies on the form plugin's labels |
| Meaningful headings | one `h1` per page, heroes and layouts carry it, every other pattern starts at `h2`; eyebrows are paragraphs |
| Underlined links in text | `theme.json` sets `text-decoration: underline` on content links |
| No ambiguous link text | patterns name their destination in the link text |
| Colour contrast | every pair in `tests/contrast-pairs.json` checked at 4.5:1 text and 3:1 UI by `npm run check:contrast`; Contrast variation at AAA |
| Alternative text | shipped images are decorative placeholders with empty alt or named icons |
| Audio, video, animation | no autoplay media; the carousel moves only on command; the marquee has a Pause button and stops under reduced motion |
| Reflow, resize, text spacing | fluid type and spacing tokens, no fixed heights on text containers |
| No unexpected context changes | no auto-submit, no focus changes on input |
| New-window warning | no links open new windows |
| Hover or focus content | submenus are core Navigation behaviour; the marquee pauses on hover and focus-within |
| Accessibility statement | the `keel/accessibility-statement` pattern and page layout |
| No inaccessible plugins required | the theme recommends none |
| Screen reader text | `.screen-reader-text` styled in `src/css/base.css` |

The tag adds a second review. Submitting without it and adding it in an update is also allowed.

## After approval

- Translations move to translate.wordpress.org; language packs take precedence over the bundled
  `es_ES` files, which can then be removed.
- Updates go through the same upload page: bump `Version:` in `style.css` and `Stable tag:` in
  `readme.txt`, tag the release, upload the new zip. Updates skip the one-theme-at-a-time limit.
