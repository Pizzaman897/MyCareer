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

                    <!-- JUDUL DIPISAH -->
                    <div class="profile-title">
                        <h1>Your Personal Career Profile</h1>
                    </div>

                    <!-- GRID BARU -->
                    <div class="profile-card-shell">
                        <div class="profile-card-image">
                            <img src="/asset/Home-1.png" alt="Profile photo" />
                        </div>

                        <div class="profile-card-details">
                            <div class="profile-field">
                                <label>Full Name :</label>
                                <div>Joey Jason Lee</div>
                            </div>

                            <div class="profile-field">
                                <label>Class :</label>
                                <div>XI TKJ 3</div>
                            </div>

                            <div class="profile-field">
                                <label>School Name :</label>
                                <div>SMK K IMMANUEL 1</div>
                            </div>

                            <div class="profile-field">
                                <label>Gender :</label>
                                <div>Male</div>
                            </div>

                            <div class="profile-field">
                                <label>Tell us what you like :</label>
                                <div>Photography</div>
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
                        Based on your interests, skills, and preferences, we have identified career paths that match your profile. These recommendations are designed to help you explore opportunities that fit who you are.
                    </p>

                    <div class="recommendations-list">
                        <article class="recommendation-card" data-role="photographer">
                            <button type="button" class="card-toggle" aria-expanded="false" aria-controls="photographer-details">
                                <span>Photographer</span>
                                <span class="toggle-icon">›</span>
                            </button>
                            <p class="card-summary">A photographer captures images for events, advertising, or personal projects using cameras and editing tools.</p>
                            <div class="card-details" id="photographer-details">
                                <p>A photographer is a professional who captures images for various purposes such as events, advertising, journalism, or personal projects. They use different types of cameras, lenses, and lighting equipment to create high-quality photos that convey messages, tell stories, or preserve special moments. Creativity, technical skills, and an understanding of visual aesthetics are important for a photographer to produce compelling and meaningful photographs.</p>
                                <button type="button" class="favorite-button">Add to favorite</button>
                            </div>
                        </article>

                        <article class="recommendation-card" data-role="photojournalist">
                            <button type="button" class="card-toggle" aria-expanded="false" aria-controls="photojournalist-details">
                                <span>Photojournalist</span>
                                <span class="toggle-icon">›</span>
                            </button>
                            <p class="card-summary">A photojournalist takes photos to tell news stories and document real-life events.</p>
                            <div class="card-details" id="photojournalist-details">
                                <p>Photojournalists create visual stories by capturing newsworthy events, people, and places. They work quickly in the field to document real-life moments clearly and accurately, often under fast-moving or challenging conditions. Strong storytelling, editing, and ethical judgment are essential for sharing impactful images that help audiences understand complex events.</p>
                                <button type="button" class="favorite-button">Add to favorite</button>
                            </div>
                        </article>

                        <article class="recommendation-card" data-role="contentcreator">
                            <button type="button" class="card-toggle" aria-expanded="false" aria-controls="contentcreator-details">
                                <span>Content Creator</span>
                                <span class="toggle-icon">›</span>
                            </button>
                            <p class="card-summary">A content creator produces photos and visual content for social media platforms to engage audiences.</p>
                            <div class="card-details" id="contentcreator-details">
                                <p>Content creators develop visual stories, photography, and short-form media for social channels, blogs, and branded campaigns. They combine creative ideas, editing skills, and audience understanding to make content that grows engagement and builds a consistent online presence.</p>
                                <button type="button" class="favorite-button">Add to favorite</button>
                            </div>
                        </article>
                    </div>

                    <div class="see-more-link">
                        <a href="#">See More &gt;</a>
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
