const continueBtn = document.getElementById('continueBtn');
const nameInput = document.getElementById('name');
const result = document.getElementById('result');

continueBtn.addEventListener('click', function () {
    const name = nameInput.value.trim();
    if (!name) {
        result.style.display = 'block';
        result.textContent = 'Please enter your name to continue.';
        result.style.color = '#dc2626';
        return;
    }
    result.style.display = 'block';
    result.textContent = `Great, ${name}! Step 2 complete.`;
    result.style.color = '#065f46';
    setTimeout(() => {
        window.location.href = '/interests3';
    }, 600);
});
