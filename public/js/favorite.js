document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.recommendation-card');

    cards.forEach((card) => {
        const toggleButton = card.querySelector('.card-toggle');
        const removeButton = card.querySelector('.remove-button');

        // EXPAND
        toggleButton.addEventListener('click', () => {
            const expanded = toggleButton.getAttribute('aria-expanded') === 'true';

            card.classList.toggle('expanded');
            toggleButton.setAttribute('aria-expanded', (!expanded).toString());
        });

        // REMOVE
        if (removeButton) {
            // animasi hilang (opsional tapi keren)
            removeButton.addEventListener('click', () => {

                // langsung kasih class (animasi mulai)
                card.classList.add('removing');

                // hapus setelah animasi selesai
                card.addEventListener('transitionend', () => {
                    card.remove();
                }, { once: true });

            });
        }
    });
});