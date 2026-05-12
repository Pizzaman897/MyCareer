<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCareer – Landing</title>
    <link rel="stylesheet" href="/css/landing.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <main class="landing-page">
        <section class="hero-section">
            <div class="hero-top">
                <h1>Discover Your Future Career Path</h1>
            </div>

            <div class="hero-grid">
                <div class="hero-copy">
                    <p>
                        An interest and career path exploration platform to help students identify their potential and plan their future more purposefully.
                    </p>
                    <a class="hero-button" href="/interests">Get Started Now</a>
                </div>

                <div class="hero-stack">
                    <div class="hero-bg-ellipse">
                        <img src="/asset/Ellipse 11.png" alt="Landing background ellipse">
                    </div>
                    <div class="hero-image-frame">
                        <img src="/asset/joey-mid.png" alt="Joey center hero image">
                    </div>
                </div>

                <div class="hero-stats">
                    <img src="/asset/10star.png" alt="5 star rating">

                </div>
            </div>
        </section>

        <section class="about-section">
            <div class="about-head">
                <div>
                    <h2>About Section</h2>
                    <p>Empowering Students Through Smart Career Exploration</p>
                </div>
                <p class="about-text">
                    Many students struggle to understand which career path fits them best. Information about careers is often scattered and difficult to connect with personal interests and skills.
                </p>
            </div>

            <div class="about-grid">
                <div class="about-card about-card-left">
                    <img src="/asset/image 4.png" alt="Career exploration illustration">
                    <div class="about-card-copy">
                        <p>Our platform provides a structured and interactive system that helps students:</p>
                        <ul>
                            <li>Understand themselves better</li>
                            <li>Explore career opportunities</li>
                            <li>Make informed decisions about their future</li>
                        </ul>
                        <p>Modern career guidance emphasizes self-assessment, exploration, and planning to help students connect their interests with real career opportunities.</p>
                    </div>
                </div>
                <div class="about-card about-card-right">
                    <img src="/asset/image 5.png" alt="Career planning illustration">
                </div>
            </div>
        </section>

        <section class="features-section">
            <div class="feature-panel">
                <h3>Features Section</h3>
                <p>Our Core Features</p>
                <ol>
                    <li>Interest & Skill Tracker</li>
                    <li>Career Path Explorer</li>
                    <li>Personalized Recommendations</li>
                    <li>Career Portfolio</li>
                    <li>Guided Career Planning</li>
                </ol>
            </div>

            <div class="feature-panel feature-panel-secondary">
                <h3>Why This Matters</h3>
                <p>Bridging the Gap Between Students and Careers</p>
                <p>
                    Without proper guidance, students often feel confused when choosing a career. This platform helps by organizing career information and connecting it directly to each student’s personal profile.
                </p>
                <p>
                    Effective career systems help students make better decisions by combining interests, skills, and career data into one structured platform.
                </p>
            </div>
        </section>

        <section class="cta-section">
            <div class="cta-copy">
                <h2>Start Building Your Future Today</h2>
                <p>Take control of your career journey and discover opportunities that match who you are.</p>
                <a class="hero-button" href="/interests">Get Started Now</a>
            </div>
        </section>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
    </main>
</body>
</html>