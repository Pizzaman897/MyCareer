document.addEventListener('DOMContentLoaded', function () {
    // Expand/collapse behavior (same as home.js)
    const cards = document.querySelectorAll('.recommendation-card, .favorite-card');

    cards.forEach((card) => {
        const toggleButton = card.querySelector('.card-toggle');
        const details = card.querySelector('.card-details');

        if (toggleButton && details) {
            toggleButton.addEventListener('click', () => {
                const expanded = toggleButton.getAttribute('aria-expanded') === 'true';
                card.classList.toggle('expanded');
                toggleButton.setAttribute('aria-expanded', (!expanded).toString());
            });
        }
    });

    // Remove favorite handling
    document.querySelectorAll('.favorite-remove-button').forEach((btn) => {
        btn.addEventListener('click', async () => {
            const id = btn.getAttribute('data-career-path-id');
            if (!id) return;

            try {
                const res = await fetch('/favorite/remove', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'career_path_id=' + encodeURIComponent(id)
                });

                if (!res.ok) throw new Error('Request failed');

                // remove from UI
                const card = btn.closest('.recommendation-card, .favorite-card');
                if (card) card.remove();
            } catch (e) {
                alert('Failed to remove favorite');
            }
        });
    });
});

