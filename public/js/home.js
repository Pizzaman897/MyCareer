document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.recommendation-card');

    cards.forEach((card) => {
        const toggleButton = card.querySelector('.card-toggle');
        const details = card.querySelector('.card-details');
        const favoriteButton = card.querySelector('.favorite-button');

        if (!toggleButton || !details) {
            return;
        }

        toggleButton.addEventListener('click', () => {
            const expanded = toggleButton.getAttribute('aria-expanded') === 'true';
            card.classList.toggle('expanded');
            toggleButton.setAttribute('aria-expanded', (!expanded).toString());
        });

        if (favoriteButton) {
            favoriteButton.addEventListener('click', () => {
                favoriteButton.classList.toggle('active');
                favoriteButton.textContent = favoriteButton.classList.contains('active') ? 'Added to favorite' : 'Add to favorite';
            });
        }
    });
});
