document.querySelectorAll('.gender-btn').forEach(button => {
    button.addEventListener('click', function() {
        const result = document.getElementById('result');
        result.style.display = 'block';
        result.style.color = '#065f46';
        result.textContent = `Selected: ${this.dataset.gender}. Proceeding...`;
        setTimeout(() => {
            window.location.href = '/interests4';
        }, 600);
    });
});
