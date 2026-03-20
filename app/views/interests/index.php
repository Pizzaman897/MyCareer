<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interests - MyCareer</title>
    <link rel="stylesheet" href="/css/interest.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>
    <div class="page-wrap">
        <main class="interests-card" aria-label="Interest information card">
            <div class="header-bar">
                <a href="/" class="back-link" aria-label="Go back">←</a>
                <div class="progress-dots">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="content-section">
                <h1>When is your birthday?</h1>
                <p class="lead">Your age helps us provide more suitable interest and career recommendations.</p>
            </div>

            <form id="birthdayForm" onsubmit="return false;">
                <input type="date" id="birthday" name="birthday" required aria-label="Enter your birthday" />
                <div class="button-container">
                    <button type="button" class="submit" id="continueBtn">Continue</button>
                </div>
            </form>

            <p id="result" class="terms" style="display:none;margin-top:0;"></p>
            <p class="terms">
                By continuing, you agree to MyCareer's <a href="#">Terms of Service</a> 
                and acknowledge you've read our <a href="#">Privacy Policy</a>.
            </p>
        </main>
    </div>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
    <script>
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
    </script>
</body>
</html>