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