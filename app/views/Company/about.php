<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCareer – About Us</title>
    <link rel="stylesheet" href="/css/about.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <main class="about-page">
        <section class="about-hero">
            <div class="about-hero__content">
                <span class="about-badge">About Us</span>
                <h1>Empowering Students to Discover Their Future</h1>
                <p>We are a digital platform designed to help students explore their interests, understand their skills, and discover the right career path with confidence. Many students struggle to choose a career because information is scattered and difficult to connect with their personal strengths. Our platform solves this problem by providing a structured, easy-to-use system that brings everything together in one place.</p>
            </div>

            <div class="team-grid">
                <div class="team-card"><img src="/asset/jose.png" alt="Team member"></div>
                <div class="team-card"><img src="/asset/edwa.png" alt="Team member"></div>
                <div class="team-card"><img src="/asset/jeoy.png" alt="Team member"></div>
                <div class="team-card"><img src="/asset/lews.png" alt="Team member"></div>
            </div>
        </section>

        <section class="about-dark">
            <div class="about-dark__top">
                <div class="about-left-panel">
                    <div class="missionvision-card">
                        <div class="mission-section">
                            <h2>Our Mission</h2>
                            <p>Our mission is to guide students in making informed career decisions by connecting their interests, skills, and potential with real career opportunities. We aim to simplify career exploration and make it accessible, clear, and meaningful for every student.</p>
                        </div>

                        <div class="vision-section">
                            <h2>Our Vision</h2>
                            <p>We envision a future where every student has a clear understanding of their potential and a well-planned path toward their dream career.</p>
                        </div>
                    </div>

                    <div class="about-card about-card--whatwedo">
                        <div class="whatwedo-text">
                            <h2>What We Do</h2>
                            <p>We provide tools that help students:</p>
                            <ul>
                                <li>Record and understand their interests and skills</li>
                                <li>Explore various career options and industries</li>
                                <li>Get personalized career recommendations</li>
                                <li>Plan and track their career journey</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="about-illustration">
                    <img src="/asset/ewashow.png" alt="Career guidance illustration">
                </div>
            </div>
        </section>

        <section class="about-bottom">
            <div class="about-bottom__left">
                <h2>Why We Exist</h2>
                <p>Students often feel confused when choosing a career due to a lack of guidance and organized information. Schools need a system that helps students connect their personal interests with real career opportunities. Our platform bridges this gap by turning complex career information into a simple and interactive experience.</p>
            </div>
            <div class="about-bottom__right">
                <h2>Our Goal</h2>
                <p>To become a trusted platform that supports students in building their future—step by step, from self-discovery to career planning.</p>
            </div>
        </section>
    </main>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
</body>
</html>
