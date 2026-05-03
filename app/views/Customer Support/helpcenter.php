<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Center - MyCareer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/helpcenter.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <main class="main-help-wrapper">

        <!-- ── HERO ── -->
        <section class="help-hero">
            <div class="help-badge-wrapper">
                <div class="help-badge">Help Center</div>
            </div>

            <h1>How Can We Help You?</h1>
            <p>Find answers, explore guides, and get support to make the most of your career journey.</p>

            <div class="help-search-panel">
                <span aria-hidden="true">
                    <!-- Search icon -->
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 4a7 7 0 105.48 11.373l4.624 4.624 1.414-1.414-4.624-4.624A7 7 0 0011 4zm0 2a5 5 0 110 10 5 5 0 010-10z" fill="currentColor"/>
                    </svg>
                    <input type="search" placeholder="Search for help..." aria-label="Search help topics">
                </span>
                <button type="button">Search</button>
            </div>
        </section>

        <!-- ── POPULAR TOPICS ── -->
        <section class="help-section">
            <div class="help-section-title">
                <span></span>
                <h2>Popular Topics</h2>
            </div>

            <!--
                Grid layout (5 cols):
                Col 1 → Saved Careers card
                Col 2 → Career Recommendations card
                Col 3 → Center image (character)
                Col 4 → Portfolio & Profile card
                Col 5 → Account & Security card

                Getting Started card sits BELOW the image, centred
            -->
            <div class="help-topics-grid">

                <!-- Col 1: Saved Careers -->
                <div class="help-topic-card">
                    <h3>Saved Careers</h3>
                    <ul>
                        <li>How to save a career?</li>
                        <li>How to remove a favorite career?</li>
                        <li>How to track my progress?</li>
                    </ul>
                </div>

                <!-- Col 2: Career Recommendations -->
                <div class="help-topic-card">
                    <h3>Career Recommendations</h3>
                    <ul>
                        <li>How are career recommendations generated?</li>
                        <li>Why do I get these career suggestions?</li>
                        <li>How to improve my recommendations?</li>
                    </ul>
                </div>

                <!-- Col 3: Center image -->
                <div class="help-topic-center">
                    <img src="/asset/Jose membantu.png" alt="Help Center illustration">
                </div>

                <!-- Col 4: Portfolio & Profile -->
                <div class="help-topic-card">
                    <h3>Portfolio &amp; Profile</h3>
                    <ul>
                        <li>How to create a career portfolio?</li>
                        <li>How to add projects and skills?</li>
                        <li>How to edit or update my profile?</li>
                    </ul>
                </div>

                <!-- Col 5: Account & Security -->
                <div class="help-topic-card">
                    <h3>Account &amp; Security</h3>
                    <ul>
                        <li>Is my data safe?</li>
                        <li>How do I reset my password?</li>
                        <li>Can I delete my account?</li>
                    </ul>
                </div>

            </div><!-- /.help-topics-grid -->

            <!-- Getting Started — below the grid, centred under the image -->
            <div class="help-getting-started-row">
                <div class="help-topic-card help-getting-started-card">
                    <h3>Getting Started</h3>
                    <ul>
                        <li>How to create your account</li>
                        <li>How to complete your profile</li>
                        <li>How to start your career exploration</li>
                    </ul>
                </div>
            </div>

            <!-- CTA buttons -->
            <div class="help-cta-row">
                <a class="help-cta-button secondary" href="/contact">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12h16M4 6h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Go to Contact Us
                </a>

                <a class="help-cta-button primary" href="/faq">
                    Go to FAQ
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </section>

    </main>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
</body>
</html>