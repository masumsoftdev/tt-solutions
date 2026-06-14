
<?php get_header(); ?>


<!-- ══════════════ HERO ══════════════ -->
<section class="hero" aria-labelledby="hero-title">
  <div class="hero-bg-pattern" aria-hidden="true"></div>
  <div class="hero-image-overlay" aria-hidden="true">
    <div class="hero-emoji-bg">
      <span>✈️</span><span>🚍</span><span>🗺</span>
      <span>🚢</span><span>🌍</span><span>🏨</span>
      <span>🎫</span><span>⛵</span><span>🏝</span>
    </div>
    <span style="font-size:10rem;position:relative;z-index:1;filter:drop-shadow(0 20px 40px rgba(0,0,0,0.4));">🚍</span>
  </div>

  <div class="hero-badge" aria-hidden="true">😊 Travel with Smile</div>

  <div class="hero-content">
    <div class="container">
      <div class="hero-inner">
        <div class="hero-text">
          <p class="hero-eyebrow"><span class="hero-eyebrow-line"></span>Complete Travel & Transport Management</p>
          <h1 class="hero-title" id="hero-title">
            <span class="italic-line">Tour & Transport</span>
            <span class="highlight">Solution</span>
            <span style="color:rgba(255,255,255,0.85);font-size:0.7em;letter-spacing:0.02em;">Across Bangladesh & Beyond</span>
          </h1>
          <p class="hero-desc">AC & Non-AC transport, air & ship tickets, hotel bookings, and exclusive tour packages — everything you need to travel, all under one roof.</p>
          <div class="hero-actions">
            <a href="<?php echo home_url(  ) . '#services' ?>"   class="btn btn-yellow"><svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>Explore Packages</a>
            <a href="/contact-us/" class="btn btn-outline-white">Book Now →</a>
          </div>
        </div>

        <div class="hero-right">
          <div class="hero-stats-grid">
            <div class="hero-stat"><div class="hero-stat-num" data-count="5200" data-suffix="+">5200+</div><div class="hero-stat-label">Happy Travellers</div></div>
            <div class="hero-stat"><div class="hero-stat-num" data-count="50" data-suffix="+">50+</div><div class="hero-stat-label">Tour Packages</div></div>
            <div class="hero-stat"><div class="hero-stat-num" data-count="15" data-suffix="">15</div><div class="hero-stat-label">Years Experience</div></div>
            <div class="hero-stat"><div class="hero-stat-num" data-count="24" data-suffix="/7">24/7</div><div class="hero-stat-label">Support Available</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-scroll" aria-hidden="true">
    <div class="scroll-line"></div>
    Scroll
  </div>
</section>






<section class="gallery-slider">
  <div class="container">
    <div class="gallery-header fade-in">
      <p class="section-label">Our Journeys</p>
      <h2 class="section-title">Moments from the <em>Road</em></h2>
      <p class="section-subtitle">A glimpse into the destinations, transport, and smiling travellers we've had the joy of serving.</p>
    </div>
  </div>

  <div class="slider-wrapper">
    <div class="slider-track" id="sliderTrack">

      <div class="slide">
        <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/coxs-bazar-scaled.jpg" alt="Cox's Bazar Beach">
        <div class="slide-caption"><span>🌊 Cox's Bazar</span></div>
      </div>

      <div class="slide">
        <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/sundarban-scaled.jpg" alt="Sundarbans Mangrove Forest">
        <div class="slide-caption"><span>🌿 Sundarbans</span></div>
      </div>

      <div class="slide">
        <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/tea-garden.jpeg" alt="Sylhet Tea Garden">
        <div class="slide-caption"><span>🍃 Sylhet Tea Gardens</span></div>
      </div>

      <div class="slide">
        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=900&q=80" alt="Bandarban Hills">
        <div class="slide-caption"><span>🏔 Bandarban Hills</span></div>
      </div>

      <div class="slide">
        <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/Rangamati-lake.jpg" alt="Rangamati Lake">
        <div class="slide-caption"><span>🏞 Rangamati Lake</span></div>
      </div>

      <div class="slide">
        <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/saint-martin.jpg" alt="Saint Martin Island">
        <div class="slide-caption"><span>🏝 Saint Martin Island</span></div>
      </div>

      <div class="slide">
        <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/sajek-velly-scaled.jpg" alt="Sajek Valley">
        <div class="slide-caption"><span>☁️ Sajek Valley</span></div>
      </div>

      <div class="slide">
        <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/jaflong-sylhet.jpg" alt="Jaflong Sylhet">
        <div class="slide-caption"><span>💎 Jaflong, Sylhet</span></div>
      </div>

      <div class="slide">
        <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/kuakata-sea-beach-scaled.avif" alt="Kuakata Sea Beach">
        <div class="slide-caption"><span>🌅 Kuakata Sea Beach</span></div>
      </div>


    </div>

    <!-- Prev / Next Arrows -->
    <button class="slider-btn slider-btn-prev" id="sliderPrev" aria-label="Previous slide">
      <svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
    </button>
    <button class="slider-btn slider-btn-next" id="sliderNext" aria-label="Next slide">
      <svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
    </button>

    <!-- Dots -->
    <div class="slider-dots" id="sliderDots"></div>
  </div>
</section>

<style>

</style>

<!-- ══════════════ SERVICES ══════════════ -->
<section class="services" id="services">
  <div class="container">
    <div class="services-content">
      <div class="services-header">
        <div>
          <p class="section-label">What We Offer</p>
          <h2 class="section-title">Our Core <em>Services</em></h2>
          <p class="section-subtitle">Comprehensive travel and transport solutions designed around your needs — every trip, every time.</p>
        </div>
        <div class="services-header-right">
          <a href="https://wa.me/8801632221259" class="btn btn-outline-black">Send Query →</a>
        </div>
      </div>

      <div class="services-grid">
        <div class="service-card fade-in">
          <div class="service-num">01 — Service</div>
          <div class="service-icon-wrap">
            <!-- AC & Non-AC Transport / Bus icon -->
            <svg viewBox="0 0 24 24"><path d="M4 16c0 .88.39 1.67 1 2.22V20c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h8v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1.78c.61-.55 1-1.34 1-2.22V6c0-3.5-3.58-4-8-4s-8 .5-8 4v10zm3.5 1c-.83 0-1.5-.67-1.5-1.5S6.67 14 7.5 14s1.5.67 1.5 1.5S8.33 17 7.5 17zm9 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm1.5-6H6V6h12v5z"/></svg>
          </div>
          <h3 class="service-title">AC & Non-AC Transport</h3>
          <p class="service-desc">Comfortable air-conditioned and standard bus services for all routes — city transfers, intercity, and group travel.</p>
        </div>

        <div class="service-card fade-in fade-in-delay-1">
          <div class="service-num">02 — Service</div>
          <div class="service-icon-wrap">
            <!-- Hotel & Resort Booking icon -->
            <svg viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>
          </div>
          <h3 class="service-title">Hotel & Resort Booking</h3>
          <p class="service-desc">Seamless hotel and resort reservations across Bangladesh and internationally — budget to luxury, all handled for you.</p>
        </div>

        <div class="service-card fade-in fade-in-delay-2">
          <div class="service-num">03 — Service</div>
          <div class="service-icon-wrap">
            <!-- Ship / Ferry Ticket icon -->
            <svg viewBox="0 0 24 24"><path d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0C6.78 20.53 5.39 21 4 21H2v2h2c1.38 0 2.74-.35 4-.99 2.52 1.29 5.48 1.29 8 0 1.26.64 2.62.99 4 .99h2v-2h-2zM3.95 19H4c1.6 0 3.02-.88 4-2 .98 1.12 2.4 2 4 2s3.02-.88 4-2c.98 1.12 2.4 2 4 2h.05l1.89-6.68c.08-.26.06-.54-.06-.78s-.34-.42-.6-.5L19 10.62V6c0-1.1-.9-2-2-2h-3V1H10v3H7c-1.1 0-2 .9-2 2v4.62l-1.29.42c-.26.08-.48.26-.6.5s-.14.52-.06.78L3.95 19zM7 6h10v3.97L12 8 7 9.97V6z"/></svg>
          </div>
          <h3 class="service-title">Ship Ticket Service</h3>
          <p class="service-desc">Hassle-free ferry and launch ticket booking for river routes across Bangladesh — cabins, decks, and group bookings.</p>
        </div>

        <div class="service-card fade-in">
          <div class="service-num">04 — Service</div>
          <div class="service-icon-wrap">
            <!-- Air Ticket / Airplane icon -->
            <svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
          </div>
          <h3 class="service-title">Domestic & International Air Ticket</h3>
          <p class="service-desc">Best-fare flight bookings on all major airlines — domestic routes and international destinations, with full ticketing support.</p>
        </div>

        <div class="service-card fade-in fade-in-delay-1">
          <div class="service-num">05 — Service</div>
          <div class="service-icon-wrap">
            <!-- Bangladesh / Map Tour Packages icon -->
            <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
          </div>
          <h3 class="service-title">Exclusive Tour Packages Across Bangladesh</h3>
          <p class="service-desc">Curated domestic tours covering Cox's Bazar, Sundarbans, Sylhet, Bandarban, and more — transport, stays, and guides included.</p>
        </div>
        <div class="service-card fade-in fade-in-delay-2">
          <div class="service-num">06 — Service</div>
          <div class="service-icon-wrap">
            <!-- Custom Booking / Calendar + checkmark icon -->
            <svg viewBox="0 0 24 24"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zm-7-9c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm1 4.41l-1.5-1.5L10.09 14 12 15.91l3.41-3.41 1.41 1.41L13 17.41z"/></svg>
          </div>
          <h3 class="service-title">Custom Booking</h3>
          <p class="service-desc">Have a unique travel need? We build fully tailored itineraries and bookings around your schedule, budget, and preferences.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════ Vehicles ══════════════ -->
<section class="vehicles" id="ourVehicles">
  <div class="container">
    <div class="vehicles-header fade-in">
      <p class="section-label">Our Fleet</p>
      <h2 class="section-title">Meet Our <em>Vehicles</em></h2>
      <p class="section-subtitle">Modern, well-maintained fleet for every journey — from city transfers to long-haul tours across Bangladesh.</p>
    </div>

    <div class="vehicles-grid" id="vehiclesGrid">

      <div class="vehicle-card"
          data-name="AC Tourist Bus"
          data-desc="Spacious, air-conditioned tourist coach with 36-40 seats — perfect for group tours and long-distance travel."
          data-images='[
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/ac-big-bus.jpeg",
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/ac-big-bus-2.jpeg",
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/ac-big-bus-3.jpeg",
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/big-seat-one.jpeg",
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/big-seat-two.jpeg"
          ]'>

          <div class="vehicle-thumb">
              <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/ac-big-bus.jpeg"
                  alt="AC Big Bus">
          </div>

          <div class="vehicle-info">
              <h4 class="vehicle-name">AC Tourist Bus</h4>
              <span class="vehicle-tag">More Info & Images</span>
          </div>
      </div>
      <div class="vehicle-card"
          data-name="AC Mini Bus"
          data-desc="Air-conditioned premium minibus (Nissan/Toyota) 28 seats ( 21 adults and 7 babies ) offering smooth comfort and modern seating — perfect for group tours, airport transfers, and long-distance travel."
          data-images='[
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/toyota.jpeg",
            "https://images.unsplash.com/photo-1556122071-e404eaedb77f?w=1200&q=90",
            "https://images.unsplash.com/photo-1519003722824-194d4455a60c?w=1200&q=90",
            "https://images.unsplash.com/photo-1570125909517-53cb21c89ff2?w=1200&q=90"
          ]'>

          <div class="vehicle-thumb">
              <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/toyota.jpeg"
                  alt="AC Mini Bus">
          </div>

          <div class="vehicle-info">
              <h4 class="vehicle-name">AC Mini Bus</h4>
              <span class="vehicle-tag">More Info & Images</span>
          </div>
      </div>
      <div class="vehicle-card"
          data-name="Non AC Bus"
          data-desc="Spacious and comfortable tourist coach upto 45 seats with ample ventilation — ideal for group tours and long-distance travel."
          data-images='[
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/non-ac.jpeg",
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/no-ac-1.jpeg",
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/no-seat-1.jpeg",
            "https://tourandtransportsolution.com/wp-content/uploads/2026/06/no-ac-seat-2.jpeg"
          ]'>

          <div class="vehicle-thumb">
              <img src="https://tourandtransportsolution.com/wp-content/uploads/2026/06/non-ac.jpeg"
                  alt="Non AC Bus">
          </div>

          <div class="vehicle-info">
              <h4 class="vehicle-name">Non AC Bus</h4>
              <span class="vehicle-tag">More Info & Images</span>
          </div>
      </div>

    </div>
  </div>
</section>

<div class="vl-overlay" id="vlOverlay">

    <div class="vl-backdrop" id="vlBackdrop"></div>

    <div class="vl-modal">

        <button class="vl-close" id="vlClose">&times;</button>

        <div class="vl-image-wrap">
            <img id="vlImage" src="" alt="">
        </div>

        <div class="vl-thumbs" id="vlThumbs"></div>

        <div class="vl-content">
            <h3 id="vlName"></h3>
            <p id="vlDesc"></p>
        </div>

        <div class="vl-footer">

            <span>
                <a href="https://wa.me/8801632221259" class="btn btn-outline-black">Get a Free Quote</a>
            </span>

        </div>

    </div>

</div>
<!-- ══════════════ WHY US ══════════════ -->
<section class="why-us">
  <div class="container">
    <div class="why-us-content">
      <div class="why-us-left fade-in">
        <p class="section-label">Why Choose Us</p>
        <h2 class="section-title" style="color:#fff;">Your Complete <em>Travel Partner</em> in Bangladesh</h2>
        <p class="section-subtitle">From your seat on the bus to your hotel room key — we handle every detail so you can travel with a smile.</p>
        <div class="why-list">
          <div class="why-item">
            <div class="why-icon">
              <!-- AC Transport / comfort icon -->
              <svg viewBox="0 0 24 24"><path d="M4 16c0 .88.39 1.67 1 2.22V20c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h8v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1.78c.61-.55 1-1.34 1-2.22V6c0-3.5-3.58-4-8-4s-8 .5-8 4v10zm3.5 1c-.83 0-1.5-.67-1.5-1.5S6.67 14 7.5 14s1.5.67 1.5 1.5S8.33 17 7.5 17zm9 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm1.5-6H6V6h12v5z"/></svg>
            </div>
            <div><h4>AC & Non-AC Fleet</h4><p>Modern, well-maintained vehicles for every budget — city runs, intercity routes, and group charters, always on time.</p></div>
          </div>
          <div class="why-item">
            <div class="why-icon">
              <!-- Hotel booking icon -->
              <svg viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>
            </div>
            <div><h4>Hotel & Resort at Best Rates</h4><p>Exclusive tie-ups with hotels across Bangladesh ensure you get the best rooms at the best prices, every time.</p></div>
          </div>
          <div class="why-item">
            <div class="why-icon">
              <!-- Air + Ship ticket icon -->
              <svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>
            </div>
            <div><h4>Air & Ship Tickets, Sorted</h4><p>Domestic and international flights plus river route ferry bookings — all under one roof, with no hidden charges.</p></div>
          </div>
          <div class="why-item">
            <div class="why-icon">
              <!-- Tour packages / map pin icon -->
              <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            </div>
            <div><h4>Exclusive Bangladesh Tour Packages</h4><p>Cox's Bazar, Sundarbans, Sylhet, Bandarban and beyond — fully curated packages with guides, stays, and transport included.</p></div>
          </div>
        </div>
      </div>

      <div class="why-right fade-in fade-in-delay-2">
        <div class="why-right-grid">
          <div class="why-visual-card">
            <div class="overlay-text">
              <div class="vc-number" data-count="5200" data-suffix="+">5200+</div>
              <div class="vc-label">Happy<br>Travellers</div>
            </div>
          </div>
          <div class="why-visual-card">
            <div class="overlay-text">
              <div class="vc-number" data-count="50" data-suffix="+">50+</div>
              <div class="vc-label">Tour<br>Packages</div>
            </div>
          </div>
          <div class="why-visual-card">
            <div class="overlay-text">
              <div class="vc-number" data-count="15" data-suffix="yrs">15yrs</div>
              <div class="vc-label">In Business</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════════════ FEATURED TOURS ══════════════ -->
<section class="tours" id="travelStories">
  <div class="container">
    <div class="tours-content">
      <div class="tours-header">
        <div>
          <p class="section-label">Travel Blog</p>
          <h2 class="section-title">Latest <em>Travel Stories</em></h2>
        </div>
        <a href="/blogs/" class="btn btn-outline-black">All Posts →</a>
      </div>

     <div class="tours-grid">

          <?php
          $latest_posts = new WP_Query([
              'post_type'      => 'post',
              'posts_per_page' => 3,
              'post_status'    => 'publish',
          ]);

          if ( $latest_posts->have_posts() ) :

              $delay = 0;

              while ( $latest_posts->have_posts() ) :
                  $latest_posts->the_post();

                  $delay_class = $delay ? 'fade-in-delay-' . $delay : '';
          ?>
                  <article class="tour-card fade-in <?php echo esc_attr( $delay_class ); ?>">
                      
                      <div class="tour-image">
                          <a href="<?php the_permalink(); ?>">
                              <?php if ( has_post_thumbnail() ) : ?>
                                  <?php the_post_thumbnail( 'large', [
                                      'style' => 'width:100%;height:100%;object-fit:cover;'
                                  ] ); ?>
                              <?php endif; ?>
                          </a>

                          <?php
                          $category = get_the_category();
                          if ( ! empty( $category ) ) :
                          ?>
                              <span class="tour-tag">
                                  <?php echo esc_html( $category[0]->name ); ?>
                              </span>
                          <?php endif; ?>
                      </div>

                      <div class="tour-info">

                          <div class="tour-meta">

                              <?php
                              $category = get_the_category();
                              if ( ! empty( $category ) ) :
                              ?>
                                  <span>
                                      <?php echo esc_html( $category[0]->name ); ?>
                                  </span>
                              <?php endif; ?>

                              <span>
                                  <?php echo ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ); ?>
                                  min read
                              </span>

                          </div>

                          <h3 class="tour-name">
                              <a href="<?php the_permalink(); ?>">
                                  <?php the_title(); ?>
                              </a>
                          </h3>

                          <p class="tour-desc">
                              <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                          </p>

                          <div class="tour-footer">
                              <a href="<?php the_permalink(); ?>" class="book-btn">
                                  Read More →
                              </a>
                          </div>

                      </div>

                  </article>

          <?php
                  $delay++;
              endwhile;

              wp_reset_postdata();

          endif;
          ?>

      </div>
    </div>
  </div>
</section>

<!-- ══════════════ PROCESS ══════════════ -->
<section class="process">
  <div class="container">
    <div class="process-content">
      <div class="process-header fade-in">
        <p class="section-label">How It Works</p>
        <h2 class="section-title">Book in <em>4 Easy Steps</em></h2>
        <p class="section-subtitle">Transport, tickets, hotels, or a full tour — booking with us is simple, fast, and hassle-free.</p>
      </div>
      <div class="process-steps" style="position:relative;">
        <div class="process-connector" aria-hidden="true"></div>

        <div class="process-step fade-in fade-in-delay-1">
          <div class="step-circle">1</div>
          <h3 class="step-title">Choose Your Service</h3>
          <p class="step-desc">Select from AC/Non-AC transport, air or ship tickets, hotel booking, a tour package, or tell us your custom requirement.</p>
        </div>

        <div class="process-step fade-in fade-in-delay-2">
          <div class="step-circle">2</div>
          <h3 class="step-title">Share Your Details</h3>
          <p class="step-desc">Tell us your destination, travel dates, group size, and budget — by phone, WhatsApp, or our online form.</p>
        </div>

        <div class="process-step fade-in fade-in-delay-3">
          <div class="step-circle">3</div>
          <h3 class="step-title">Confirm &amp; Pay</h3>
          <p class="step-desc">Receive a clear, no-hidden-fee quote. Confirm with a deposit and pay securely via bank transfer, mobile banking, or cash.</p>
        </div>

        <div class="process-step fade-in fade-in-delay-4">
          <div class="step-circle">4</div>
          <h3 class="step-title">Travel with a Smile 😊</h3>
          <p class="step-desc">Your transport, tickets, and stays are all arranged. Just show up and enjoy — we handle everything else.</p>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ══════════════ TESTIMONIALS ══════════════ -->
<section class="testimonials" id="clientReviews">
  <div class="container">
    <div class="testimonials-content">
      <div class="testimonials-header fade-in">
        <p class="section-label">Traveller Reviews</p>
        <h2 class="section-title">What Our Clients Say</h2>
      </div>
      <div class="testi-grid">
        <div class="testi-card fade-in fade-in-delay-1">
          <span class="testi-quote-mark">"</span>
          <div class="testi-stars">★★★★★</div>
          <p class="testi-text">The Sylhet tour was beyond perfect. Our driver was professional, the guide was knowledgeable, and every arrangement ran without a hitch. Highly recommended!</p>
          <div class="testi-author"><div class="testi-avatar">👨</div><div><div class="testi-name">Rafiqul Islam</div><div class="testi-origin">Dhaka, Bangladesh</div></div></div>
        </div>
        <div class="testi-card fade-in fade-in-delay-2">
          <span class="testi-quote-mark">"</span>
          <div class="testi-stars">★★★★★</div>
          <p class="testi-text">Booked an airport transfer at 2am — they were there on time, vehicle spotlessly clean, and the driver was so courteous. Will use every visit to Dhaka.</p>
          <div class="testi-author"><div class="testi-avatar">👩</div><div><div class="testi-name">Sarah Thompson</div><div class="testi-origin">London, UK</div></div></div>
        </div>
        <div class="testi-card fade-in fade-in-delay-3">
          <span class="testi-quote-mark">"</span>
          <div class="testi-stars">★★★★★</div>
          <p class="testi-text">Our corporate team outing to Cox's Bazar was flawlessly organised. The charter bus was comfortable, guides excellent. Our whole team loved every moment!</p>
          <div class="testi-author"><div class="testi-avatar">👩</div><div><div class="testi-name">Nadia Chowdhury</div><div class="testi-origin">Chittagong, Bangladesh</div></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════ CTA ══════════════ -->
<section class="cta-banner">
  <div class="container">
    <div class="cta-banner-content">
      <div>
        <h2 class="cta-title">Ready to Start Your Next Adventure?</h2>
        <p class="cta-sub">Get in touch today for a free, no-obligation quote. Our team is ready to plan your perfect journey.</p>
      </div>
      <div class="cta-actions">
        <a href="/contact-us/" class="btn btn-black">Book Now →</a>
        <a href="<?php echo home_url(). '/#services' ?>"   class="btn btn-outline-black">View Packages</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
