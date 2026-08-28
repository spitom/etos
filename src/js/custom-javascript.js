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
