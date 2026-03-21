<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interests - MyCareer Step 2</title>
    <link rel="stylesheet" href="/css/interest.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>
    <div class="page-wrap">
        <main class="interests-card" aria-label="Interest information card">
            <div class="header-bar">
                <a href="/interests" class="back-link" aria-label="Go back">←</a>
                <div class="progress-dots">
                    <span></span>
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="content-section">
                <h1>Nice to meet you!<br>What’s your name?</h1>
                <p class="lead">We'll use your name to personalize your experience.</p>
            </div>

            <form id="nameForm" onsubmit="return false;">
                <input type="text" id="name" name="name" placeholder="Nama" aria-label="Enter your name" required />
                <div style="font-size:12px; color:#4b5563; margin-top:-5px; margin-bottom:8px;">edwardsufok200@gmail.com</div>
                <div class="button-container">
                    <button type="button" class="submit" id="continueBtn">Continue</button>
                </div>
            </form>

            <p id="result" class="terms" style="display:none;margin-top:0;"></p>
            <div style="height:20px;"></div>
        </main>
    </div>
    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
    <script src="/js/interests2.js"></script>
</body>
</html>
