<?php
/**
 * Archive Page Template
 * Place this file in your theme directory as: archive.php
 * Also works as: category.php, tag.php, or index.php
 *
 * Requires: WordPress 5.0+
 * Enqueue styles separately or add the <style> block to your theme's style.css
 */

get_header(); ?>

<!-- =============================================
     INLINE STYLES — move to style.css in production
     ============================================= -->
<style>
/* ---------- Blog Hero ---------- */
/*  */
</style>

<!-- =============================================
     HERO — uses archive title & description
     ============================================= -->
<section class="blog-hero">
  <div class="container">
    <div class="blog-hero-content">
      <p class="section-label">Stories &amp; Tips</p>
      <h1 class="section-title">
        <?php
        // Show archive title: category name, tag name, date, author, etc.
        $archive_title = get_the_archive_title();
        // Wrap the last word (or split at colon for "Category: Foo") in <em>
        if ( strpos( $archive_title, ': ' ) !== false ) {
          $parts = explode( ': ', $archive_title, 2 );
          echo esc_html( $parts[0] ) . ': <em>' . esc_html( $parts[1] ) . '</em>';
        } else {
          echo 'The Travel <em>Journal</em>';
        }
        ?>
      </h1>
      <?php if ( get_the_archive_description() ) : ?>
        <p class="section-subtitle"><?php echo wp_kses_post( get_the_archive_description() ); ?></p>
      <?php else : ?>
        <p class="section-subtitle">Destination guides, travel tips, transport advice, and stories from the road — written by our team of expert travellers.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- =============================================
     BLOG MAIN
     ============================================= -->
<section class="blog-main">
  <div class="container">
    <div class="blog-layout">

      <!-- ---- MAIN CONTENT ---- -->
      <div>

        <?php if ( have_posts() ) : ?>

          <!-- BLOG GRID — all posts in uniform cards -->
          <div class="blog-grid">
            <?php while ( have_posts() ) : the_post();
              $cats      = get_the_category();
              $cat_name  = $cats ? $cats[0]->name : 'Article';
              $read_time = ceil( str_word_count( strip_tags( get_the_content() ) ) / 200 );
            ?>
            <article class="blog-card" id="post-<?php the_ID(); ?>">
              <div class="blog-card-image" style="background: linear-gradient(135deg,#1e7e6b,#0D5C4A);">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'medium' ); ?>
                <?php else : ?>
                  <span><?php echo has_tag() ? '🗺' : '✈'; ?></span>
                <?php endif; ?>
                <span class="blog-card-tag"><?php echo esc_html( $cat_name ); ?></span>
              </div>
              <div class="blog-card-body">
                <h3 class="blog-card-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="blog-card-excerpt">
                  <?php echo wp_trim_words( get_the_excerpt(), 28, '…' ); ?>
                </p>
                <div class="blog-card-meta">
                  <span>📅 <?php echo get_the_date( 'j M Y' ); ?></span>
                  <span>⏱ <?php echo $read_time; ?> min read</span>
                </div>
              </div>
            </article>
            <?php endwhile; ?>
          </div>

          <!-- PAGINATION -->
          <div class="blog-pagination">
            <?php
            echo paginate_links( [
              'prev_text' => '← Prev',
              'next_text' => 'Next →',
            ] );
            ?>
          </div>

        <?php else : ?>

          <!-- NO POSTS FOUND -->
          <div class="blog-grid">
            <div class="blog-no-posts">
              <p style="font-size:3rem;margin-bottom:12px;">📭</p>
              <h3>No posts found</h3>
              <p>There are no articles in this section yet. Check back soon!</p>
            </div>
          </div>

        <?php endif; ?>

      </div><!-- /main content -->

      <!-- ---- SIDEBAR ---- -->
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

    </div><!-- /blog-layout -->
  </div><!-- /container -->
</section>


<?php get_footer(); ?>