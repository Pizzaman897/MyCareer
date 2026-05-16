<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCareer – Favorite</title>
    <link rel="stylesheet" href="/css/favorite.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <main class="favorite-page">
        <div class="favorite-content">
        <section class="favorite-header">
            <h1>Your Saved Career Choices</h1>
            
            <p class="favorite-description">Here are the careers you’ve marked as your favorites. Keep track of the paths you’re most interested in and explore them further.</p>
        </section>

        <section class="favorite-list">
            <article class="favorite-card">
                <div>
                    <h2>Photographer</h2>
                    <p>A photographer captures images for events, advertising, or personal projects using cameras and editing tools.</p>
                </div>
                <span class="favorite-card-icon">›</span>
            </article>
        </section>
        </div>
    </main>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
</body>
</html>
