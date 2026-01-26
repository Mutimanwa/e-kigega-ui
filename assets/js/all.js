 // ============================================
        // FRONTEND EXPERT AI - SCROLL SYNC SYSTEM PRO
        // Système de navigation synchronisée professionnel
        // ============================================

        (function () {
            'use strict';

            // Configuration
            const CONFIG = {
                SCROLL_DEBOUNCE: 100,
                HEADER_THRESHOLD: 50,
                SCROLL_OFFSET: 80,
                TRANSITION_DURATION: 400,
                ANIMATION_DELAY: 100
            };

            // État global
            const state = {
                isScrolling: false,
                scrollTimeout: null,
                rafId: null,
                lastScrollY: 0,
                scrollDirection: 'down',
                cachedElements: {}
            };

            // Initialisation
            function init() {
                console.log('🚀 Initialisation du système de navigation...');

                createRequiredElements();
                cacheDOMElements();
                setupEventListeners();
                initInitialState();
                startAnimationLoop();

                console.log('✅ Système initialisé avec succès');
            }

            // Création des éléments requis
            function createRequiredElements() {
                // Barre de progression
                if (!document.getElementById('progressBar')) {
                    const progressBar = document.createElement('div');
                    progressBar.id = 'progressBar';
                    document.body.prepend(progressBar);
                }

                // Curseur de navigation
                const navbarNav = document.querySelector('.navbar-nav');
                if (navbarNav && !document.getElementById('navCursor')) {
                    const cursor = document.createElement('div');
                    cursor.id = 'navCursor';
                    navbarNav.appendChild(cursor);
                }
            }

            // Cache des éléments DOM
            function cacheDOMElements() {
                state.cachedElements = {
                    header: document.querySelector('nav.navbar'),
                    navLinks: Array.from(document.querySelectorAll('a.nav-link[href^="#"]')),
                    navCursor: document.getElementById('navCursor'),
                    progressBar: document.getElementById('progressBar'),
                    sections: Array.from(document.querySelectorAll('section[id]')),
                    positionDots: Array.from(document.querySelectorAll('.position-dot'))
                };

                // Ajouter data-index aux liens
                state.cachedElements.navLinks.forEach((link, index) => {
                    link.dataset.index = index;
                });

                console.log(`📊 Sections: ${state.cachedElements.sections.length}`);
                console.log(`🔗 Liens: ${state.cachedElements.navLinks.length}`);
            }

            // Configuration des événements
            function setupEventListeners() {
                window.addEventListener('scroll', handleScroll, { passive: true });
                window.addEventListener('resize', debounce(handleResize, 200), { passive: true });

                state.cachedElements.navLinks.forEach(link => {
                    link.addEventListener('click', handleNavClick);
                });

                state.cachedElements.positionDots.forEach(dot => {
                    dot.addEventListener('click', handleDotClick);
                });

                // Gestion du switch de facturation
                const billingSwitch = document.getElementById('billingSwitch');
                if (billingSwitch) {
                    billingSwitch.addEventListener('change', handleBillingSwitch);
                }

                // Hash initial
                if (window.location.hash) {
                    setTimeout(handleInitialHash, 100);
                }
            }

            // Gestion du scroll
            function handleScroll() {
                state.lastScrollY = window.scrollY;
                state.scrollDirection = window.scrollY > state.lastScrollY ? 'down' : 'up';

                if (state.scrollTimeout) {
                    clearTimeout(state.scrollTimeout);
                }

                state.scrollTimeout = setTimeout(() => {
                    if (!state.isScrolling) {
                        updateScrollState();
                    }
                }, CONFIG.SCROLL_DEBOUNCE);
            }

            // Mise à jour de l'état du scroll
            function updateScrollState() {
                updateProgressBar();
                updateHeaderState();
                updateActiveSection();
            }

            // Barre de progression
            function updateProgressBar() {
                const { progressBar } = state.cachedElements;
                if (!progressBar) return;

                const winHeight = window.innerHeight;
                const docHeight = document.documentElement.scrollHeight;
                const scrollTop = window.scrollY;

                const progress = (scrollTop / (docHeight - winHeight)) * 100;
                progressBar.style.width = `${progress}%`;
            }

            // État du header
            function updateHeaderState() {
                const { header } = state.cachedElements;
                if (!header) return;

                if (window.scrollY > CONFIG.HEADER_THRESHOLD) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }

            // Détection de la section active
            function updateActiveSection() {
                const { sections } = state.cachedElements;
                if (sections.length === 0) return;

                let activeSection = null;
                let maxVisibility = 0;
                const viewportHeight = window.innerHeight;
                const scrollTop = window.scrollY + CONFIG.SCROLL_OFFSET;

                sections.forEach(section => {
                    const rect = section.getBoundingClientRect();
                    const sectionTop = rect.top + scrollTop - CONFIG.SCROLL_OFFSET;
                    const sectionHeight = rect.height;

                    const visibleTop = Math.max(scrollTop, sectionTop);
                    const visibleBottom = Math.min(scrollTop + viewportHeight, sectionTop + sectionHeight);
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

            // Définir la section active
            function setActiveSection(sectionId) {
                const { navLinks, navCursor, positionDots } = state.cachedElements;

                // Mise à jour des liens de navigation
                navLinks.forEach(link => {
                    const linkSectionId = link.getAttribute('href').substring(1);
                    if (linkSectionId === sectionId) {
                        link.classList.add('active');
                        updateNavCursor(link);
                    } else {
                        link.classList.remove('active');
                    }
                });

                // Mise à jour des indicateurs
                positionDots.forEach(dot => {
                    const dotTarget = dot.dataset.target;
                    const dotSectionId = dotTarget ? dotTarget.substring(1) : null;

                    if (dotSectionId === sectionId) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });

                // Mise à jour de l'URL
                if (history.replaceState) {
                    history.replaceState(null, null, `#${sectionId}`);
                }
            }

            // Mise à jour du curseur
            function updateNavCursor(activeLink) {
                const { navCursor } = state.cachedElements;
                if (!navCursor || !activeLink) return;

                const linkRect = activeLink.getBoundingClientRect();
                const navRect = activeLink.closest('.navbar-nav').getBoundingClientRect();

                navCursor.style.width = `${linkRect.width}px`;
                navCursor.style.transform = `translateX(${linkRect.left - navRect.left}px)`;
            }

            // Clic sur les liens de navigation
            function handleNavClick(e) {
                e.preventDefault();
                const link = e.currentTarget;
                const targetId = link.getAttribute('href').substring(1);

                state.isScrolling = true;
                scrollToSection(targetId, link);

                setTimeout(() => {
                    state.isScrolling = false;
                }, 1000);
            }

            // Clic sur les indicateurs
            function handleDotClick(e) {
                e.preventDefault();
                const dot = e.currentTarget;
                const targetId = dot.dataset.target.substring(1);

                state.isScrolling = true;
                scrollToSection(targetId);

                setTimeout(() => {
                    state.isScrolling = false;
                }, 1000);
            }

            // Défilement vers une section
            function scrollToSection(sectionId, clickedLink = null) {
                const section = document.getElementById(sectionId);
                if (!section) return;

                const headerHeight = state.cachedElements.header ? state.cachedElements.header.offsetHeight : 0;
                const sectionTop = section.offsetTop - headerHeight - 20;

                window.scrollTo({
                    top: sectionTop,
                    behavior: 'smooth'
                });

                if (clickedLink) {
                    setActiveSection(sectionId);
                }
            }

            // Redimensionnement
            function handleResize() {
                if (state.rafId) {
                    cancelAnimationFrame(state.rafId);
                }

                state.rafId = requestAnimationFrame(() => {
                    cacheDOMElements();
                    updateActiveSection();
                });
            }

            // État initial
            function initInitialState() {
                updateHeaderState();
                updateProgressBar();
                updateActiveSection();
            }

            // Hash initial
            function handleInitialHash() {
                const hash = window.location.hash.substring(1);
                if (hash && document.getElementById(hash)) {
                    scrollToSection(hash);
                }
            }

            // Switch de facturation
            function handleBillingSwitch() {
                const proPrice = document.getElementById('proPrice');
                const businessPrice = document.getElementById('businessPrice');

                const monthlyPrices = {
                    pro: '49.000',
                    business: '99.000'
                };

                const yearlyPrices = {
                    pro: '39.200',
                    business: '79.200'
                };

                if (this.checked) {
                    // Mensuel
                    if (proPrice) proPrice.textContent = monthlyPrices.pro;
                    if (businessPrice) businessPrice.textContent = monthlyPrices.business;
                } else {
                    // Annuel
                    if (proPrice) proPrice.textContent = yearlyPrices.pro;
                    if (businessPrice) businessPrice.textContent = yearlyPrices.business;
                }
            }

            // Boucle d'animation
            function startAnimationLoop() {
                function animationLoop() {
                    if (!state.isScrolling) {
                        updateScrollState();
                    }
                    state.rafId = requestAnimationFrame(animationLoop);
                }
                state.rafId = requestAnimationFrame(animationLoop);
            }

            // Debounce helper
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Nettoyage
            function cleanup() {
                if (state.rafId) {
                    cancelAnimationFrame(state.rafId);
                }

                if (state.scrollTimeout) {
                    clearTimeout(state.scrollTimeout);
                }

                window.removeEventListener('scroll', handleScroll);
                window.removeEventListener('resize', handleResize);
            }

            // Initialisation au chargement
            document.addEventListener('DOMContentLoaded', init);
            window.addEventListener('beforeunload', cleanup);

            // API publique
            window.scrollSystem = {
                setActiveSection,
                scrollToSection,
                updateActiveSection,
                cleanup,
                state: state.cachedElements
            };

        })();