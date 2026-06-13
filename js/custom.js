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

(function () {

    const cards = Array.from(
        document.querySelectorAll('.vehicle-card')
    );

    const overlay = document.getElementById('vlOverlay');
    const backdrop = document.getElementById('vlBackdrop');
    const vlImg = document.getElementById('vlImage');
    const vlName = document.getElementById('vlName');
    const vlDesc = document.getElementById('vlDesc');
    const vlClose = document.getElementById('vlClose');
    const vlThumbs = document.getElementById('vlThumbs');

    let currentVehicle = 0;
    let currentImage = 0;
    let galleryImages = [];


    function openModal(index) {
        currentVehicle = index;
        loadVehicle();
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    function loadVehicle() {

        const card = cards[currentVehicle];

        galleryImages = JSON.parse(
            card.dataset.images || '[]'
        );

        currentImage = 0;

        vlName.textContent = card.dataset.name;
        vlDesc.textContent = card.dataset.desc;
        renderGallery();
    }

    function renderGallery() {

        if (!galleryImages.length) return;

        vlImg.src = galleryImages[currentImage];

        vlThumbs.innerHTML = '';

        galleryImages.forEach((img, index) => {

            const thumb = document.createElement('img');

            thumb.src = img;
            thumb.className = 'vl-thumb';

            if (index === currentImage) {
                thumb.classList.add('active');
            }

            thumb.addEventListener('click', () => {

                currentImage = index;

                vlImg.src = img;

                document
                    .querySelectorAll('.vl-thumb')
                    .forEach(el => {
                        el.classList.remove('active');
                    });

                thumb.classList.add('active');
            });

            vlThumbs.appendChild(thumb);
        });
    }

    function prevVehicle() {

        currentVehicle--;

        if (currentVehicle < 0) {
            currentVehicle = cards.length - 1;
        }

        loadVehicle();
    }

    function nextVehicle() {

        currentVehicle++;

        if (currentVehicle >= cards.length) {
            currentVehicle = 0;
        }

        loadVehicle();
    }

    cards.forEach((card, index) => {

        card.addEventListener('click', () => {
            openModal(index);
        });

    });

    vlClose.addEventListener('click', closeModal);
    backdrop.addEventListener('click', closeModal);


    document.addEventListener('keydown', e => {

        if (!overlay.classList.contains('active')) {
            return;
        }

        if (e.key === 'Escape') {
            closeModal();
        }

        if (e.key === 'ArrowLeft') {
            prevVehicle();
        }

        if (e.key === 'ArrowRight') {
            nextVehicle();
        }

    });

})();

(function () {
  const track   = document.getElementById('sliderTrack');
  const slides  = track.querySelectorAll('.slide');
  const prevBtn = document.getElementById('sliderPrev');
  const nextBtn = document.getElementById('sliderNext');
  const dotsWrap= document.getElementById('sliderDots');

  let current   = 0;
  let autoTimer = null;
  let startX    = 0;
  let isDragging= false;

  const total = slides.length;

  /* Build dots */
  slides.forEach((_, i) => {
    const d = document.createElement('button');
    d.className = 'slider-dot' + (i === 0 ? ' active' : '');
    d.setAttribute('aria-label', 'Go to slide ' + (i + 1));
    d.addEventListener('click', () => goTo(i));
    dotsWrap.appendChild(d);
  });

  function getSlideWidth() {
    return slides[0].offsetWidth + 20; /* width + gap */
  }

  function goTo(index) {
    current = (index + total) % total;
    track.style.transform = `translateX(-${current * getSlideWidth()}px)`;
    dotsWrap.querySelectorAll('.slider-dot').forEach((d, i) => {
      d.classList.toggle('active', i === current);
    });
  }

  function next() { goTo(current + 1); }
  function prev() { goTo(current - 1); }

  nextBtn.addEventListener('click', () => { next(); resetAuto(); });
  prevBtn.addEventListener('click', () => { prev(); resetAuto(); });

  /* Auto-play */
  function startAuto() { autoTimer = setInterval(next, 4000); }
  function resetAuto()  { clearInterval(autoTimer); startAuto(); }
  startAuto();

  /* Pause on hover */
  track.addEventListener('mouseenter', () => clearInterval(autoTimer));
  track.addEventListener('mouseleave', startAuto);

  /* Touch / drag swipe */
  track.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend',   e => {
    const diff = startX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 50) { diff > 0 ? next() : prev(); resetAuto(); }
  });

  /* Mouse drag */
  track.addEventListener('mousedown',  e => { startX = e.clientX; isDragging = true; });
  track.addEventListener('mouseup',    e => {
    if (!isDragging) return;
    isDragging = false;
    const diff = startX - e.clientX;
    if (Math.abs(diff) > 50) { diff > 0 ? next() : prev(); resetAuto(); }
  });
  track.addEventListener('mouseleave', () => { isDragging = false; });

  /* Recalc on resize */
  window.addEventListener('resize', () => goTo(current));
})();