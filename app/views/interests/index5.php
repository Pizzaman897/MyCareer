<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interests - Summary</title>
    <link rel="stylesheet" href="/css/interest.css">
    <link rel="stylesheet" href="/css/interests5.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <div class="page-wrap">
        <main class="interests-card" aria-label="Final recommendation card" style="text-align:center;">
            <div class="content-section">
                <h1>According to your choice</h1>
            </div>
            <div class="final-stage">
                <div class="card-group">
                    <div class="final-card card-left" id="cardA"><img src="/asset/Playing games.png" alt="Playing games"></div>
                    <div class="final-card card-middle" id="cardB"><img src="/asset/Photography.png" alt="Photography"></div>
                    <div class="final-card card-right" id="cardC"><img src="/asset/Playing Music.png" alt="Playing Music"></div>
                </div>
            </div>

            <div class="button-container">
                <button type="button" class="submit" onclick="window.location.href='/home'">Go to Home</button>
            </div>
        </main>
    </div>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
    <script src="/js/interests5.js"></script>
</body>
</html>
