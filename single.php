<?php
/**
 * Single Post Template — single.php
 * Place in your active theme directory: wp-content/themes/your-theme/single.php
 *
 * Features:
 *  - Full-width hero with featured image or gradient fallback
 *  - Post meta (author, date, category, read time)
 *  - Sticky table of contents (JS-generated from H2/H3 headings)
 *  - Post content with WordPress the_content()
 *  - Author bio box
 *  - Social share buttons (native Web Share API + fallback links)
 *  - Post tags
 *  - Related posts (same category)
 *  - Previous / Next post navigation
 *  - Comments section (wp_list_comments + comment_form)
 *  - Matching sidebar (search, categories, recent posts, tags, CTA)
 */

get_header();

// ── helpers ────────────────────────────────────────────────────────────────
$read_time   = ceil( str_word_count( strip_tags( get_the_content() ) ) / 200 );
$categories  = get_the_category();
$primary_cat = $categories ? $categories[0] : null;
$author_id   = get_the_author_meta( 'ID' );
?>

<!-- =====================================================================
     INLINE STYLES  (move to style.css / child-theme stylesheet in prod)
     ===================================================================== -->
<style>
/* ── Reset / base ─────────────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

/* ── CSS variables (inherit from theme or define here as fallback) ── */
:root {
  --yellow   : #F5C400;
  --black    : #111111;
  --off-white: #FAFAF8;
  --mid-grey : #888888;
  --light-grey:#E8E8E8;
  --text     : #1A1A1A;
  --text-body: #3D3D3D;
  --radius   : 6px;
  --max-prose   : 740px;
}


/* ── Container ────────────────────────────────────────────────── */
.sp-container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

/* ════════════════════════════════════════════════════════════════
   POST HERO
   ════════════════════════════════════════════════════════════════ */
.sp-hero {
  position: relative;
  min-height: 520px;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  background: var(--black);
}
.sp-hero-bg {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, #F5C400, #FF8C00);
  z-index: 0;
}
.sp-hero-bg img {
  width: 100%; height: 100%;
  object-fit: cover;
  opacity: 0.55;
}
/* Dark gradient overlay so text is always legible */
.sp-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,.85) 0%, rgba(0,0,0,.25) 55%, transparent 100%);
  z-index: 1;
}
.sp-hero-inner {
  position: relative;
  z-index: 2;
  padding: 60px 0 56px;
  width: 100%;
}
.sp-hero-breadcrumb {
  font-family: var(--font-body);
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--yellow);
  margin-bottom: 18px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.sp-hero-breadcrumb a { color: rgba(255,255,255,.6); text-decoration: none; }
.sp-hero-breadcrumb a:hover { color: var(--yellow); }
.sp-hero-breadcrumb span { color: rgba(255,255,255,.35); }
.sp-cat-badge {
  display: inline-block;
  background: var(--yellow);
  color: var(--black);
  font-family: var(--font-body);
  font-size: 0.65rem;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  padding: 5px 12px;
  border-radius: 3px;
  margin-bottom: 16px;
  text-decoration: none;
}
.sp-hero-title {
  font-family: var(--font-display);
  font-size: clamp(2rem, 4.5vw, 3.2rem);
  font-weight: 900;
  color: #fff;
  line-height: 1.15;
  max-width: 800px;
  margin-bottom: 20px;
}
.sp-hero-meta {
  display: flex;
  align-items: center;
  gap: 20px;
  flex-wrap: wrap;
  font-family: var(--font-body);
  font-size: 0.82rem;
  color: rgba(255,255,255,.7);
}
.sp-hero-meta .sep { color: rgba(255,255,255,.25); }
.sp-hero-meta a { color: rgba(255,255,255,.7); text-decoration: none; }
.sp-hero-meta a:hover { color: var(--yellow); }
.sp-author-avatar {
  width: 36px; height: 36px;
  border-radius: 50%;
  border: 2px solid var(--yellow);
  object-fit: cover;
  vertical-align: middle;
  margin-right: 8px;
}

/* ════════════════════════════════════════════════════════════════
   MAIN LAYOUT
   ════════════════════════════════════════════════════════════════ */
.sp-main { padding: 56px 0 80px; background: var(--off-white); }
.sp-layout {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 56px;
  align-items: start;
}
@media (max-width: 980px) { .sp-layout { grid-template-columns: 1fr; } }

/* ════════════════════════════════════════════════════════════════
   ARTICLE CONTENT
   ════════════════════════════════════════════════════════════════ */
.sp-article { background: #fff; border-radius: var(--radius); overflow: hidden; }

/* Share bar */
.sp-share-bar {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 16px 36px;
  border-bottom: 1px solid var(--light-grey);
  flex-wrap: wrap;
}
.sp-share-label {
  font-family: var(--font-body);
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--mid-grey);
  margin-right: 4px;
}
.sp-share-btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-family: var(--font-body);
  font-size: 0.78rem;
  font-weight: 600;
  padding: 6px 14px;
  border-radius: 20px;
  border: 1.5px solid var(--light-grey);
  background: #fff;
  color: var(--text);
  cursor: pointer;
  text-decoration: none;
  transition: background .15s, border-color .15s, color .15s;
}
.sp-share-btn:hover { background: var(--yellow); border-color: var(--yellow); color: var(--black); }
.sp-share-btn.native { background: var(--black); border-color: var(--black); color: #fff; }
.sp-share-btn.native:hover { background: var(--yellow); border-color: var(--yellow); color: var(--black); }

/* Prose */
.sp-prose { padding: 40px 36px 48px; max-width: var(--max-prose); }
@media (max-width: 600px) { .sp-prose { padding: 28px 20px 36px; } }

.sp-prose p,
.sp-prose li,
.sp-prose blockquote {
  font-family: var(--font-body);
  font-size: 1.05rem;
  line-height: 1.85;
  color: var(--text-body);
  margin-bottom: 1.4em;
}
.sp-prose h2 {
  font-family: var(--font-display);
  font-size: 1.7rem;
  font-weight: 700;
  color: var(--text);
  margin: 2em 0 0.6em;
  line-height: 1.25;
  padding-top: 8px;
  border-top: 3px solid var(--yellow);
}
.sp-prose h3 {
  font-family: var(--font-display);
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--text);
  margin: 1.6em 0 0.5em;
}
.sp-prose h4 {
  font-family: var(--font-body);
  font-size: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text);
  margin: 1.4em 0 0.4em;
}
.sp-prose a { color: var(--black); text-decoration: underline; text-decoration-color: var(--yellow); text-underline-offset: 3px; }
.sp-prose a:hover { color: var(--yellow); }
.sp-prose ul, .sp-prose ol { padding-left: 1.4em; margin-bottom: 1.4em; }
.sp-prose li { margin-bottom: 0.4em; }
.sp-prose blockquote {
  border-left: 4px solid var(--yellow);
  padding: 4px 0 4px 20px;
  color: #555;
  font-style: italic;
}
.sp-prose img {
  max-width: 100%;
  border-radius: var(--radius);
  margin: 1.5em 0;
  display: block;
}
.sp-prose figure { margin: 2em 0; }
.sp-prose figcaption {
  font-family: var(--font-body);
  font-size: 0.8rem;
  color: var(--mid-grey);
  text-align: center;
  margin-top: -0.5em;
}
.sp-prose hr {
  border: none;
  border-top: 2px solid var(--light-grey);
  margin: 2.5em 0;
}
.sp-prose pre {
  background: var(--black);
  color: #e8e8e8;
  padding: 20px 24px;
  border-radius: var(--radius);
  overflow-x: auto;
  font-size: 0.875rem;
  margin-bottom: 1.4em;
}
.sp-prose code {
  background: #f2f2f0;
  font-size: 0.875em;
  padding: 2px 6px;
  border-radius: 3px;
}
.sp-prose pre code { background: none; padding: 0; }
/* WP alignments */
.sp-prose .alignleft  { float: left; margin: 0 24px 16px 0; }
.sp-prose .alignright { float: right; margin: 0 0 16px 24px; }
.sp-prose .aligncenter { display: block; margin: 0 auto 1.4em; }
.sp-prose .wp-block-image { margin: 2em 0; }
.sp-prose .wp-caption-text { font-family: var(--font-body); font-size: 0.8rem; color: var(--mid-grey); }

/* Tags */
.sp-tags-row {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
  padding: 0 36px 36px;
}
.sp-tags-label {
  font-family: var(--font-body);
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--mid-grey);
}
.sp-tag {
  background: #f5f5f3;
  border: 1.5px solid var(--light-grey);
  font-family: var(--font-body);
  font-size: 0.78rem;
  font-weight: 600;
  padding: 4px 12px;
  border-radius: 20px;
  text-decoration: none;
  color: var(--text);
  transition: background .15s, border-color .15s;
}
.sp-tag:hover { background: var(--yellow); border-color: var(--yellow); }

/* ════════════════════════════════════════════════════════════════
   AUTHOR BIO
   ════════════════════════════════════════════════════════════════ */
.sp-author-bio {
  display: flex;
  gap: 24px;
  align-items: flex-start;
  background: #fff;
  border: 2px solid var(--light-grey);
  border-left: 5px solid var(--yellow);
  border-radius: var(--radius);
  padding: 28px 28px;
  margin-top: 32px;
}
.sp-author-bio-avatar {
  width: 72px; height: 72px;
  border-radius: 50%;
  object-fit: cover;
  flex-shrink: 0;
  border: 3px solid var(--yellow);
}
.sp-author-bio-avatar-placeholder {
  width: 72px; height: 72px;
  border-radius: 50%;
  background: var(--yellow);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.8rem;
  flex-shrink: 0;
}
.sp-author-bio-name {
  font-family: var(--font-display);
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 4px;
}
.sp-author-bio-role {
  font-family: var(--font-body);
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--mid-grey);
  margin-bottom: 10px;
}
.sp-author-bio-desc {
  font-family: var(--font-body);
  font-size: 0.9rem;
  line-height: 1.7;
  color: #555;
}

/* ════════════════════════════════════════════════════════════════
   POST NAVIGATION
   ════════════════════════════════════════════════════════════════ */
.sp-post-nav {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin-top: 32px;
}
@media (max-width: 560px) { .sp-post-nav { grid-template-columns: 1fr; } }
.sp-nav-link {
  display: flex;
  flex-direction: column;
  gap: 6px;
  padding: 20px 22px;
  background: #fff;
  border: 2px solid var(--light-grey);
  border-radius: var(--radius);
  text-decoration: none;
  transition: border-color .15s, background .15s;
}
.sp-nav-link:hover { border-color: var(--yellow); background: #fffcee; }
.sp-nav-link.next { text-align: right; }
.sp-nav-dir {
  font-family: var(--font-body);
  font-size: 0.68rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  color: var(--mid-grey);
}
.sp-nav-title {
  font-family: var(--font-display);
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--text);
  line-height: 1.35;
}

/* ════════════════════════════════════════════════════════════════
   RELATED POSTS
   ════════════════════════════════════════════════════════════════ */
.sp-related { margin-top: 48px; }
.sp-section-title {
  font-family: var(--font-display);
  font-size: 1.35rem;
  font-weight: 700;
  margin-bottom: 20px;
  color: var(--text);
  display: flex;
  align-items: center;
  gap: 12px;
}
.sp-section-title::after {
  content: '';
  flex: 1;
  height: 2px;
  background: var(--light-grey);
}
.sp-related-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}
@media (max-width: 720px) { .sp-related-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 480px) { .sp-related-grid { grid-template-columns: 1fr; } }
.sp-related-card {
  background: #fff;
  border: 2px solid var(--light-grey);
  border-radius: var(--radius);
  overflow: hidden;
  text-decoration: none;
  display: block;
  transition: transform .2s, box-shadow .2s;
}
.sp-related-card:hover { transform: translateY(-4px); box-shadow: 0 10px 28px rgba(0,0,0,.09); }
.sp-related-thumb {
  height: 130px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 3rem;
  background: linear-gradient(135deg, #F5C400, #FF8C00);
  position: relative;
  overflow: hidden;
}
.sp-related-thumb img { width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0; }
.sp-related-body { padding: 14px 16px 18px; }
.sp-related-cat {
  font-family: var(--font-body);
  font-size: 0.65rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--mid-grey);
  margin-bottom: 5px;
}
.sp-related-title {
  font-family: var(--font-display);
  font-size: 0.92rem;
  font-weight: 700;
  line-height: 1.35;
  color: var(--text);
}
.sp-related-date {
  font-family: var(--font-body);
  font-size: 0.72rem;
  color: var(--mid-grey);
  margin-top: 8px;
}

/* ════════════════════════════════════════════════════════════════
   COMMENTS
   ════════════════════════════════════════════════════════════════ */
.sp-comments { margin-top: 48px; }
.comment-list { list-style: none; padding: 0; }
.comment-list .comment {
  border: 2px solid var(--light-grey);
  border-radius: var(--radius);
  padding: 22px 24px;
  background: #fff;
  margin-bottom: 16px;
}
.comment-list .children { margin-top: 16px; padding-left: 32px; }
.comment-author { display: flex; align-items: center; gap: 12px; margin-bottom: 10px; }
.comment-author img { border-radius: 50%; border: 2px solid var(--yellow); }
.fn { font-family: var(--font-body); font-weight: 700; font-size: 0.9rem; }
.comment-meta { font-family: var(--font-body); font-size: 0.75rem; color: var(--mid-grey); }
.comment-content p { font-family: var(--font-body); font-size: 0.92rem; line-height: 1.7; color: var(--text-body); margin: 0; }
.comment-reply-link {
  font-family: var(--font-body);
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--mid-grey);
  text-decoration: none;
  margin-top: 10px;
  display: inline-block;
}
.comment-reply-link:hover { color: var(--black); }

/* Comment form */
#respond { background: #fff; border: 2px solid var(--light-grey); border-radius: var(--radius); padding: 32px 28px; margin-top: 24px; }
#respond h3 { font-family: var(--font-display); font-size: 1.35rem; font-weight: 700; margin-bottom: 20px; }
.comment-form label { font-family: var(--font-body); font-size: 0.78rem; font-weight: 600; display: block; margin-bottom: 5px; color: var(--text); }
.comment-form input[type="text"],
.comment-form input[type="email"],
.comment-form input[type="url"],
.comment-form textarea {
  width: 100%;
  border: 2px solid var(--light-grey);
  border-radius: var(--radius);
  padding: 10px 14px;
  font-family: var(--font-body);
  font-size: 0.9rem;
  margin-bottom: 16px;
  outline: none;
  transition: border-color .15s;
}
.comment-form input:focus,
.comment-form textarea:focus { border-color: var(--yellow); }
.comment-form textarea { min-height: 130px; resize: vertical; }
.comment-form-fields { display: grid; grid-template-columns: 1fr 1fr; gap: 0 16px; }
@media (max-width: 560px) { .comment-form-fields { grid-template-columns: 1fr; } }
.comment-form .form-submit input[type="submit"] {
  background: var(--yellow);
  color: var(--black);
  font-family: var(--font-body);
  font-weight: 700;
  font-size: 0.9rem;
  padding: 12px 28px;
  border: none;
  border-radius: var(--radius);
  cursor: pointer;
  transition: opacity .15s;
}
.comment-form .form-submit input[type="submit"]:hover { opacity: .82; }

/* ════════════════════════════════════════════════════════════════
   TABLE OF CONTENTS (sticky)
   ════════════════════════════════════════════════════════════════ */
.sp-toc {
  background: #fff;
  border: 2px solid var(--light-grey);
  border-top: 4px solid var(--yellow);
  border-radius: var(--radius);
  padding: 22px 22px 20px;
  position: sticky;
  top: 24px;
}
.sp-toc-title {
  font-family: var(--font-body);
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--mid-grey);
  margin-bottom: 14px;
}
.sp-toc-list { list-style: none; }
.sp-toc-list li { margin-bottom: 2px; }
.sp-toc-list a {
  font-family: var(--font-body);
  font-size: 0.82rem;
  font-weight: 500;
  color: var(--text-body);
  text-decoration: none;
  padding: 5px 8px;
  display: block;
  border-radius: 4px;
  border-left: 2px solid transparent;
  transition: background .12s, border-color .12s, color .12s;
}
.sp-toc-list a:hover,
.sp-toc-list a.active {
  background: #fffcee;
  border-left-color: var(--yellow);
  color: var(--black);
}
.sp-toc-list .sp-toc-h3 a { padding-left: 20px; font-size: 0.77rem; color: var(--mid-grey); }

/* ════════════════════════════════════════════════════════════════
   SIDEBAR WIDGETS
   ════════════════════════════════════════════════════════════════ */
.sp-sidebar { display: flex; flex-direction: column; gap: 28px; }
.sp-widget {
  background: #fff;
  border: 2px solid var(--light-grey);
  border-radius: var(--radius);
  padding: 22px 22px;
}
.sp-widget-title {
  font-family: var(--font-body);
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--black);
  border-bottom: 2px solid var(--yellow);
  padding-bottom: 10px;
  margin-bottom: 16px;
}
.sp-sidebar-cats { display: flex; flex-direction: column; }
.sp-sidebar-cat {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 8px 0;
  border-bottom: 1px solid #f0f0f0;
  font-family: var(--font-body);
  font-size: 0.85rem;
}
.sp-sidebar-cat:last-child { border-bottom: none; }
.sp-sidebar-cat a { text-decoration: none; color: var(--text); }
.sp-sidebar-cat a:hover { color: var(--yellow); }
.sp-cat-count {
  background: #f5f5f3;
  font-size: 0.7rem;
  font-weight: 700;
  padding: 2px 7px;
  border-radius: 10px;
  color: var(--mid-grey);
}
.sp-sidebar-recent { display: flex; flex-direction: column; gap: 12px; }
.sp-sidebar-post { display: flex; gap: 10px; align-items: flex-start; text-decoration: none; }
.sp-sidebar-thumb {
  width: 50px; height: 50px;
  border-radius: 5px;
  flex-shrink: 0;
  overflow: hidden;
  background: linear-gradient(135deg, #F5C400, #FF8C00);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
}
.sp-sidebar-thumb img { width: 100%; height: 100%; object-fit: cover; }
.sp-sidebar-post-title { font-family: var(--font-body); font-size: 0.8rem; font-weight: 600; color: var(--text); line-height: 1.4; }
.sp-sidebar-post:hover .sp-sidebar-post-title { color: var(--yellow); }
.sp-sidebar-post-date { font-family: var(--font-body); font-size: 0.72rem; color: var(--mid-grey); margin-top: 3px; }
.sp-sidebar-tags { display: flex; flex-wrap: wrap; gap: 7px; }
.sp-sidebar-tag {
  background: #f5f5f3;
  border: 1.5px solid var(--light-grey);
  font-family: var(--font-body);
  font-size: 0.75rem;
  font-weight: 600;
  padding: 3px 10px;
  border-radius: 20px;
  text-decoration: none;
  color: var(--text);
  transition: background .12s, border-color .12s;
}
.sp-sidebar-tag:hover { background: var(--yellow); border-color: var(--yellow); }


/* ════════════════════════════════════════════════════════════════
   CTA BANNER
   ════════════════════════════════════════════════════════════════ */
.sp-cta-banner { background: var(--yellow); padding: 60px 0; }
.sp-cta-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 32px;
  flex-wrap: wrap;
}
.sp-cta-title { font-family: var(--font-display); font-size: 1.85rem; font-weight: 800; color: var(--black); margin-bottom: 6px; }
.sp-cta-sub { font-family: var(--font-body); color: rgba(0,0,0,.6); font-size: 1rem; }
.sp-cta-btns { display: flex; gap: 12px; flex-shrink: 0; flex-wrap: wrap; }
.btn-blk {
  background: var(--black);
  color: #fff;
  font-family: var(--font-body);
  font-weight: 700;
  padding: 12px 24px;
  border-radius: var(--radius);
  text-decoration: none;
  font-size: 0.9rem;
}
.btn-outl {
  border: 2px solid var(--black);
  color: var(--black);
  font-family: var(--font-body);
  font-weight: 700;
  padding: 10px 24px;
  border-radius: var(--radius);
  text-decoration: none;
  font-size: 0.9rem;
}
.btn-blk:hover, .btn-outl:hover { opacity: .78; }

/* ════════════════════════════════════════════════════════════════
   PROGRESS BAR
   ════════════════════════════════════════════════════════════════ */
.sp-progress-bar {
  position: fixed;
  top: 0; left: 0;
  height: 3px;
  width: 0%;
  background: var(--yellow);
  z-index: 9999;
  transition: width .1s linear;
}
</style>

<!-- Reading progress bar -->
<div class="sp-progress-bar" id="sp-progress"></div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- =====================================================================
     HERO
     ===================================================================== -->
<section class="sp-hero">
  <div class="sp-hero-bg">
    <?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail( 'full' ); ?>
    <?php endif; ?>
  </div>

  <div class="sp-hero-inner">
    <div class="sp-container">

      <!-- Breadcrumb -->
      <nav class="sp-hero-breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <span>›</span>
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Blog</a>
        <?php if ( $primary_cat ) : ?>
          <span>›</span>
          <a href="<?php echo esc_url( get_category_link( $primary_cat->term_id ) ); ?>">
            <?php echo esc_html( $primary_cat->name ); ?>
          </a>
        <?php endif; ?>
      </nav>

      <?php if ( $primary_cat ) : ?>
        <a href="<?php echo esc_url( get_category_link( $primary_cat->term_id ) ); ?>" class="sp-cat-badge">
          <?php echo esc_html( $primary_cat->name ); ?>
        </a>
      <?php endif; ?>

      <h1 class="sp-hero-title"><?php the_title(); ?></h1>

      <div class="sp-hero-meta">
        <span>By Admin</span>
        <span class="sep">·</span>
        <span>📅 <?php echo get_the_date(); ?></span>
        <span class="sep">·</span>
        <span>⏱ <?php echo $read_time; ?> min read</span>
        <?php
        $comment_count = get_comments_number();
        if ( $comment_count > 0 ) : ?>
          <span class="sep">·</span>
          <span>💬 <?php echo $comment_count; ?> comment<?php echo $comment_count != 1 ? 's' : ''; ?></span>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<!-- =====================================================================
     MAIN
     ===================================================================== -->
<main class="sp-main" id="sp-main">
  <div class="sp-container">
    <div class="sp-layout">

      <!-- ── LEFT COLUMN: Article ──────────────────────────────────── -->
      <div>

        <article class="sp-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <!-- Share bar -->
          <div class="sp-share-bar">
            <span class="sp-share-label">Share:</span>

            <!-- Native share (mobile) -->
            <button class="sp-share-btn native" id="sp-native-share"
                    data-url="<?php the_permalink(); ?>"
                    data-title="<?php echo esc_attr( get_the_title() ); ?>"
                    style="display:none;">
              ↑ Share
            </button>

            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_the_permalink() ); ?>"
               target="_blank" rel="noopener" class="sp-share-btn">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
              Facebook
            </a>

            <!-- Twitter / X -->
            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_the_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>"
               target="_blank" rel="noopener" class="sp-share-btn">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
              X
            </a>

            <!-- WhatsApp -->
            <a href="https://wa.me/?text=<?php echo urlencode( get_the_title() . ' ' . get_the_permalink() ); ?>"
               target="_blank" rel="noopener" class="sp-share-btn">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
              WhatsApp
            </a>

            <!-- Copy link -->
            <button class="sp-share-btn" id="sp-copy-link"
                    data-url="<?php the_permalink(); ?>">
              🔗 Copy Link
            </button>
          </div>

          <!-- Post content -->
          <div class="sp-prose" id="sp-prose">
            <?php the_content(); ?>
            <?php
            // Paginated posts
            wp_link_pages( [
              'before'      => '<div class="page-links"><span class="page-links-title">Pages:</span>',
              'after'       => '</div>',
              'link_before' => '<span>',
              'link_after'  => '</span>',
            ] );
            ?>
          </div>

          <!-- Tags -->
          <?php $post_tags = get_the_tags(); if ( $post_tags ) : ?>
          <div class="sp-tags-row">
            <span class="sp-tags-label">Tags:</span>
            <?php foreach ( $post_tags as $tag ) : ?>
              <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="sp-tag">
                <?php echo esc_html( $tag->name ); ?>
              </a>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>

        </article>

        <!-- Prev / Next Navigation -->
        <nav class="sp-post-nav" aria-label="Post navigation">
          <?php
          $prev_post = get_previous_post();
          $next_post = get_next_post();
          ?>
          <?php if ( $prev_post ) : ?>
            <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="sp-nav-link prev">
              <span class="sp-nav-dir">← Previous Post</span>
              <span class="sp-nav-title"><?php echo esc_html( wp_trim_words( $prev_post->post_title, 10, '…' ) ); ?></span>
            </a>
          <?php else : ?>
            <div></div>
          <?php endif; ?>

          <?php if ( $next_post ) : ?>
            <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="sp-nav-link next">
              <span class="sp-nav-dir">Next Post →</span>
              <span class="sp-nav-title"><?php echo esc_html( wp_trim_words( $next_post->post_title, 10, '…' ) ); ?></span>
            </a>
          <?php endif; ?>
        </nav>

        <!-- Related Posts -->
        <?php
        $related = new WP_Query( [
          'category__in'   => wp_get_post_categories( get_the_ID() ),
          'post__not_in'   => [ get_the_ID() ],
          'posts_per_page' => 3,
          'orderby'        => 'rand',
          'post_status'    => 'publish',
        ] );
        if ( $related->have_posts() ) :
        ?>
        <section class="sp-related" aria-label="Related Posts">
          <h2 class="sp-section-title">Related Posts</h2>
          <div class="sp-related-grid">
            <?php while ( $related->have_posts() ) : $related->the_post();
              $r_cats = get_the_category();
            ?>
            <a href="<?php the_permalink(); ?>" class="sp-related-card">
              <div class="sp-related-thumb">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'medium' ); ?>
                <?php else : ?>
                  <span>🗺</span>
                <?php endif; ?>
              </div>
              <div class="sp-related-body">
                <?php if ( $r_cats ) : ?>
                  <div class="sp-related-cat"><?php echo esc_html( $r_cats[0]->name ); ?></div>
                <?php endif; ?>
                <div class="sp-related-title"><?php the_title(); ?></div>
                <div class="sp-related-date">📅 <?php echo get_the_date( 'j M Y' ); ?></div>
              </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </section>
        <?php endif; ?>

        <!-- Comments -->
        <?php if ( comments_open() || get_comments_number() ) : ?>
        <section class="sp-comments" id="comments">
          <h2 class="sp-section-title">
            <?php
            $count = get_comments_number();
            echo $count > 0
              ? $count . ' Comment' . ( $count != 1 ? 's' : '' )
              : 'Leave a Comment';
            ?>
          </h2>
          <?php
          wp_list_comments( [
            'style'       => 'div',
            'short_ping'  => true,
            'avatar_size' => 44,
            'walker'      => null,
          ] );
          comment_form( [
            'title_reply'         => 'Leave a Reply',
            'label_submit'        => 'Post Comment',
            'comment_notes_before'=> '',
            'comment_notes_after' => '',
          ] );
          ?>
        </section>
        <?php endif; ?>

      </div><!-- /left column -->

      <!-- ── RIGHT COLUMN: Sidebar ─────────────────────────────────── -->
    <aside class="blog-sidebar">
        <!-- Categories -->
        <div class="sidebar-widget">
          <h3 class="sidebar-widget-title">Categories</h3>
          <div class="sidebar-cats">
            <?php
            $categories = get_categories( [
              'orderby'    => 'count',
              'order'      => 'DESC',
              'hide_empty' => true,
              'number'     => 8,
            ] );
            foreach ( $categories as $cat ) :
            ?>
            <div class="sidebar-cat">
              <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                 style="text-decoration:none;color:inherit;flex:1;">
                <?php echo esc_html( $cat->name ); ?>
              </a>
              <span class="sidebar-cat-count"><?php echo $cat->count; ?></span>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Recent Posts -->
        <div class="sidebar-widget">
          <h3 class="sidebar-widget-title">Recent Posts</h3>
          <div class="sidebar-recent">
            <?php
            $recent_posts = wp_get_recent_posts( [
              'numberposts' => 4,
              'post_status' => 'publish',
            ] );
            foreach ( $recent_posts as $rp ) :
              $thumb_id  = get_post_thumbnail_id( $rp['ID'] );
              $thumb_url = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'thumbnail' ) : '';
            ?>
            <div class="sidebar-post">
              <a href="<?php echo get_permalink( $rp['ID'] ); ?>" class="sidebar-post-thumb"
                 style="<?php echo $thumb_url ? '' : 'background:linear-gradient(135deg,#F5C400,#FF8C00);'; ?>">
                <?php if ( $thumb_url ) : ?>
                  <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $rp['post_title'] ); ?>"/>
                <?php else : ?>
                  🗺
                <?php endif; ?>
              </a>
              <div>
                <div class="sidebar-post-title">
                  <a href="<?php echo get_permalink( $rp['ID'] ); ?>"
                     style="text-decoration:none;color:inherit;">
                    <?php echo esc_html( wp_trim_words( $rp['post_title'], 8, '…' ) ); ?>
                  </a>
                </div>
                <div class="sidebar-post-date">
                  <?php echo get_the_date( 'j F Y', $rp['ID'] ); ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Popular Tags -->
        <div class="sidebar-widget">
          <h3 class="sidebar-widget-title">Popular Tags</h3>
          <div class="sidebar-tags">
            <?php
            $tags = get_tags( [
              'orderby' => 'count',
              'order'   => 'DESC',
              'number'  => 12,
            ] );
            foreach ( $tags as $tag ) :
            ?>
            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
               class="sidebar-tag" style="text-decoration:none;">
              <?php echo esc_html( $tag->name ); ?>
            </a>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- CTA Widget -->
        <div class="sp-widget sb-cta-widget">
          <h3 class="sb-widget-title">Plan Your Trip</h3>
          <p>Ready to explore? Get a free, personalised travel quote from our expert team.</p>
          <a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="btn-sb-cta">
            Get Free Quote →
          </a>
        </div>

        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
          <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        <?php endif; ?>

      </aside>

    </div><!-- /sp-layout -->
  </div><!-- /sp-container -->
</main>

<?php endwhile; endif; ?>

<!-- =====================================================================
     CTA BANNER
     ===================================================================== -->
<section class="sp-cta-banner">
  <div class="sp-container">
    <div class="sp-cta-inner">
      <div>
        <h2 class="sp-cta-title">Inspired to Travel? Let's Plan Your Trip!</h2>
        <p class="sp-cta-sub">Our team is ready to turn your travel dreams into a well-organised, stress-free journey.</p>
      </div>
      <div class="sp-cta-btns">
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn-blk">Start Planning →</a>
        <a href="<?php echo esc_url( home_url( '/tours' ) ); ?>" class="btn-outl">View Packages</a>
      </div>
    </div>
  </div>
</section>

<!-- =====================================================================
     JAVASCRIPT
     ===================================================================== -->
<script>
(function () {

  /* ── 1. Reading progress bar ─────────────────────────────────── */
  const bar = document.getElementById('sp-progress');
  if (bar) {
    window.addEventListener('scroll', () => {
      const scrolled = window.scrollY;
      const total    = document.body.scrollHeight - window.innerHeight;
      bar.style.width = total > 0 ? (scrolled / total * 100) + '%' : '0%';
    });
  }

  /* ── 2. Auto Table of Contents ───────────────────────────────── */
  const prose   = document.getElementById('sp-prose');
  const tocWrap = document.getElementById('sp-toc');
  const tocList = document.getElementById('sp-toc-list');

  if (prose && tocWrap && tocList) {
    const headings = prose.querySelectorAll('h2, h3');
    if (headings.length > 2) {
      headings.forEach((h, i) => {
        if (!h.id) h.id = 'sp-heading-' + i;
        const li = document.createElement('li');
        li.className = h.tagName === 'H3' ? 'sp-toc-h3' : '';
        const a = document.createElement('a');
        a.href = '#' + h.id;
        a.textContent = h.textContent;
        a.addEventListener('click', e => {
          e.preventDefault();
          h.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
        li.appendChild(a);
        tocList.appendChild(li);
      });
      tocWrap.style.display = 'block';

      // Highlight active heading on scroll
      const tocLinks = tocList.querySelectorAll('a');
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            tocLinks.forEach(l => l.classList.remove('active'));
            const active = tocList.querySelector('a[href="#' + entry.target.id + '"]');
            if (active) active.classList.add('active');
          }
        });
      }, { rootMargin: '0px 0px -70% 0px' });

      headings.forEach(h => observer.observe(h));
    }
  }

  /* ── 3. Native share button ──────────────────────────────────── */
  const nativeBtn = document.getElementById('sp-native-share');
  if (nativeBtn && navigator.share) {
    nativeBtn.style.display = 'inline-flex';
    nativeBtn.addEventListener('click', () => {
      navigator.share({
        title : nativeBtn.dataset.title,
        url   : nativeBtn.dataset.url,
      }).catch(() => {});
    });
  }

  /* ── 4. Copy link button ─────────────────────────────────────── */
  const copyBtn = document.getElementById('sp-copy-link');
  if (copyBtn) {
    copyBtn.addEventListener('click', () => {
      navigator.clipboard.writeText(copyBtn.dataset.url).then(() => {
        const orig = copyBtn.textContent;
        copyBtn.textContent = '✅ Copied!';
        setTimeout(() => { copyBtn.textContent = orig; }, 2000);
      });
    });
  }

})();
</script>

<?php get_footer(); ?>