/**
 * AccessiKey – Main JS v3
 * Fixes: theme toggle, mobile nav accordion, dropdown, FAQ, counters, reveals
 */
document.addEventListener('DOMContentLoaded', () => {

  /* ======================================================
     STICKY NAV
  ====================================================== */
  const nav = document.getElementById('mainNav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 40);
  }, { passive: true });

  /* ======================================================
     THEME TOGGLE — syncs desktop + mobile toggles
  ====================================================== */
  const root = document.documentElement;
  const themeBtn   = document.getElementById('themeToggle');
  const mobileToggle = document.getElementById('mobileThemeToggle');
  const iconMoon   = themeBtn.querySelector('.icon-moon');
  const iconSun    = themeBtn.querySelector('.icon-sun');

  function applyTheme(theme) {
    root.setAttribute('data-theme', theme);
    localStorage.setItem('ak-theme', theme);
    if (theme === 'dark') {
      iconMoon.style.display = 'block';
      iconSun.style.display  = 'none';
      themeBtn.setAttribute('aria-label', 'Switch to light mode');
    } else {
      iconMoon.style.display = 'none';
      iconSun.style.display  = 'block';
      themeBtn.setAttribute('aria-label', 'Switch to dark mode');
    }
  }

  // Restore saved preference
  const saved = localStorage.getItem('ak-theme') || root.getAttribute('data-theme') || 'dark';
  applyTheme(saved);

  themeBtn.addEventListener('click', () => {
    applyTheme(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
  });
  if (mobileToggle) {
    mobileToggle.addEventListener('click', () => {
      applyTheme(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
    });
  }

  /* ======================================================
     MOBILE NAV — accordion drawer
  ====================================================== */
  const mobileNav      = document.getElementById('mobileNav');
  const mobileBackdrop = document.getElementById('mobileNavBackdrop');
  const navToggle      = document.getElementById('navToggle');
  const navClose       = document.getElementById('navClose');

  function openMobileNav() {
    mobileNav.classList.add('open');
    mobileBackdrop.classList.add('open');
    mobileNav.setAttribute('aria-hidden', 'false');
    navToggle.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
    // Focus first focusable element
    const firstLink = mobileNav.querySelector('button, a');
    if (firstLink) setTimeout(() => firstLink.focus(), 50);
  }

  function closeMobileNav() {
    mobileNav.classList.remove('open');
    mobileBackdrop.classList.remove('open');
    mobileNav.setAttribute('aria-hidden', 'true');
    navToggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  navToggle.addEventListener('click', openMobileNav);
  navClose.addEventListener('click', closeMobileNav);
  mobileBackdrop.addEventListener('click', closeMobileNav);
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMobileNav(); });

  // Close nav when any flat link or footer CTA is clicked
  mobileNav.querySelectorAll('.mobile-nav-flat-link, .mobile-nav-footer a').forEach(a => {
    a.addEventListener('click', closeMobileNav);
  });
  // Close when sub-links clicked
  mobileNav.querySelectorAll('.mobile-nav-sub-link').forEach(a => {
    a.addEventListener('click', closeMobileNav);
  });

  // Accordion toggles inside mobile nav
  mobileNav.querySelectorAll('.mobile-nav-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
      const section = btn.closest('.mobile-nav-section');
      const isOpen  = section.classList.contains('open');
      // Close all
      mobileNav.querySelectorAll('.mobile-nav-section').forEach(s => {
        s.classList.remove('open');
        s.querySelector('.mobile-nav-toggle').setAttribute('aria-expanded', 'false');
      });
      // Open clicked if it was closed
      if (!isOpen) {
        section.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });

  /* ======================================================
     SCROLL REVEAL
  ====================================================== */
  const revealEls = document.querySelectorAll('.reveal');

  const revealObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        revealObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.05, rootMargin: '0px 0px -8% 0px' });

  revealEls.forEach(el => revealObs.observe(el));

  function revealIfVisible() {
    const vh = window.innerHeight;
    revealEls.forEach(el => {
      if (el.classList.contains('visible')) return;
      const r = el.getBoundingClientRect();
      if (r.top < vh && r.bottom > -vh) el.classList.add('visible');
    });
  }
  window.addEventListener('scroll', revealIfVisible, { passive: true });
  window.addEventListener('resize', revealIfVisible);
  revealIfVisible();

  /* ======================================================
     FAQ ACCORDION
  ====================================================== */
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const item   = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');
      // Close all
      document.querySelectorAll('.faq-item').forEach(i => {
        i.classList.remove('open');
        i.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
      });
      // Open this one if it was closed
      if (!isOpen) {
        item.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });

  /* ======================================================
     ANIMATED COUNTERS
  ====================================================== */
  const countObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el     = e.target;
      const target = parseInt(el.dataset.count);
      const suffix = el.dataset.suffix || '';
      let c = 0;
      const step = target / 60;
      const t = setInterval(() => {
        c = Math.min(c + step, target);
        el.textContent = Math.round(c).toLocaleString() + suffix;
        if (c >= target) clearInterval(t);
      }, 18);
      countObs.unobserve(el);
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('[data-count]').forEach(el => countObs.observe(el));

  /* ======================================================
     TYPING EFFECT
  ====================================================== */
  const typeEl = document.querySelector('.hero-type');
  if (typeEl) {
    const words = ['everyone', 'all users', 'visitors', 'your team'];
    let wi = 0, ci = 0, del = false;
    const type = () => {
      const w = words[wi];
      if (!del) {
        typeEl.textContent = w.slice(0, ci + 1);
        ci++;
        if (ci === w.length) { del = true; setTimeout(type, 1800); return; }
      } else {
        typeEl.textContent = w.slice(0, ci - 1);
        ci--;
        if (ci === 0) { del = false; wi = (wi + 1) % words.length; }
      }
      setTimeout(type, del ? 55 : 85);
    };
    setTimeout(type, 1000);
  }

  /* ======================================================
     FEATURE CARD TILT (hover only)
  ====================================================== */
  if (window.matchMedia('(hover: hover)').matches) {
    document.querySelectorAll('.feat-card').forEach(card => {
      card.addEventListener('mousemove', e => {
        const r = card.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width  - 0.5;
        const y = (e.clientY - r.top)  / r.height - 0.5;
        card.style.transform = `translateY(-4px) rotateX(${y * -4}deg) rotateY(${x * 4}deg)`;
      });
      card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });
  }

  /* ======================================================
     HOW IT WORKS — tabs
  ====================================================== */
  const hiwTabs = document.querySelectorAll('.hiw-tab');
  hiwTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const ti = parseInt(tab.dataset.tab);
      hiwTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      document.querySelectorAll('.hiw-content').forEach(c => c.classList.remove('active'));
      document.getElementById('hiwContent' + ti).classList.add('active');
    });
  });

  /* ======================================================
     HOW IT WORKS — step clicks
  ====================================================== */
  document.querySelectorAll('.hiw-steps').forEach((stepsEl, tabIdx) => {
    stepsEl.querySelectorAll('.hiw-step').forEach((step, si) => {
      step.addEventListener('click', () => {
        stepsEl.querySelectorAll('.hiw-step').forEach(s => s.classList.remove('active'));
        step.classList.add('active');
        const tabPanels = document.querySelectorAll(`[id^="hiwPanel${tabIdx}-"]`);
        tabPanels.forEach(p => p.classList.remove('active'));
        const target = document.getElementById(`hiwPanel${tabIdx}-${si}`);
        if (target) target.classList.add('active');
      });
    });
  });

  /* ======================================================
     PARALLAX ORBS (respects prefers-reduced-motion)
  ====================================================== */
  if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    window.addEventListener('scroll', () => {
      const sy = window.scrollY;
      document.querySelectorAll('.hero-orb').forEach((o, i) => {
        o.style.transform = `translateY(${sy * (i % 2 === 0 ? 0.06 : -0.03)}px)`;
      });
    }, { passive: true });
  }

  /* ======================================================
     SMOOTH SCROLL for in-page anchors
  ====================================================== */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      const id = anchor.getAttribute('href');
      if (id.length < 2) return;
      const target = document.querySelector(id);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        setTimeout(revealIfVisible, 400);
        setTimeout(revealIfVisible, 900);
      }
    });
  });

});
