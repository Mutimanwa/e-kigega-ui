// ============================================
// FRONTEND EXPERT AI - SCROLL SYNC SYSTEM PRO
// Système de navigation synchronisée professionnel
// ============================================

(function () {
  "use strict";

  // Configuration
  const CONFIG = {
    SCROLL_DEBOUNCE: 100,
    HEADER_THRESHOLD: 50,
    SCROLL_OFFSET: 80,
    TRANSITION_DURATION: 400,
    ANIMATION_DELAY: 100,
  };

  // État global
  const state = {
    isScrolling: false,
    scrollTimeout: null,
    rafId: null,
    lastScrollY: 0,
    scrollDirection: "down",
    cachedElements: {},
    currentSection: null, // ✅ AJOUT
  };

  // ======================
  // THROTTLE URL UPDATE
  // ======================
  function throttle(fn, delay) {
    let lastCall = 0;
    return function (...args) {
      const now = Date.now();
      if (now - lastCall >= delay) {
        lastCall = now;
        fn.apply(this, args);
      }
    };
  }

  const throttledReplaceState = throttle((sectionId) => {
    if (history.replaceState) {
      history.replaceState(null, null, `#${sectionId}`);
    }
  }, 300);

  // Initialisation
  function init() {
    console.log("🚀 Initialisation du système de navigation...");

    createRequiredElements();
    cacheDOMElements();
    setupEventListeners();
    initInitialState();
    startAnimationLoop();

    console.log("✅ Système initialisé avec succès");
  }

  // Création des éléments requis
  function createRequiredElements() {
    if (!document.getElementById("progressBar")) {
      const progressBar = document.createElement("div");
      progressBar.id = "progressBar";
      document.body.prepend(progressBar);
    }

    const navbarNav = document.querySelector(".navbar-nav");
    if (navbarNav && !document.getElementById("navCursor")) {
      const cursor = document.createElement("div");
      cursor.id = "navCursor";
      navbarNav.appendChild(cursor);
    }
  }

  // Cache DOM
  function cacheDOMElements() {
    state.cachedElements = {
      header: document.querySelector("nav.navbar"),
      navLinks: Array.from(document.querySelectorAll('a.nav-link[href^="#"]')),
      navCursor: document.getElementById("navCursor"),
      progressBar: document.getElementById("progressBar"),
      sections: Array.from(document.querySelectorAll("section[id]")),
      positionDots: Array.from(document.querySelectorAll(".position-dot")),
    };

    state.cachedElements.navLinks.forEach((link, index) => {
      link.dataset.index = index;
    });
  }

  // Events
  function setupEventListeners() {
    window.addEventListener("scroll", handleScroll, { passive: true });
    window.addEventListener("resize", debounce(handleResize, 200), {
      passive: true,
    });

    state.cachedElements.navLinks.forEach((link) =>
      link.addEventListener("click", handleNavClick),
    );

    state.cachedElements.positionDots.forEach((dot) =>
      dot.addEventListener("click", handleDotClick),
    );

    if (window.location.hash) {
      setTimeout(handleInitialHash, 100);
    }
  }

  // Scroll
  function handleScroll() {
    const currentY = window.scrollY;
    state.scrollDirection = currentY > state.lastScrollY ? "down" : "up";
    state.lastScrollY = currentY;

    clearTimeout(state.scrollTimeout);
    state.scrollTimeout = setTimeout(updateScrollState, CONFIG.SCROLL_DEBOUNCE);
  }

  function updateScrollState() {
    updateProgressBar();
    updateHeaderState();
    updateActiveSection();
  }

  function updateProgressBar() {
    const { progressBar } = state.cachedElements;
    if (!progressBar) return;

    const winHeight = window.innerHeight;
    const docHeight = document.documentElement.scrollHeight;
    const progress = (window.scrollY / (docHeight - winHeight)) * 100;
    progressBar.style.width = `${progress}%`;
  }

  function updateHeaderState() {
    const { header } = state.cachedElements;
    if (!header) return;

    header.classList.toggle(
      "scrolled",
      window.scrollY > CONFIG.HEADER_THRESHOLD,
    );
  }

  function updateActiveSection() {
    const { sections } = state.cachedElements;
    if (!sections.length) return;

    let activeSection = null;
    let maxVisibility = 0;
    const viewportHeight = window.innerHeight;
    const scrollTop = window.scrollY + CONFIG.SCROLL_OFFSET;

    sections.forEach((section) => {
      const rect = section.getBoundingClientRect();
      const sectionTop = rect.top + scrollTop - CONFIG.SCROLL_OFFSET;
      const sectionHeight = rect.height;

      const visibleTop = Math.max(scrollTop, sectionTop);
      const visibleBottom = Math.min(
        scrollTop + viewportHeight,
        sectionTop + sectionHeight,
      );
      const visibleHeight = Math.max(0, visibleBottom - visibleTop);
      const visibilityPercent = (visibleHeight / sectionHeight) * 100;

      if (visibilityPercent > maxVisibility) {
        maxVisibility = visibilityPercent;
        activeSection = section;
      }
    });

    if (activeSection && maxVisibility > 10) {
      setActiveSection(activeSection.id);
    }
  }

  // =========================
  // SECTION ACTIVE (FIX)
  // =========================
  function setActiveSection(sectionId) {
    if (state.currentSection === sectionId) return;
    state.currentSection = sectionId;

    const { navLinks, navCursor, positionDots } = state.cachedElements;

    navLinks.forEach((link) => {
      const id = link.getAttribute("href").substring(1);
      if (id === sectionId) {
        link.classList.add("active");
        updateNavCursor(link);
      } else {
        link.classList.remove("active");
      }
    });

    positionDots.forEach((dot) => {
      const target = dot.dataset.target?.substring(1);
      dot.classList.toggle("active", target === sectionId);
    });

    if (!state.isScrolling) {
      throttledReplaceState(sectionId);
    }
  }

  function updateNavCursor(activeLink) {
    const { navCursor } = state.cachedElements;
    if (!navCursor) return;

    const linkRect = activeLink.getBoundingClientRect();
    const navRect = activeLink.closest(".navbar-nav").getBoundingClientRect();

    navCursor.style.width = `${linkRect.width}px`;
    navCursor.style.transform = `translateX(${linkRect.left - navRect.left}px)`;
  }

  function handleNavClick(e) {
    e.preventDefault();
    const targetId = e.currentTarget.getAttribute("href").substring(1);
    state.isScrolling = true;
    scrollToSection(targetId);

    setTimeout(() => (state.isScrolling = false), 1000);
  }

  function handleDotClick(e) {
    e.preventDefault();
    const targetId = e.currentTarget.dataset.target.substring(1);
    state.isScrolling = true;
    scrollToSection(targetId);

    setTimeout(() => (state.isScrolling = false), 1000);
  }

  function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (!section) return;

    const headerHeight =
      state.cachedElements.header?.offsetHeight || 0;

    window.scrollTo({
      top: section.offsetTop - headerHeight - 20,
      behavior: "smooth",
    });

    setActiveSection(sectionId);
  }

  function handleResize() {
    cancelAnimationFrame(state.rafId);
    state.rafId = requestAnimationFrame(() => {
      cacheDOMElements();
      updateActiveSection();
    });
  }

  function initInitialState() {
    updateHeaderState();
    updateProgressBar();
    updateActiveSection();
  }

  function handleInitialHash() {
    const hash = window.location.hash.substring(1);
    if (hash) scrollToSection(hash);
  }

  function startAnimationLoop() {
    function loop() {
      if (!state.isScrolling) updateScrollState();
      state.rafId = requestAnimationFrame(loop);
    }
    state.rafId = requestAnimationFrame(loop);
  }

  function debounce(fn, delay) {
    let t;
    return (...args) => {
      clearTimeout(t);
      t = setTimeout(() => fn(...args), delay);
    };
  }

  function cleanup() {
    cancelAnimationFrame(state.rafId);
    clearTimeout(state.scrollTimeout);
    window.removeEventListener("scroll", handleScroll);
    window.removeEventListener("resize", handleResize);
  }

  document.addEventListener("DOMContentLoaded", init);
  window.addEventListener("beforeunload", cleanup);

  window.scrollSystem = {
    setActiveSection,
    scrollToSection,
    updateActiveSection,
    cleanup,
  };
})();
