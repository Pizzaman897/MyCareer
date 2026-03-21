        const continueBtn = document.getElementById('continueBtn');
        const birthdayInput = document.getElementById('birthday');
        const result = document.getElementById('result');

        continueBtn.addEventListener('click', function () {
            if (!birthdayInput.value) {
                result.style.display = 'block';
                result.style.color = '#dc2626';
                result.textContent = 'Please select your birthday to continue.';
                return;
            }
            result.style.display = 'block';
            result.style.color = '#065f46';
            result.textContent = 'Great! Redirecting to next step...';
            setTimeout(() => {
                window.location.href = '/interests2';
            }, 400);
        });