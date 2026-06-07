<?php
/**
 * Template name: Services
 */

get_header();
?>

<!-- HERO -->
<section style="background:var(--black);padding:140px 0 80px;position:relative;overflow:hidden;">
  <div style="position:absolute;bottom:0;left:0;right:0;height:4px;background:var(--yellow);"></div>
  <div style="position:absolute;right:-100px;top:50%;transform:translateY(-50%);font-size:20rem;opacity:0.04;user-select:none;">🚌</div>
  <div class="container">
    <p class="section-label">What We Do</p>
    <h1 class="section-title" style="color:var(--white);font-size:clamp(2.5rem,5vw,4.5rem);">Full-Spectrum Travel<br>&amp; <em>Transport Solutions</em></h1>
    <p class="section-subtitle" style="color:var(--light-grey);margin-top:14px;max-width:600px;">From a single airport run to a 14-day international tour, we handle every aspect of your journey with professionalism and care.</p>
  </div>
</section>

<!-- SERVICES DETAIL -->
<section style="padding:var(--section-pad);background:var(--off-white);">
  <div class="container">
    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:24px;">

      <div class="service-card fade-in" style="border:1px solid rgba(0,0,0,0.07);border-radius:var(--radius-md);">
        <div class="service-num">01</div>
        <div class="service-icon-wrap"><svg viewBox="0 0 24 24"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg></div>
        <h3 class="service-title">Airport Transfer</h3>
        <p class="service-desc">Reliable, on-time airport pick-up and drop-off service. Flight tracking, meet-and-greet, and assistance with luggage. Available 24/7, 365 days a year at Hazrat Shahjalal International Airport.</p>
        <ul style="margin-top:16px;display:flex;flex-direction:column;gap:8px;">
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Flight tracking & real-time monitoring</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Meet & greet signboard service</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Fixed pricing — no surge rates</li>
        </ul>
      </div>

      <div class="service-card fade-in fade-in-delay-1" style="border:1px solid rgba(0,0,0,0.07);border-radius:var(--radius-md);">
        <div class="service-num">02</div>
        <div class="service-icon-wrap"><svg viewBox="0 0 24 24"><path d="M4 16c0 .88.39 1.67 1 2.22V20c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h8v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1.78c.61-.55 1-1.34 1-2.22V6c0-3.5-3.58-4-8-4s-8 .5-8 4v10zm3.5 1c-.83 0-1.5-.67-1.5-1.5S6.67 14 7.5 14s1.5.67 1.5 1.5S8.33 17 7.5 17zm9 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm1.5-6H6V6h12v5z"/></svg></div>
        <h3 class="service-title">City Sightseeing Tours</h3>
        <p class="service-desc">Explore Dhaka's rich history and culture with our expert guides. Half-day and full-day tours covering Old Dhaka, Lalbagh Fort, Ahsan Manzil, and more.</p>
        <ul style="margin-top:16px;display:flex;flex-direction:column;gap:8px;">
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Certified local guides</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> AC vehicles throughout</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Customisable itineraries</li>
        </ul>
      </div>

      <div class="service-card fade-in" style="border:1px solid rgba(0,0,0,0.07);border-radius:var(--radius-md);">
        <div class="service-num">03</div>
        <div class="service-icon-wrap"><svg viewBox="0 0 24 24"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg></div>
        <h3 class="service-title">Package Tours</h3>
        <p class="service-desc">Fully inclusive domestic and international packages. We handle accommodation, transport, meals, entrance fees, and guiding — you just enjoy.</p>
        <ul style="margin-top:16px;display:flex;flex-direction:column;gap:8px;">
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> 120+ curated packages</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Hotel + meals + transport bundled</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Flexible departure dates</li>
        </ul>
      </div>

      <div class="service-card fade-in fade-in-delay-1" style="border:1px solid rgba(0,0,0,0.07);border-radius:var(--radius-md);">
        <div class="service-num">04</div>
        <div class="service-icon-wrap"><svg viewBox="0 0 24 24"><path d="M20 6h-2.18c.07-.44.18-.88.18-1.33C18 2.55 15.45 1 12.64 1 11.08 1 9.6 1.6 8.5 2.69L7 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2z"/></svg></div>
        <h3 class="service-title">Corporate Travel</h3>
        <p class="service-desc">End-to-end corporate travel management for businesses of all sizes. Employee shuttle services, executive transfers, team outings, and conference logistics.</p>
        <ul style="margin-top:16px;display:flex;flex-direction:column;gap:8px;">
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Dedicated account manager</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Monthly invoicing available</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Priority fleet access</li>
        </ul>
      </div>

      <div class="service-card fade-in" style="border:1px solid rgba(0,0,0,0.07);border-radius:var(--radius-md);">
        <div class="service-num">05</div>
        <div class="service-icon-wrap"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div>
        <h3 class="service-title">Bus & Coach Charter</h3>
        <p class="service-desc">Full charter hire for school trips, wedding parties, factory outings, NGO field visits, and more. Vehicles from 8-seater microbuses to 45-seat luxury coaches.</p>
        <ul style="margin-top:16px;display:flex;flex-direction:column;gap:8px;">
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Diverse fleet — all AC</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Driver included</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Full-day & multi-day hire</li>
        </ul>
      </div>

      <div class="service-card fade-in fade-in-delay-1" style="border:1px solid rgba(0,0,0,0.07);border-radius:var(--radius-md);">
        <div class="service-num">06</div>
        <div class="service-icon-wrap"><svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg></div>
        <h3 class="service-title">International Tours</h3>
        <p class="service-desc">Expertly curated packages to Thailand, Malaysia, Dubai, Turkey, Maldives, Singapore, and Europe. Visa support, flights, guides, and hotels all arranged.</p>
        <ul style="margin-top:16px;display:flex;flex-direction:column;gap:8px;">
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Visa assistance</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Group & individual options</li>
          <li style="font-size:0.84rem;color:var(--grey);display:flex;align-items:center;gap:8px;"><span style="color:var(--yellow-deep);font-weight:700;">✓</span> Bilingual guides available</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-banner"><div class="container"><div class="cta-banner-content"><div><h2 class="cta-title">Not Sure Which Service You Need?</h2><p class="cta-sub">Call us or send a message — our team will recommend the perfect solution for your journey.</p></div><div class="cta-actions"><a href="contact.html" class="btn btn-black">Get Free Quote</a><a href="tours.html" class="btn btn-outline-black">View Tour Packages</a></div></div></div></section>

<?php get_footer(); ?>