(() => {
    const root = document.documentElement;
    const page = document.querySelector('[data-studio-about]');

    if (!page) return;

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const revealItems = [...page.querySelectorAll('[data-about-reveal]')];
    const parallaxItems = [...page.querySelectorAll('[data-about-parallax]')];
    const progressBar = document.querySelector('[data-about-page-progress]');
    const story = page.querySelector('[data-about-story]');
    const storySteps = story ? [...story.querySelectorAll('[data-about-step]')] : [];
    const storyVisual = story?.querySelector('[data-about-story-visual]');
    const storyTitle = story?.querySelector('[data-about-story-title]');
    const storyIndex = story?.querySelector('[data-about-story-index]');
    const storyProgress = story?.querySelector('[data-about-story-progress]');

    root.classList.add('has-about-motion');

    initReveals();
    initStory();
    initScrollEngine();

    function initReveals() {
        revealItems.forEach((item) => {
            const delay = Number(item.dataset.aboutDelay || 0);
            item.style.setProperty('--about-delay', `${delay}ms`);
        });

        const showAll = () => {
            revealItems.forEach((item) => item.classList.add('is-visible'));
        };

        const revealVisible = () => {
            const viewportHeight = window.innerHeight || document.documentElement.clientHeight;

            revealItems.forEach((item) => {
                if (item.classList.contains('is-visible')) return;

                const rect = item.getBoundingClientRect();

                if (rect.top < viewportHeight * 1.06 && rect.bottom > -80) {
                    item.classList.add('is-visible');
                }
            });
        };

        if (reduceMotion.matches || !('IntersectionObserver' in window)) {
            showAll();
            return;
        }

        const observer = new IntersectionObserver((entries, currentObserver) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                entry.target.classList.add('is-visible');
                currentObserver.unobserve(entry.target);
            });
        }, {
            threshold: 0.055,
            rootMargin: '7% 0px -5% 0px'
        });

        revealItems.forEach((item) => observer.observe(item));

        const scheduleChecks = () => {
            window.requestAnimationFrame(revealVisible);
            window.setTimeout(revealVisible, 120);
            window.setTimeout(revealVisible, 420);
        };

        scheduleChecks();
        window.addEventListener('pageshow', scheduleChecks, { passive: true });
        window.addEventListener('hashchange', scheduleChecks, { passive: true });
    }

    function initStory() {
        if (!storySteps.length) return;

        const activate = (step) => {
            if (!step) return;

            storySteps.forEach((item) => {
                item.classList.toggle('is-active', item === step);
            });

            const index = step.dataset.index || '01';
            const title = step.dataset.title || '';

            if (storyVisual) {
                storyVisual.dataset.active = index;
            }

            if (storyTitle) {
                storyTitle.textContent = title;
            }

            if (storyIndex) {
                storyIndex.textContent = index;
            }

            if (storyProgress) {
                const numericIndex = Number(index);
                storyProgress.style.transform = `scaleX(${numericIndex / storySteps.length})`;
            }
        };

        activate(storySteps[0]);

        if (reduceMotion.matches || !('IntersectionObserver' in window)) return;

        const observer = new IntersectionObserver((entries) => {
            const visible = entries
                .filter((entry) => entry.isIntersecting)
                .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

            if (visible.length) {
                activate(visible[0].target);
            }
        }, {
            threshold: [0.25, 0.42, 0.58, 0.72],
            rootMargin: '-18% 0px -28% 0px'
        });

        storySteps.forEach((step) => observer.observe(step));
    }

    function initScrollEngine() {
        const parallaxStates = parallaxItems.map((item) => ({
            item,
            speed: Number(item.dataset.speed || 0),
            current: 0,
            target: 0
        }));

        let targetScrollY = window.scrollY;
        let renderedScrollY = targetScrollY;
        let ticking = false;

        const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

        const render = () => {
            ticking = false;

            renderedScrollY += (targetScrollY - renderedScrollY) * 0.14;

            const maxScroll = Math.max(
                1,
                document.documentElement.scrollHeight - window.innerHeight
            );

            const pageProgress = clamp(renderedScrollY / maxScroll, 0, 1);

            if (progressBar) {
                progressBar.style.transform = `scaleX(${pageProgress})`;
            }

            const viewportCenter = renderedScrollY + window.innerHeight / 2;

            parallaxStates.forEach((state) => {
                if (reduceMotion.matches) {
                    state.target = 0;
                    state.current = 0;
                } else {
                    const rect = state.item.getBoundingClientRect();
                    const documentTop = window.scrollY + rect.top;
                    const center = documentTop + rect.height / 2;

                    state.target = clamp(
                        (viewportCenter - center) * state.speed,
                        -90,
                        90
                    );

                    state.current += (state.target - state.current) * 0.1;
                }

                state.item.style.setProperty(
                    '--about-parallax-y',
                    `${state.current.toFixed(2)}px`
                );
            });

            const stillMoving =
                Math.abs(targetScrollY - renderedScrollY) > 0.2 ||
                parallaxStates.some((state) => Math.abs(state.target - state.current) > 0.2);

            if (stillMoving) {
                requestRender();
            }
        };

        const requestRender = () => {
            if (ticking) return;

            ticking = true;
            window.requestAnimationFrame(render);
        };

        window.addEventListener('scroll', () => {
            targetScrollY = window.scrollY;
            requestRender();
        }, { passive: true });

        window.addEventListener('resize', requestRender);
        reduceMotion.addEventListener?.('change', requestRender);
        requestRender();
    }
})();
