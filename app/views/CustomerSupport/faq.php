<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - MyCareer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/faq.css">
</head>
<body>
    <header>
        <?php require_once __DIR__ . '/../component/Header.php'; ?>
    </header>

    <main class="faq-page">
        <div class="faq-shell">
            <div class="faq-hero">
                <div class="faq-badge">FAQ</div>
                <div class="faq-hero-copy">
                    <h1>Frequently Asked Question</h1>
                    <p>Here are some of the most frequently asked questions to help you understand how the platform works.</p>
                </div>
            </div>

            <div class="faq-search-panel">
                <label class="faq-search" for="faq-search-input">
                    <span class="faq-search-icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 4a7 7 0 105.48 11.373l4.624 4.624 1.414-1.414-4.624-4.624A7 7 0 0011 4zm0 2a5 5 0 110 10 5 5 0 010-10z" fill="currentColor"/>
                        </svg>
                    </span>
                    <input id="faq-search-input" type="search" placeholder="What is your problem ?" aria-label="Search FAQ">
                </label>
            </div>

            <div class="faq-accordion">
                <details class="faq-item">
                    <summary>General Questions</summary>
                    <p>Find answers to the most commonly asked questions about account setup, navigation, and platform use.</p>
                </details>

                <details class="faq-item">
                    <summary>Account &amp; Profile</summary>
                    <p>Everything you need to know about profile settings, account management, privacy, and security.</p>
                </details>

                <details class="faq-item">
                    <summary>Career Recommendations</summary>
                    <p>Learn how our recommendation engine works and how to get better career suggestions.</p>
                </details>

                <details class="faq-item">
                    <summary>Portfolio</summary>
                    <p>Understand how to build, edit, and share your portfolio inside the platform.</p>
                </details>

                <details class="faq-item">
                    <summary>Favorite Careers</summary>
                    <p>Learn how to save, organize, and access your favorite career paths quickly.</p>
                </details>

                <details class="faq-item">
                    <summary>Technical Support</summary>
                    <p>Get help with bugs, performance issues, and technical questions about the platform.</p>
                </details>
            </div>
        </div>
    </main>

    <footer>
        <?php require_once __DIR__ . '/../component/Footer.php'; ?>
    </footer>
</body>
</html>
