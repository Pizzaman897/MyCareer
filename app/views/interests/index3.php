<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interests - MyCareer Step 3</title>
    <link rel="stylesheet" href="/css/interest.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <div class="page-wrap">
        <main class="interests-card" aria-label="Interest information card">
            <div class="header-bar">
                <a href="/interests2" class="back-link" aria-label="Go back">←</a>
                <div class="progress-dots">
                    <span></span>
                    <span></span>
                    <span class="active"></span>
                    <span></span>
                </div>
            </div>

            <div class="content-section" style="text-align:left;">
                <h1>What is your gender?</h1>
            </div>

            <div class="button-container">
                <button type="button" class="submit gender-btn" data-gender="Female">Female</button>
                <button type="button" class="submit gender-btn" data-gender="Male">Male</button>
                <button type="button" class="submit gender-btn" data-gender="Other">Other</button>
            </div>

            <p id="result" class="terms" style="display:none; margin-top:0; text-align:center;"></p>
            <div style="height:20px;"></div>
        </main>
    </div>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
    <script src="/js/interests3.js"></script>
</body>
</html>