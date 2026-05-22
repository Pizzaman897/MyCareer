<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Career Profile - MyCareer</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <main class="home-page">
        <div class="page-shell">
            <div class="page-shell-inner">
                <section class="profile-section">

                    <div class="profile-title">
                        <h1>Your Personal Career Profile</h1>
                    </div>

                    <div class="profile-card-shell">

                        <div class="profile-card-details">
                            <div class="profile-field">
                                <label>Full Name :</label>
                                <div><?php echo htmlspecialchars($profile['name'] ?? ''); ?></div>
                            </div>

                            <div class="profile-field">
                                <label>Class :</label>
                                <div><?php echo htmlspecialchars($profile['class'] ?? ''); ?></div>
                            </div>

                            <div class="profile-field">
                                <label>School Name :</label>
                                <div><?php echo htmlspecialchars($profile['school'] ?? ''); ?></div>
                            </div>

                            <div class="profile-field">
                                <label>Gender :</label>
                                <div><?php echo htmlspecialchars($profile['gender'] ?? ''); ?></div>
                            </div>

                            <div class="profile-field">
                                <label>Tell us what you like :</label>
                                <div>
                                    <?php
                                    $interests = $interests ?? $_SESSION['career_profile']['interests'] ?? [];
                                    if (!empty($interests)) {
                                        echo htmlspecialchars(implode(', ', $interests), ENT_QUOTES);
                                    } else {
                                        echo '-';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label>&nbsp;</label>
                                <div>
                                    <a class="edit-interest-link" href="/interests/edit">Edit interest</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                <section class="recommendations-section">
                    <div class="recommendations-header">
                        <div>
                            <h2>Career Recommendations</h2>
                            <h3>Your Personalized Career Path</h3>
                        </div>
                    </div>

                    <p class="recommendation-intro">
                        Based on your interests, skills, and preferences, we have identified career paths that match your profile.
                        These recommendations are designed to help you explore opportunities that fit who you are.
                    </p>

                    <div class="recommendations-list">
                        <?php if (!empty($recommended)) : ?>
                            <?php foreach ($recommended as $i => $cp) : ?>
                                <?php
                                    $detailsId = 'reco-details-' . $i;
                                    $careerPathId = (int)($cp['career_path_id'] ?? 0);
                                    $isFav = !empty($favoriteIds[$careerPathId]);
                                ?>
                                <article class="recommendation-card">
                                    <button type="button" class="card-toggle" aria-expanded="false" aria-controls="<?php echo $detailsId; ?>">
                                        <span><?php echo htmlspecialchars($cp['name'] ?? ''); ?></span>
                                        <span class="toggle-icon">›</span>
                                    </button>

                                    <p class="card-summary"><?php echo htmlspecialchars($cp['description'] ?? ''); ?></p>

                                    <div class="card-details" id="<?php echo $detailsId; ?>">
                                        <p><?php echo htmlspecialchars($cp['more_info'] ?? ''); ?></p>
                                        <button type="button"
                                                class="favorite-button<?php echo $isFav ? ' active' : ''; ?>"
                                                data-career-path-id="<?php echo $careerPathId; ?>">
                                            <?php echo $isFav ? 'Added to favorite' : 'Add to favorite'; ?>
                                        </button>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No recommendations found. Please complete your profile interests first.</p>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>

    <script src="/js/home.js"></script>
</body>
</html>

