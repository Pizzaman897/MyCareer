<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favorites - MyCareer</title>
    <link rel="stylesheet" href="/css/favorite.css">
</head>
<body>
<header>
    <?php require_once '../app/views/component/Header.php'; ?>
</header>

<main class="favorite-page">
    <div class="page-shell">
        <div class="page-shell-inner">
            <section class="favorite-intro">
                <div class="favorite-header">
                    <h1>Your Favorite Career Paths</h1>
                    <p>Saved careers you can explore anytime.</p>
                </div>

                <p class="favorite-description">
                    These career paths are your bookmarked recommendations. Remove any entry when you're ready to refine your list.
                </p>
            </section>

            <?php if (empty($favorites)) : ?>
                <div class="favorite-empty">
                    <h2>No favorites yet</h2>
                    <p>You haven't saved any favorites yet. Explore recommendations and add your top career paths here.</p>
                </div>
            <?php else : ?>
                <div class="recommendations-list favorite-list">
                    <?php foreach ($favorites as $i => $f) : ?>
                        <?php
                            $detailsId = 'fav-details-' . $i;
                            $careerPathId = (int)($f['career_path_id'] ?? 0);
                        ?>
                        <article class="recommendation-card favorite-card" data-career-path-id="<?php echo $careerPathId; ?>">
                            <button type="button" class="card-toggle" aria-expanded="false" aria-controls="<?php echo $detailsId; ?>">
                                <span><?php echo htmlspecialchars($f['name'] ?? ''); ?></span>
                                <span class="toggle-icon">›</span>
                            </button>

                            <p class="card-summary"><?php echo htmlspecialchars($f['description'] ?? ''); ?></p>

                            <div class="card-details" id="<?php echo $detailsId; ?>">
                                <p><?php echo htmlspecialchars($f['more_info'] ?? ''); ?></p>
                                <div class="favorite-actions">
                                    <button type="button" class="favorite-remove-button" data-career-path-id="<?php echo $careerPathId; ?>">Remove</button>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
                        
    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
<script src="/js/favorite.js"></script>
</body>
</html>

