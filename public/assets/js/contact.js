(() => {
    const root = document.documentElement;
    const page = document.querySelector('[data-contact-page]');

    if (!page) return;

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const revealItems = [...page.querySelectorAll('[data-contact-reveal]')];
    const parallaxItems = [...page.querySelectorAll('[data-contact-parallax]')];
    const pageProgress = document.querySelector('[data-contact-page-progress]');
    const form = page.querySelector('[data-contact-form]');
    const formProgress = page.querySelector('[data-contact-form-progress]');
    const formPercent = page.querySelector('[data-contact-form-percent]');
    const formStatus = page.querySelector('[data-contact-form-status]');
    const message = page.querySelector('[data-contact-message]');
    const characterCount = page.querySelector('[data-contact-character-count]');
    const preferredDate = page.querySelector('[data-contact-date]');
    const accordion = page.querySelector('[data-contact-accordion]');

    root.classList.add('has-contact-motion');

    initReveals();
    initScrollEngine();
    initForm();
    initAccordion();

    function initReveals() {
        revealItems.forEach((item) => {
            const delay = Number(item.dataset.contactDelay || 0);
            item.style.setProperty('--contact-delay', `${delay}ms`);
        });

        const showEverything = () => {
            revealItems.forEach((item) => item.classList.add('is-visible'));
        };

        const revealVisibleItems = () => {
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
            showEverything();
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
            window.requestAnimationFrame(revealVisibleItems);
            window.setTimeout(revealVisibleItems, 120);
            window.setTimeout(revealVisibleItems, 420);
        };

        scheduleChecks();
        window.addEventListener('pageshow', scheduleChecks, { passive: true });
        window.addEventListener('hashchange', scheduleChecks, { passive: true });
    }

    function initScrollEngine() {
        const states = parallaxItems.map((item) => ({
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

            const progress = clamp(renderedScrollY / maxScroll, 0, 1);

            if (pageProgress) {
                pageProgress.style.transform = `scaleX(${progress})`;
            }

            const viewportCenter = renderedScrollY + window.innerHeight / 2;

            states.forEach((state) => {
                if (reduceMotion.matches) {
                    state.current = 0;
                    state.target = 0;
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
                    '--contact-parallax-y',
                    `${state.current.toFixed(2)}px`
                );
            });

            const stillMoving =
                Math.abs(targetScrollY - renderedScrollY) > 0.2 ||
                states.some((state) => Math.abs(state.target - state.current) > 0.2);

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

    function initForm() {
        if (!form) return;

        const requiredFields = [...form.querySelectorAll('[data-contact-required]')];
        const allTrackedFields = [
            ...requiredFields,
            ...form.querySelectorAll('input[type="email"], select, textarea, input[type="date"], input[type="radio"]')
        ];

        const setMinimumDate = () => {
            if (!preferredDate) return;

            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');

            preferredDate.min = `${year}-${month}-${day}`;
        };

        const fieldHasValue = (field) => {
            if (field.type === 'checkbox' || field.type === 'radio') {
                if (field.type === 'radio') {
                    return Boolean(form.querySelector(`input[name="${field.name}"]:checked`));
                }

                return field.checked;
            }

            return field.value.trim() !== '';
        };

        const updateCompletion = () => {
            const uniqueGroups = [];
            const seenNames = new Set();

            requiredFields.forEach((field) => {
                const key = field.type === 'radio' ? field.name : field;

                if (seenNames.has(key)) return;

                seenNames.add(key);
                uniqueGroups.push(field);
            });

            const completed = uniqueGroups.filter(fieldHasValue).length;
            const total = Math.max(1, uniqueGroups.length);
            const percent = Math.round((completed / total) * 100);

            if (formProgress) {
                formProgress.style.transform = `scaleX(${percent / 100})`;
            }

            if (formPercent) {
                formPercent.textContent = `${percent}%`;
            }
        };

        const updateCharacterCount = () => {
            if (!message || !characterCount) return;

            if (message.value.length > 600) {
                message.value = message.value.slice(0, 600);
            }

            characterCount.textContent = String(message.value.length);
        };

        const validateRequiredFields = () => {
            let firstInvalid = null;

            requiredFields.forEach((field) => {
                const valid = fieldHasValue(field);

                field.classList.toggle('is-invalid', !valid);

                if (!valid && !firstInvalid) {
                    firstInvalid = field;
                }
            });

            return firstInvalid;
        };

        setMinimumDate();
        updateCompletion();
        updateCharacterCount();

        allTrackedFields.forEach((field) => {
            field.addEventListener('input', () => {
                field.classList.remove('is-invalid');
                updateCompletion();
                updateCharacterCount();
            });

            field.addEventListener('change', () => {
                field.classList.remove('is-invalid');
                updateCompletion();
            });
        });

        form.addEventListener('submit', (event) => {
            const firstInvalid = validateRequiredFields();

            if (!firstInvalid) {
                if (formStatus) {
                    formStatus.classList.remove('is-error');
                    formStatus.textContent = 'Submitting your enquiry…';
                }

                return;
            }

            event.preventDefault();

            if (formStatus) {
                formStatus.classList.add('is-error');
                formStatus.textContent = 'Complete the required fields before submitting.';
            }

            firstInvalid.focus({ preventScroll: true });
            firstInvalid.scrollIntoView({
                behavior: reduceMotion.matches ? 'auto' : 'smooth',
                block: 'center'
            });
        });
    }

    function initAccordion() {
        if (!accordion) return;

        const items = [...accordion.querySelectorAll('.contactFaqItem')];

        items.forEach((item) => {
            const button = item.querySelector('button');

            if (!button) return;

            button.addEventListener('click', () => {
                const shouldOpen = !item.classList.contains('is-open');

                items.forEach((currentItem) => {
                    currentItem.classList.remove('is-open');

                    const currentButton = currentItem.querySelector('button');
                    currentButton?.setAttribute('aria-expanded', 'false');
                });

                if (shouldOpen) {
                    item.classList.add('is-open');
                    button.setAttribute('aria-expanded', 'true');
                }
            });
        });
    }
})();
