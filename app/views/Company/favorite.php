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

            <section class="recommendations-list">

                <article class="recommendation-card">
                    <button type="button" class="card-toggle" aria-expanded="false">
                        <span>Photographer</span>
                        <span class="toggle-icon">›</span>
                    </button>

                    <p class="card-summary">
                        A photographer captures images for events, advertising, or personal projects using cameras and editing tools.
                    </p>

                    <div class="card-details">
                        <p>
                            A photographer is a professional who captures images for various purposes such as events, advertising, journalism, or personal projects. They use different types of cameras, lenses, and lighting equipment to create high-quality photos that convey messages, tell stories, or preserve special moments. In addition to taking pictures, a photographer also uses editing software to enhance and refine images, adjusting aspects like color, brightness, and composition. Creativity, technical skills, and an understanding of visual aesthetics are important for a photographer to produce compelling and meaningful photographs.
                        </p>

                        <button type="button" class="remove-button">
                            Remove from favorite
                        </button>
                    </div>
                </article>

            </section>
        </div>
    </main>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>

    <script src="/js/favorite.js"></script>
</body>
</html>
