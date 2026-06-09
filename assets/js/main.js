/**
 * AccessiKey – Main JS
 */

document.addEventListener('DOMContentLoaded', () => {

  /* ---- Sticky nav ---- */
  const nav = document.querySelector('.site-nav');
  const onScroll = () => {
    nav.classList.toggle('scrolled', window.scrollY > 40);
  };
  window.addEventListener('scroll', onScroll, { passive: true });

  /* ---- Mobile nav ---- */
  const toggle = document.querySelector('.nav-toggle');
  const mobileNav = document.querySelector('.mobile-nav');
  const closeBtn = document.querySelector('.mobile-nav-close');

  toggle?.addEventListener('click', () => mobileNav.classList.add('open'));
  closeBtn?.addEventListener('click', () => mobileNav.classList.remove('open'));
  mobileNav?.querySelectorAll('a').forEach(a =>
    a.addEventListener('click', () => mobileNav.classList.remove('open'))
  );

  /* ---- Scroll reveal ---- */
  const reveals = document.querySelectorAll('.reveal');
  const revealObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        revealObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  reveals.forEach(el => revealObs.observe(el));

  /* ---- FAQ accordion ---- */
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');
      // close all
      document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
      if (!isOpen) item.classList.add('open');
    });
  });

  /* ---- Animated counter ---- */
  const counters = document.querySelectorAll('[data-count]');
  const countObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        const el = e.target;
        const target = parseInt(el.dataset.count);
        const suffix = el.dataset.suffix || '';
        let current = 0;
        const step = target / 60;
        const timer = setInterval(() => {
          current += step;
          if (current >= target) {
            current = target;
            clearInterval(timer);
          }
          el.textContent = Math.round(current).toLocaleString() + suffix;
        }, 20);
        countObs.unobserve(el);
      }
    });
  }, { threshold: 0.5 });
  counters.forEach(el => countObs.observe(el));

  /* ---- Typing animation in hero ---- */
  const typeTarget = document.querySelector('.hero-type');
  if (typeTarget) {
    const words = ['everyone', 'users', 'visitors', 'your team'];
    let wi = 0, ci = 0, deleting = false;
    const type = () => {
      const word = words[wi];
      if (!deleting) {
        typeTarget.textContent = word.slice(0, ci + 1);
        ci++;
        if (ci === word.length) {
          deleting = true;
          setTimeout(type, 1800);
          return;
        }
      } else {
        typeTarget.textContent = word.slice(0, ci - 1);
        ci--;
        if (ci === 0) {
          deleting = false;
          wi = (wi + 1) % words.length;
        }
      }
      setTimeout(type, deleting ? 60 : 90);
    };
    setTimeout(type, 800);
  }

  /* ---- Smooth scroll for anchor links ---- */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      const target = document.querySelector(anchor.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  /* ---- Parallax subtle on hero ---- */
  const heroOrbs = document.querySelectorAll('.hero-orb');
  window.addEventListener('scroll', () => {
    const sy = window.scrollY;
    heroOrbs.forEach((orb, i) => {
      orb.style.transform = `translateY(${sy * (i % 2 === 0 ? 0.08 : -0.05)}px)`;
    });
  }, { passive: true });

  /* ---- Feature card tilt effect ---- */
  document.querySelectorAll('.feat-card').forEach(card => {
    card.addEventListener('mousemove', e => {
      const rect = card.getBoundingClientRect();
      const x = (e.clientX - rect.left) / rect.width - 0.5;
      const y = (e.clientY - rect.top)  / rect.height - 0.5;
      card.style.transform = `translateY(-6px) rotateX(${y * -6}deg) rotateY(${x * 6}deg)`;
    });
    card.addEventListener('mouseleave', () => {
      card.style.transform = '';
    });
  });

});
