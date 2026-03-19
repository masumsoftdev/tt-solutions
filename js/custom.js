/* ============================================
   TOUR & TRANSPORT SOLUTION — main.js
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {

  /* ─── Sticky Header ─────────────────────── */
  const header = document.querySelector('.site-header');
  if (header) {
    window.addEventListener('scroll', () => {
      header.classList.toggle('scrolled', window.scrollY > 60);
    }, { passive: true });
  }

  /* ─── Mobile Menu ───────────────────────── */
  const toggle  = document.querySelector('.menu-toggle');
  const mainNav = document.querySelector('.main-nav');
  if (toggle && mainNav) {
    toggle.addEventListener('click', () => {
      const open = mainNav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open);
      const spans = toggle.querySelectorAll('span');
      spans[0].style.transform = open ? 'translateY(7px) rotate(45deg)' : '';
      spans[1].style.opacity   = open ? '0' : '';
      spans[2].style.transform = open ? 'translateY(-7px) rotate(-45deg)' : '';
    });
    document.addEventListener('click', e => {
      if (!toggle.contains(e.target) && !mainNav.contains(e.target)) {
        mainNav.classList.remove('open');
        toggle.querySelectorAll('span').forEach(s => { s.style.transform=''; s.style.opacity=''; });
      }
    });
    mainNav.querySelectorAll('.nav-link').forEach(l => l.addEventListener('click', () => {
      mainNav.classList.remove('open');
      toggle.querySelectorAll('span').forEach(s => { s.style.transform=''; s.style.opacity=''; });
    }));
  }

  /* ─── Active Nav ────────────────────────── */
  const page = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-link').forEach(l => {
    if (l.getAttribute('href') === page) l.classList.add('active');
  });

  /* ─── Scroll Reveal ─────────────────────── */
  const fadeEls = document.querySelectorAll('.fade-in');
  if (fadeEls.length) {
    const obs = new IntersectionObserver(entries => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); } });
    }, { threshold: 0.12, rootMargin: '0px 0px -30px 0px' });
    fadeEls.forEach(el => obs.observe(el));
  }

  /* ─── Counter Animation ─────────────────── */
  document.querySelectorAll('[data-count]').forEach(el => {
    const obs = new IntersectionObserver(entries => {
      if (!entries[0].isIntersecting) return;
      const target = parseInt(el.dataset.count);
      const suffix = el.dataset.suffix || '';
      let cur = 0;
      const step = Math.ceil(target / 55);
      const t = setInterval(() => {
        cur = Math.min(cur + step, target);
        el.textContent = cur.toLocaleString() + suffix;
        if (cur >= target) clearInterval(t);
      }, 28);
      obs.unobserve(el);
    }, { threshold: 0.5 });
    obs.observe(el);
  });

  /* ─── Contact / Booking Form ────────────── */
  const form    = document.getElementById('contact-form');
  const success = document.getElementById('form-success');
  if (form) {
    form.addEventListener('submit', e => {
      e.preventDefault();
      let valid = true;
      form.querySelectorAll('[required]').forEach(f => {
        if (!f.value.trim()) { f.style.borderColor = '#E84040'; valid = false; f.addEventListener('input', () => f.style.borderColor = '', { once: true }); }
      });
      if (!valid) return;
      const btn = form.querySelector('[type=submit]');
      btn.textContent = 'Sending…'; btn.disabled = true;
      setTimeout(() => { form.style.display = 'none'; if (success) success.classList.add('show'); }, 1400);
    });
  }

  /* ─── Book Buttons Feedback ─────────────── */
  document.querySelectorAll('.book-btn').forEach(btn => {
    btn.addEventListener('click', e => {
      e.stopPropagation();
      const orig = btn.textContent;
      btn.textContent = '✓ Added';
      btn.style.background = '#1A6CF5';
      btn.style.color = '#fff';
      setTimeout(() => { btn.textContent = orig; btn.style.background = ''; btn.style.color = ''; }, 1800);
    });
  });

  /* ─── Filter (Shop/Tours) ───────────────── */
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      btn.closest('.filters-wrap')?.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.dataset.filter;
      document.querySelectorAll('.filterable').forEach(card => {
        const match = filter === 'all' || card.dataset.cat === filter;
        card.style.opacity = match ? '' : '0';
        card.style.transform = match ? '' : 'scale(0.95)';
        setTimeout(() => { card.style.display = match ? '' : 'none'; }, match ? 0 : 280);
        if (match) setTimeout(() => { card.style.opacity = '1'; card.style.transform = ''; }, 20);
      });
    });
  });

  /* ─── Blog Pagination (demo) ────────────── */
  document.querySelectorAll('.page-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      btn.closest('.blog-pagination')?.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
      if (!isNaN(parseInt(btn.textContent))) btn.classList.add('active');
    });
  });

});
