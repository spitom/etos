import Carousel from 'bootstrap/js/dist/carousel';

// Add your custom JS here.

// Search bar: move focus to the field after opening.
document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('etosSearchBar');

    if (!searchBar) {
        return;
    }

    searchBar.addEventListener('shown.bs.collapse', function () {
        const searchField = searchBar.querySelector(
            'input[type="search"][name="s"]'
        );

        if (!searchField) {
            return;
        }

        searchField.focus();
        searchField.select();
    });
});

// Search bar: close on Escape.
document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('etosSearchBar');

    if (!searchBar) {
        return;
    }

    document.addEventListener('keydown', function (event) {
        if (
            event.key !== 'Escape' ||
            !searchBar.classList.contains('show')
        ) {
            return;
        }

        const closeButton = searchBar.querySelector(
            '.etos-search-bar__close'
        );

        if (!closeButton) {
            return;
        }

        event.preventDefault();
        closeButton.click();
    });
});

// About page: animate existing statistics when visible.
document.addEventListener('DOMContentLoaded', function () {
    const counters = document.querySelectorAll(
        '[data-etos-counter]'
    );

    if (!counters.length) {
        return;
    }

    const reduceMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    const animateCounter = function (counter) {
        if (counter.dataset.counterAnimated === 'true') {
            return;
        }

        counter.dataset.counterAnimated = 'true';

        const rawValue = (
            counter.dataset.counterValue ||
            counter.textContent ||
            ''
        ).trim();

        const match = rawValue.match(/\d+(?:[.,]\d+)?/);

        if (!match || reduceMotion) {
            counter.textContent = rawValue;
            return;
        }

        const numberText = match[0];

        const target = Number(
            numberText.replace(',', '.')
        );

        if (!Number.isFinite(target)) {
            counter.textContent = rawValue;
            return;
        }

        const prefix = rawValue.slice(
            0,
            match.index
        );

        const suffix = rawValue.slice(
            match.index + numberText.length
        );

        const duration = 1300;
        const startedAt = performance.now();

        const render = function (now) {
            const elapsed = Math.min(
                (now - startedAt) / duration,
                1
            );

            const progress =
                1 - Math.pow(1 - elapsed, 3);

            const current = Math.round(
                target * progress
            );

            counter.textContent =
                prefix +
                current +
                suffix;

            if (elapsed < 1) {
                window.requestAnimationFrame(render);
                return;
            }

            counter.textContent = rawValue;
        };

        counter.textContent =
            prefix +
            '0' +
            suffix;

        window.requestAnimationFrame(render);
    };

    if (!('IntersectionObserver' in window)) {
        counters.forEach(animateCounter);
        return;
    }

    const observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }

                animateCounter(entry.target);
                observer.unobserve(entry.target);
            });
        },
        {
            threshold: 0.25,
        }
    );

    counters.forEach(function (counter) {
        observer.observe(counter);
    });
});

// News carousel: accessible autoplay pause/resume control.
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector(
        '[data-etos-news-autoplay-toggle]'
    );

    if (!toggle) {
        return;
    }

    const carouselId = toggle.getAttribute('aria-controls');

    if (!carouselId) {
        return;
    }

    const carouselElement = document.getElementById(carouselId);

    if (!carouselElement) {
        return;
    }

    const liveRegion = carouselElement.querySelector(
        '.carousel-inner'
    );

    const icon = toggle.querySelector(
        'span[aria-hidden="true"]'
    );

    const pauseLabel = toggle.dataset.labelPause || '';
    const resumeLabel = toggle.dataset.labelResume || '';

    const carousel = Carousel.getOrCreateInstance(
        carouselElement
    );

    let userPaused = false;

    const updateState = function () {
        if (userPaused) {
            carousel.pause();

            if (resumeLabel) {
                toggle.setAttribute(
                    'aria-label',
                    resumeLabel
                );
            }

            if (icon) {
                icon.textContent = '▶';
            }

            if (liveRegion) {
                liveRegion.setAttribute(
                    'aria-live',
                    'polite'
                );
            }

            return;
        }

        carousel.cycle();

        if (pauseLabel) {
            toggle.setAttribute(
                'aria-label',
                pauseLabel
            );
        }

        if (icon) {
            icon.textContent = '❚❚';
        }

        if (liveRegion) {
            liveRegion.setAttribute(
                'aria-live',
                'off'
            );
        }
    };

    toggle.addEventListener('click', function () {
        userPaused = !userPaused;
        updateState();
    });

    /*
     * Bootstrap resumes a hover-paused carousel on mouseleave.
     * Preserve an explicit user pause after that event.
     */
    carouselElement.addEventListener(
        'mouseleave',
        function () {
            if (userPaused) {
                carousel.pause();
            }
        }
    );
});

// ETOS contact form: preselect department from ?dzial=.
document.addEventListener('DOMContentLoaded', function () {
    const formSection = document.getElementById(
        'kontakt-formularz'
    );

    if (!formSection) {
        return;
    }

    const department = new URLSearchParams(
        window.location.search
    ).get('dzial');

    if (!department) {
        return;
    }

    const select = formSection.querySelector(
        'select[name="select-1"]'
    );

    if (!select) {
        return;
    }

    const hasOption = Array.from(select.options).some(
        function (option) {
            return option.value === department;
        }
    );

    if (!hasOption) {
        return;
    }

    select.value = department;

    select.dispatchEvent(
        new Event('change', {
            bubbles: true,
        })
    );
});

// ETOS vendor promo: responsive InsERT banner.
document.addEventListener('DOMContentLoaded', function () {
    const promo = document.querySelector(
        '.etos-vendor-promo'
    );

    if (!promo) {
        return;
    }

    const desktopFrame = promo.querySelector(
        '.etos-vendor-promo__frame--desktop'
    );

    const mobileFrame = promo.querySelector(
        '.etos-vendor-promo__frame--mobile'
    );

    if (!desktopFrame || !mobileFrame) {
        return;
    }

    const mediaQuery = window.matchMedia(
        '(max-width: 767.98px)'
    );

    const loadFrame = function (frame) {
        const src = frame.dataset.src;

        if (
            src &&
            frame.getAttribute('src') !== src
        ) {
            frame.setAttribute('src', src);
        }
    };

    const unloadFrame = function (frame) {
        if (frame.hasAttribute('src')) {
            frame.removeAttribute('src');
        }
    };

    const updatePromoFrame = function () {
        if (mediaQuery.matches) {
            unloadFrame(desktopFrame);
            loadFrame(mobileFrame);
            return;
        }

        unloadFrame(mobileFrame);
        loadFrame(desktopFrame);
    };

    updatePromoFrame();

    if (
        typeof mediaQuery.addEventListener === 'function'
    ) {
        mediaQuery.addEventListener(
            'change',
            updatePromoFrame
        );
    } else {
        mediaQuery.addListener(updatePromoFrame);
    }
});

// ETOS typography: prevent Polish one-letter orphans.
document.addEventListener('DOMContentLoaded', function () {
    const root = document.body;

    if (!root) {
        return;
    }

    const pattern =
        /(^|[^0-9A-Za-zĄĆĘŁŃÓŚŹŻąćęłńóśźż])([AIOUWZaiouwz])([ \t\r\n\f]+)/g;

    const walker = document.createTreeWalker(
        root,
        NodeFilter.SHOW_TEXT,
        {
            acceptNode: function (node) {
                const parent = node.parentElement;

                if (!parent || !node.nodeValue.trim()) {
                    return NodeFilter.FILTER_REJECT;
                }

                if (
                    parent.closest(
                        'script, style, code, pre, textarea, input, select, option, [contenteditable="true"], [data-etos-no-orphans]'
                    )
                ) {
                    return NodeFilter.FILTER_REJECT;
                }

                return NodeFilter.FILTER_ACCEPT;
            },
        }
    );

    const textNodes = [];
    let node;

    while ((node = walker.nextNode())) {
        textNodes.push(node);
    }

    textNodes.forEach(function (textNode) {
        textNode.nodeValue = textNode.nodeValue.replace(
            pattern,
            '$1$2\u00A0'
        );
    });
});
