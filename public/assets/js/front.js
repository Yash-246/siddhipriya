(() => {
    const body = document.body;
    const storedTheme = localStorage.getItem('sg-theme') || 'light';
    const header = document.querySelector('.site-header');
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const nav = document.querySelector('#navMenu');
    const toggle = document.querySelector('[data-theme-toggle]');
    const scrollTopButtons = [...document.querySelectorAll('[data-scroll-top]')];
    const floatingScrollTopButton = document.querySelector('.toTopLift');
    const siteLoader = document.querySelector('[data-site-loader]');

    body.setAttribute('data-theme', storedTheme);

    initLoader();
    initTheme();
    initNavigation();
    initGlobalScrollUi();

    function initLoader() {
        if (!siteLoader) {
            body.classList.remove('is-loading');
            return;
        }

        const status = siteLoader.querySelector('[data-loader-status]');
        const progressBar = siteLoader.querySelector('[data-loader-progress]');
        const percent = siteLoader.querySelector('[data-loader-percent]');
        const startedAt = performance.now();
        const minimumVisibleTime = 1500;
        const maximumWaitTime = 15000;
        let isClosed = false;
        let displayedProgress = 0;
        let progressFrame = 0;

        const updateProgress = (value, label) => {
            const nextValue = Math.min(Math.max(value, 0), 100);

            if (label && status) {
                status.textContent = label;
            }

            cancelAnimationFrame(progressFrame);

            const animate = () => {
                displayedProgress += (nextValue - displayedProgress) * 0.14;

                if (Math.abs(nextValue - displayedProgress) < 0.2) {
                    displayedProgress = nextValue;
                }

                if (progressBar) {
                    progressBar.style.setProperty('--loader-progress', `${displayedProgress / 100}`);
                }

                if (percent) {
                    percent.textContent = String(Math.round(displayedProgress));
                }

                if (displayedProgress !== nextValue) {
                    progressFrame = requestAnimationFrame(animate);
                }
            };

            progressFrame = requestAnimationFrame(animate);
        };

        const waitForWindowLoad = () => new Promise((resolve) => {
            if (document.readyState === 'complete') {
                resolve();
                return;
            }

            window.addEventListener('load', resolve, { once: true });
        });

        const waitForFonts = () => {
            if (!document.fonts?.ready) {
                return Promise.resolve();
            }

            return document.fonts.ready.catch(() => undefined);
        };

        const waitForEagerImages = () => {
            const images = [...document.images].filter((image) => image.loading !== 'lazy');

            return Promise.allSettled(images.map((image) => {
                if (image.complete) {
                    return image.decode?.().catch(() => undefined) || Promise.resolve();
                }

                return new Promise((resolve) => {
                    image.addEventListener('load', resolve, { once: true });
                    image.addEventListener('error', resolve, { once: true });
                });
            }));
        };

        const waitForHeroReady = () => new Promise((resolve) => {
            const hero = document.querySelector('[data-sequence-wrap]');

            if (!hero || hero.classList.contains('is-sequence-ready') || hero.classList.contains('is-static-hero')) {
                resolve();
                return;
            }

            const observer = new MutationObserver(() => {
                if (hero.classList.contains('is-sequence-ready') || hero.classList.contains('is-static-hero')) {
                    observer.disconnect();
                    resolve();
                }
            });

            observer.observe(hero, {
                attributes: true,
                attributeFilter: ['class']
            });

            window.setTimeout(() => {
                observer.disconnect();
                resolve();
            }, 8000);
        });

        const waitForMinimumTime = () => {
            const elapsed = performance.now() - startedAt;
            const remaining = Math.max(0, minimumVisibleTime - elapsed);

            return new Promise((resolve) => window.setTimeout(resolve, remaining));
        };

        const closeLoader = () => {
            if (isClosed) return;
            isClosed = true;

            cancelAnimationFrame(progressFrame);
            updateProgress(100, 'Welcome to Siddhipriya Gracia');

            window.setTimeout(() => {
                siteLoader.classList.add('is-leaving');
                body.classList.remove('is-loading');

                window.setTimeout(() => {
                    siteLoader.remove();
                }, 760);
            }, 360);
        };

        const runLoadingSequence = async () => {
            updateProgress(8, 'Preparing your address');

            await waitForWindowLoad();
            updateProgress(48, 'Loading project experience');

            await Promise.all([waitForFonts(), waitForEagerImages()]);
            updateProgress(78, 'Finalising visual details');

            await waitForHeroReady();
            updateProgress(96, 'Almost ready');

            await waitForMinimumTime();
            closeLoader();
        };

        runLoadingSequence().catch(closeLoader);

        // Emergency escape only. A failed third-party asset must not trap the visitor forever.
        window.setTimeout(closeLoader, maximumWaitTime);
    }

    function initTheme() {
        if (!toggle) return;

        toggle.textContent = storedTheme === 'dark' ? '☀' : '☾';

        toggle.addEventListener('click', () => {
            const next = body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';

            body.setAttribute('data-theme', next);
            localStorage.setItem('sg-theme', next);
            toggle.textContent = next === 'dark' ? '☀' : '☾';
        });
    }

    function initNavigation() {
        if (!menuToggle || !nav) return;

        const closeMenu = () => {
            nav.classList.remove('active');
            menuToggle.setAttribute('aria-expanded', 'false');
        };

        menuToggle.addEventListener('click', () => {
            const isOpen = nav.classList.toggle('active');
            menuToggle.setAttribute('aria-expanded', String(isOpen));
        });

        nav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });

        document.addEventListener('pointerdown', (event) => {
            if (!nav.classList.contains('active')) return;
            if (nav.contains(event.target) || menuToggle.contains(event.target)) return;
            closeMenu();
        });
    }

    function initGlobalScrollUi() {
        let ticking = false;

        const updateGlobalUi = () => {
            ticking = false;

            const scrollY = window.scrollY || document.documentElement.scrollTop;
            const maxScroll = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
            const progress = Math.min(Math.max(scrollY / maxScroll, 0), 1);

            header?.classList.toggle('is-scrolled', scrollY > 40);

            if (floatingScrollTopButton) {
                floatingScrollTopButton.classList.toggle('is-visible', scrollY > 620);
                floatingScrollTopButton.style.setProperty('--scroll-progress', `${progress * 360}deg`);
            }
        };

        const requestUpdate = () => {
            if (ticking) return;
            ticking = true;
            window.requestAnimationFrame(updateGlobalUi);
        };

        window.addEventListener('scroll', requestUpdate, { passive: true });
        window.addEventListener('resize', requestUpdate);
        updateGlobalUi();

        scrollTopButtons.forEach((button) => {
            button.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'
                });
            });
        });
    }
})();
