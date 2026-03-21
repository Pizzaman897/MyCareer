<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interests - MyCareer Step 4</title>
    <link rel="stylesheet" href="/css/interest.css">
    <link rel="stylesheet" href="/css/interests4.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <div class="page-wrap">
        <main class="interests-card" aria-label="Interest selection card">
            <div class="header-bar">
                <a href="/interests3" class="back-link" aria-label="Go back">←</a>
                <div class="progress-dots" aria-label="Progress">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="active"></span>
                </div>
            </div>

            <div class="content-section">
                <h1>What are your interests?</h1>
            </div>

            <div class="interests-grid" role="group" aria-label="Interest options">
                <?php
                $interests = [
                    ['label' => 'Reading', 'image' => '/asset/Reading.png'],
                    ['label' => 'Writing', 'image' => '/asset/Writing.png'],
                    ['label' => 'Drawing', 'image' => '/asset/Drawing.png'],
                    ['label' => 'Playing Music', 'image' => '/asset/Playing Music.png'],
                    ['label' => 'Sport', 'image' => '/asset/Sport.png'],
                    ['label' => 'Playing games', 'image' => '/asset/Playing games.png'],
                    ['label' => 'Photography', 'image' => '/asset/Photography.png'],
                    ['label' => 'Cooking', 'image' => '/asset/Cooking.png'],
                    ['label' => 'Farming', 'image' => '/asset/Farming.png'],
                    ['label' => 'Watching Movies', 'image' => '/asset/Watching Movies.png'],
                ];

                foreach ($interests as $interest): ?>
                <button type="button" class="interest-card" data-interest="<?php echo htmlspecialchars($interest['label']); ?>">
                    <span class="card-image" style="background-image:url('<?php echo htmlspecialchars($interest['image']); ?>');" aria-hidden="true"></span>
                    <span class="card-label"><?php echo htmlspecialchars($interest['label']); ?></span>
                    <span class="checkmark" aria-hidden="true">✓</span>
                </button>
                <?php endforeach; ?>
            </div>

            <div class="button-container">
                <button type="button" class="submit" id="continueBtn" disabled>Continue</button>
            </div>

            <p id="selectionResult" class="terms" aria-live="polite"></p>
        </main>
    </div>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
    <script src="/js/interests4.js"></script>
</body>
</html>
