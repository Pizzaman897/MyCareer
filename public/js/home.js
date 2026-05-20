document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.recommendation-card');

    cards.forEach((card) => {
        const toggleButton = card.querySelector('.card-toggle');
        const details = card.querySelector('.card-details');
        const favoriteButton = card.querySelector('.favorite-button');

        if (!toggleButton || !details) return;

        // EXPAND
        toggleButton.addEventListener('click', () => {
            const expanded = toggleButton.getAttribute('aria-expanded') === 'true';
            card.classList.toggle('expanded');
            toggleButton.setAttribute('aria-expanded', (!expanded).toString());
        });

        // FAVORITE
        if (favoriteButton) {
            favoriteButton.addEventListener('click', async () => {
                const careerPathId = favoriteButton.getAttribute('data-career-path-id');
                if (!careerPathId) return;

                try {
                    const res = await fetch('/favorite/add', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'career_path_id=' + encodeURIComponent(careerPathId)
                    });

                    if (!res.ok) throw new Error('Request failed');

                    favoriteButton.classList.add('active');
                    favoriteButton.textContent = 'Added to favorite';
                } catch (e) {
                    alert('Failed to add favorite');
                }
            });
        }
    });
});

