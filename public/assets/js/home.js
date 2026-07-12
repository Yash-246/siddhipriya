(() => {
    initModusSequenceHero();
    initGraciaFullWidthExperience();

    function initModusSequenceHero() {
        const wraps = document.querySelectorAll('[data-sequence-wrap]');
        if (!wraps.length) return;

        const staticHeroScreen = window.matchMedia('(max-width: 1100px)');

        if (staticHeroScreen.matches) {
            wraps.forEach((wrap) => {
                wrap.classList.add('is-static-hero');

                const canvas = wrap.querySelector('[data-sequence-canvas]');
                const fallback = wrap.querySelector('.modusZoomHero__fallback');
                const content = wrap.querySelector('.modusZoomHero__content');
                const facts = wrap.querySelector('.modusZoomHero__facts');

                if (canvas) {
                    canvas.style.display = 'none';
                    canvas.setAttribute('aria-hidden', 'true');
                }

                if (fallback) {
                    fallback.classList.remove('is-hidden');
                    fallback.style.opacity = '1';
                }

                if (content) {
                    content.style.transform = 'none';
                    content.style.opacity = '1';
                }

                if (facts) {
                    facts.style.transform = 'none';
                    facts.style.opacity = '1';
                }
            });

            return;
        }

        const clamp = (value, min, max) => Math.min(Math.max(value, min), max);
        const easeOut = value => 1 - Math.pow(1 - value, 3);
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

        wraps.forEach((wrap) => {
            if (wrap.dataset.sequenceReady === 'true') return;
            wrap.dataset.sequenceReady = 'true';

            const element = wrap.querySelector('[data-sequence-element]');
            const canvas = wrap.querySelector('[data-sequence-canvas]');
            const fallback = wrap.querySelector('.modusZoomHero__fallback');
            const content = wrap.querySelector('.modusZoomHero__content');
            const facts = wrap.querySelector('.modusZoomHero__facts');
            const visual = wrap.querySelector('.modusZoomHero__canvas');

            if (!element || !canvas) return;

            const ctx = canvas.getContext('2d');
            if (!ctx) return;

            const frames = parseInt(canvas.dataset.frames || '1', 10);
            const digits = parseInt(canvas.dataset.digits || '3', 10);
            const indexStart = parseInt(canvas.dataset.indexStart || '0', 10);
            const lastIndex = indexStart + frames - 1;
            const desktopSrc = canvas.dataset.desktopSrc || '';
            const mobileSrc = canvas.dataset.mobileSrc || desktopSrc;
            const filetype = canvas.dataset.filetype || 'jpg';
            const staticSrc = canvas.dataset.staticSrc || '';

            const loaded = new Map();
            const loading = new Set();
            let lastProgress = 0;
            let ticking = false;
            let resizeTimer = null;
            let preloadStarted = false;

            const isMobile = () => window.matchMedia('(max-width: 767px)').matches;
            const baseUrl = () => isMobile() ? mobileSrc : desktopSrc;
            const pad = number => String(number).padStart(digits, '0');
            const frameUrl = index => `${baseUrl()}${pad(index)}.${filetype}`;

            function resizeCanvas() {
                const dpr = Math.min(window.devicePixelRatio || 1, 2);
                const rect = element.getBoundingClientRect();
                const width = Math.max(1, Math.round(rect.width));
                const height = Math.max(1, Math.round(rect.height));
                const nextWidth = Math.round(width * dpr);
                const nextHeight = Math.round(height * dpr);

                if (canvas.width !== nextWidth || canvas.height !== nextHeight) {
                    canvas.width = nextWidth;
                    canvas.height = nextHeight;
                    canvas.style.width = `${width}px`;
                    canvas.style.height = `${height}px`;
                }
            }

            function drawCover(image) {
                if (!image) return;
                resizeCanvas();

                const canvasWidth = canvas.width;
                const canvasHeight = canvas.height;
                const scale = Math.max(canvasWidth / image.width, canvasHeight / image.height);
                const x = (canvasWidth - image.width * scale) / 2;
                const y = (canvasHeight - image.height * scale) / 2;

                ctx.clearRect(0, 0, canvasWidth, canvasHeight);
                ctx.drawImage(image, x, y, image.width * scale, image.height * scale);

                wrap.classList.add('is-sequence-ready');
                if (fallback) fallback.classList.add('is-hidden');
            }

            function loadFrame(index, callback) {
                if (index < indexStart || index > lastIndex) return;

                if (loaded.has(index)) {
                    if (callback) callback(loaded.get(index));
                    return;
                }

                if (loading.has(index)) return;

                loading.add(index);

                const image = new Image();
                image.decoding = 'async';
                image.loading = 'eager';
                image.src = frameUrl(index);

                image.onload = () => {
                    loading.delete(index);
                    loaded.set(index, image);
                    if (callback) callback(image);
                };

                image.onerror = () => {
                    loading.delete(index);

                    if (staticSrc && index !== indexStart && !loaded.has(indexStart)) {
                        loadFrame(indexStart);
                    }
                };
            }

            function nearestLoaded(target) {
                if (loaded.has(target)) return target;

                let nearest = null;
                let diff = Infinity;

                loaded.forEach((_, index) => {
                    const currentDiff = Math.abs(index - target);
                    if (currentDiff < diff) {
                        diff = currentDiff;
                        nearest = index;
                    }
                });

                return nearest;
            }

            function drawAtProgress(progress) {
                lastProgress = clamp(progress, 0, 1);

                const target = indexStart + Math.round(lastProgress * (frames - 1));
                const nearest = nearestLoaded(target);

                if (nearest !== null) drawCover(loaded.get(nearest));

                loadFrame(target, (image) => drawCover(image));
                loadFrame(target - 1);
                loadFrame(target + 1);
                loadFrame(target - 2);
                loadFrame(target + 2);
            }

            function startProgressivePreload() {
                if (preloadStarted) return;
                preloadStarted = true;

                const order = [];

                for (let step = 8; step >= 1; step = Math.floor(step / 2)) {
                    for (let i = indexStart; i <= lastIndex; i += step) {
                        if (!order.includes(i)) order.push(i);
                    }
                }

                let cursor = 0;

                const process = () => {
                    if (cursor >= order.length) return;

                    loadFrame(order[cursor]);
                    cursor += 1;

                    const next = window.requestIdleCallback || window.requestAnimationFrame;
                    next(process);
                };

                process();
            }

            function update() {
                ticking = false;
                resizeCanvas();

                const rect = wrap.getBoundingClientRect();
                const viewport = window.innerHeight || document.documentElement.clientHeight;
                const scrollable = Math.max(1, rect.height - viewport);
                const raw = clamp(-rect.top / scrollable, 0, 1);
                const progress = reduceMotion.matches ? 0 : raw;
                const eased = easeOut(progress);

                drawAtProgress(progress);

                if (content) {
                    content.style.transform = `translate3d(0, ${(-92 * eased).toFixed(2)}px, 0)`;
                    content.style.opacity = `${clamp(1 - eased * 0.84, 0.16, 1).toFixed(3)}`;
                }

                if (facts) {
                    facts.style.transform = `translate3d(0, ${(-48 * eased).toFixed(2)}px, 0)`;
                    facts.style.opacity = `${clamp(1 - eased * 0.45, 0.48, 1).toFixed(3)}`;
                }

                if (visual) {
                    const scale = 1 + eased * 0.035;
                    visual.style.transform = `scale(${scale.toFixed(4)})`;
                }
            }

            function requestUpdate() {
                if (!ticking) {
                    window.requestAnimationFrame(update);
                    ticking = true;
                }
            }

            resizeCanvas();

            if (staticSrc && fallback) fallback.src = staticSrc;

            loadFrame(indexStart, (image) => drawCover(image));
            loadFrame(lastIndex);
            startProgressivePreload();

            window.addEventListener('scroll', requestUpdate, { passive: true });
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    resizeCanvas();
                    drawAtProgress(lastProgress);
                    requestUpdate();
                }, 150);
            });

            reduceMotion.addEventListener?.('change', requestUpdate);
            requestUpdate();
        });
    }

    function initGraciaFullWidthExperience() {
        const root = document.documentElement;
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        const revealItems = [...document.querySelectorAll('[data-reveal]')];
        const counters = [...document.querySelectorAll('[data-count]')];
        const story = document.querySelector('[data-horizontal-story]');
        const track = story?.querySelector('[data-horizontal-track]');
        const progressBar = story?.querySelector('[data-horizontal-progress]');
        const currentPanel = story?.querySelector('[data-journey-current]');
        const parallaxItems = [...document.querySelectorAll('[data-parallax]')];
        const introScene = document.querySelector('[data-intro-scene]');

        root.classList.add('has-gracia-motion');

        revealItems.forEach((item) => {
            const delay = Number(item.dataset.revealDelay || 0);
            item.style.setProperty('--reveal-delay', `${delay}ms`);
        });

        const showEverything = () => {
            revealItems.forEach((item) => item.classList.add('is-visible'));
            counters.forEach((counter) => setCounterValue(counter, 1));
        };

        const revealVisibleItems = () => {
            const viewportHeight = window.innerHeight || document.documentElement.clientHeight;

            revealItems.forEach((item) => {
                if (item.classList.contains('is-visible')) return;

                const rect = item.getBoundingClientRect();
                const isNearViewport = rect.top < viewportHeight * 1.08 && rect.bottom > -80;

                if (isNearViewport) {
                    item.classList.add('is-visible');
                }
            });
        };

        const scheduleVisibleReveal = () => {
            window.requestAnimationFrame(revealVisibleItems);
            window.setTimeout(revealVisibleItems, 120);
            window.setTimeout(revealVisibleItems, 420);
        };

        if (reduceMotion.matches || !('IntersectionObserver' in window)) {
            showEverything();
        } else {
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            }, {
                threshold: 0.04,
                rootMargin: '8% 0px -4% 0px'
            });

            revealItems.forEach((item) => revealObserver.observe(item));
            scheduleVisibleReveal();

            window.addEventListener('pageshow', scheduleVisibleReveal, { passive: true });
            window.addEventListener('hashchange', scheduleVisibleReveal, { passive: true });

            const counterObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                });
            }, {
                threshold: 0.55
            });

            counters.forEach((counter) => counterObserver.observe(counter));
        }

        function setCounterValue(counter, progress) {
            const target = Number(counter.dataset.count || 0);
            const decimals = Number(counter.dataset.countDecimals || 0);
            const suffix = counter.dataset.countSuffix || '';
            const value = target * progress;

            counter.textContent = `${value.toFixed(decimals)}${suffix}`;
        }

        function animateCounter(counter) {
            if (counter.dataset.countPlayed === 'true') return;
            counter.dataset.countPlayed = 'true';

            const duration = 1200;
            const start = performance.now();

            function frame(now) {
                const raw = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - raw, 4);

                setCounterValue(counter, eased);

                if (raw < 1) {
                    window.requestAnimationFrame(frame);
                } else {
                    setCounterValue(counter, 1);
                }
            }

            window.requestAnimationFrame(frame);
        }

        const desktopStory = window.matchMedia('(min-width: 1101px)');
        let targetScrollY = window.scrollY;
        let renderedScrollY = targetScrollY;
        let frameRequested = false;
        let resizeTimer = null;

        parallaxItems.forEach((item) => {
            item._graciaParallax = {
                current: 0,
                target: 0
            };
        });

        function clamp(value, min, max) {
            return Math.min(Math.max(value, min), max);
        }

        function updateHorizontalStory(scrollY) {
            if (!story || !track || !desktopStory.matches || reduceMotion.matches) {
                if (track) track.style.setProperty('--journey-x', '0%');
                if (progressBar) progressBar.style.transform = 'scaleX(0)';
                if (currentPanel) currentPanel.textContent = '01';
                return;
            }

            const storyTop = story.getBoundingClientRect().top + window.scrollY;
            const scrollable = Math.max(1, story.offsetHeight - window.innerHeight);
            const progress = clamp((scrollY - storyTop) / scrollable, 0, 1);
            const translated = progress * 75;
            const panel = Math.min(4, Math.floor(progress * 4) + 1);

            track.style.setProperty('--journey-x', `${(-translated).toFixed(4)}%`);

            if (progressBar) {
                progressBar.style.transform = `scaleX(${progress.toFixed(4)})`;
            }

            if (currentPanel) {
                currentPanel.textContent = String(panel).padStart(2, '0');
            }
        }

        function updateParallax(scrollY) {
            if (reduceMotion.matches) {
                parallaxItems.forEach((item) => {
                    item.style.setProperty('--parallax-y', '0px');
                });
                return;
            }

            const viewportCenter = scrollY + window.innerHeight / 2;

            parallaxItems.forEach((item) => {
                const state = item._graciaParallax;
                const speed = Number(item.dataset.parallaxSpeed || 0);
                const itemRect = item.getBoundingClientRect();
                const itemCenter = window.scrollY + itemRect.top + itemRect.height / 2;
                const rawTarget = (viewportCenter - itemCenter) * speed;

                state.target = clamp(rawTarget, -120, 120);
                state.current += (state.target - state.current) * 0.09;

                item.style.setProperty('--parallax-y', `${state.current.toFixed(2)}px`);
            });
        }

        function renderMotion() {
            frameRequested = false;
            renderedScrollY += (targetScrollY - renderedScrollY) * 0.16;

            updateHorizontalStory(renderedScrollY);
            updateParallax(renderedScrollY);

            const stillMoving = Math.abs(targetScrollY - renderedScrollY) > 0.2;
            const parallaxMoving = parallaxItems.some((item) => {
                const state = item._graciaParallax;
                return Math.abs(state.target - state.current) > 0.2;
            });

            if (stillMoving || parallaxMoving) {
                requestMotionFrame();
            }
        }

        function requestMotionFrame() {
            if (frameRequested) return;
            frameRequested = true;
            window.requestAnimationFrame(renderMotion);
        }

        function handleScroll() {
            targetScrollY = window.scrollY;
            requestMotionFrame();
        }

        function handleResize() {
            clearTimeout(resizeTimer);

            resizeTimer = window.setTimeout(() => {
                targetScrollY = window.scrollY;
                renderedScrollY = targetScrollY;
                requestMotionFrame();
            }, 120);
        }

        const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)');

        if (introScene && finePointer.matches && !reduceMotion.matches) {
            introScene.addEventListener('pointermove', (event) => {
                const rect = introScene.getBoundingClientRect();
                const x = (event.clientX - rect.left) / rect.width;
                const y = (event.clientY - rect.top) / rect.height;
                const rotateY = (x - 0.5) * 5.5;
                const rotateX = (0.5 - y) * 5.5;

                introScene.style.setProperty('--scene-rx', `${rotateX.toFixed(2)}deg`);
                introScene.style.setProperty('--scene-ry', `${rotateY.toFixed(2)}deg`);
            });

            introScene.addEventListener('pointerleave', () => {
                introScene.style.setProperty('--scene-rx', '0deg');
                introScene.style.setProperty('--scene-ry', '0deg');
            });
        }

        window.addEventListener('scroll', handleScroll, { passive: true });
        window.addEventListener('resize', () => {
            handleResize();
            scheduleVisibleReveal();
        });
        desktopStory.addEventListener?.('change', handleResize);
        reduceMotion.addEventListener?.('change', () => {
            if (reduceMotion.matches) {
                showEverything();
            }

            handleResize();
        });

        scheduleVisibleReveal();
        requestMotionFrame();
    }
})();
