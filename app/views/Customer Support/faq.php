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

    <footer class="faq-footer">
        <div class="faq-footer-grid">
            <div class="faq-footer-col">
                <h4>Company</h4>
                <a href="/about">About Us</a>
                <a href="/mail">Mail</a>
                <a href="/favorite">Favorite</a>
            </div>
            <div class="faq-footer-col">
                <h4>Customer Support</h4>
                <a href="/help">Help Center</a>
                <a href="/faq">FAQ</a>
                <a href="/contact">Contact Us</a>
            </div>
            <div class="faq-footer-col">
                <h4>Legal</h4>
                <a href="/privacy">Privacy Policy</a>
                <a href="/terms">Terms of Service</a>
                <a href="/cookies">Cookies Policy</a>
            </div>
            <div class="faq-footer-col social-col">
                <h4>Follow Us :</h4>
                <div class="social-links">
                    <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/330px-Instagram_logo_2022.svg.png" alt="Instagram">
                    </a>
                    <a href="https://www.x.com" target="_blank" rel="noopener noreferrer" aria-label="X">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/X_logo_2023_%28white%29.png/960px-X_logo_2023_%28white%29.png?_=20230728230735" alt="X">
                    </a>
                    <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png" alt="Facebook">
                    </a>
                    <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/YouTube_full-color_icon_%282017%29.svg/1280px-YouTube_full-color_icon_%282017%29.svg.png?_=20240107144800" alt="YouTube">
                    </a>
                </div>
            </div>
        </div>
        <div class="faq-footer-copy">© 2025 MovieStream. All rights reserved.</div>
    </footer>
</body>
</html>
