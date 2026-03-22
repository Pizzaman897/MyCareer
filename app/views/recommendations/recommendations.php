<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Recommendations - MyCareer</title>
    <link rel="stylesheet" href="/css/recommendations.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <main class="recommendations-container">
        <h1 class="recommendations-title">Career Recommendations</h1>

        <section class="recommendations-category">
            <h2 class="category-title">Photography</h2>

            <div class="recommendations-grid">
                <div class="recommendation-card">
                    <h3 class="card-title">Photographer</h3>
                    <p class="card-description">A photographer captures images for events, advertising, or personal projects using cameras and editing tools.</p>
                </div>

                <div class="recommendation-card">
                    <h3 class="card-title">Photojournalist</h3>
                    <p class="card-description">A photojournalist takes photos to tell news stories and document real-life events.</p>
                </div>

                <div class="recommendation-card">
                    <h3 class="card-title">Content Creator</h3>
                    <p class="card-description">A content creator produces photos and visual content for social media platforms to engage audiences.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
</body>
</html>
