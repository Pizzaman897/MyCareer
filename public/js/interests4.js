const cards = document.querySelectorAll('.interest-card');
const continueBtn = document.getElementById('continueBtn');
const result = document.getElementById('selectionResult');

const updateCTA = () => {
    const selected = document.querySelectorAll('.interest-card.selected');
    continueBtn.disabled = selected.length === 0;
    continueBtn.textContent = selected.length === 0 ? 'Continue' : `Continue (${selected.length})`;
    if (selected.length === 0) {
        result.style.display = 'none';
        result.textContent = '';
    } else {
        result.style.display = 'block';
        result.textContent = `${selected.length} interest(s) selected.`;
        result.style.color = '#065f46';
    }
};

cards.forEach(card => {
    card.addEventListener('click', () => {
        const selected = document.querySelectorAll('.interest-card.selected');
        if (!card.classList.contains('selected') && selected.length >= 3) {
            result.style.display = 'block';
            result.style.color = '#dc2626';
            result.textContent = 'You can only select up to 3 interests.';
            return;
        }
        card.classList.toggle('selected');
        updateCTA();
    });
    card.addEventListener('keypress', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            card.click();
        }
    });
});

continueBtn.addEventListener('click', () => {
    const selected = Array.from(document.querySelectorAll('.interest-card.selected')).map(c => c.dataset.interest);
    if (selected.length === 0) {
        result.style.display = 'block';
        result.style.color = '#dc2626';
        result.textContent = 'Please select at least one interest.';
        return;
    }
    result.style.display = 'block';
    result.style.color = '#065f46';
    result.textContent = 'Great! Redirecting to the next step...';
    setTimeout(() => {
        window.location.href = '/interests5';
    }, 400);
});

updateCTA();
