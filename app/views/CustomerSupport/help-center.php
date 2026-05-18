<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCareer – Help Center</title>
    <link rel="stylesheet" href="/css/helpcenter.css">
</head>
<body>

<header>
    <?php require_once '../app/views/Component/Header.php'; ?>
</header>

<main class="help-page">

    <!-- HERO -->
    <section class="hero">
        <div class="container">

            <div class="badge">Help Center</div>

            <h1>How Can We Help You?</h1>

            <p>
            Find answers, explore guides, and get
            support to make the most of your career journey.
            </p>

            <div class="search-box">
                <input type="text" placeholder="Search for help...">
                <button>Search</button>
            </div>

        </div>
    </section>

    <!-- CONTENT -->
    <section class="content">
        <div class="container">

            <h2 class="topic-title">Popular Topics</h2>

            <div class="bg-person">
                <img src="/asset/Jose.001.png" alt="person">
            </div>

            <div class="topics">

                <div class="topic-card">
                    <h3>Saved Careers</h3>
                    <ul>
                        <li>How to save a career?</li>
                        <li>How to remove a favorite career?</li>
                        <li>How to track my progress?</li>
                    </ul>
                </div>

                <div class="topic-card">
                    <h3>Career Recommendations</h3>
                    <ul>
                        <li>How are recommendations generated?</li>
                        <li>Why do I get suggestions?</li>
                        <li>How to improve recommendations?</li>
                    </ul>
                </div>

                <div class="topic-card center">
                    <h3>Getting Started</h3>
                    <ul>
                        <li>How to create account</li>
                        <li>How to complete profile</li>
                        <li>How to start career exploration</li>
                    </ul>
                </div>

                <div class="topic-card">
                    <h3>Portfolio & Profile</h3>
                    <ul>
                        <li>How to create a career portfolio?</li>
                        <li>How to add projects and skills?</li>
                        <li>How to edit or update my profile?</li>
                    </ul>
                </div>

                <div class="topic-card">
                    <h3>Account & Security</h3>
                    <ul>
                        <li>Is my data safe?</li>
                        <li>How do I reset my password?</li>
                        <li>Can I delete my account?</li>
                    </ul>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="bottom-btn">
                <button class="left" onclick="window.location.href='contact'">← Go to Contact Us</button>
                <button class="right" onclick="window.location.href='faq'">Go to FAQ →</button>
            </div>

        </div>
    </section>

</main>

<footer>
    <?php require_once '../app/views/Component/Footer.php'; ?>
</footer>

</body>
</html>