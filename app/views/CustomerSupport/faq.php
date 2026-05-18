<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - MyCareer</title>
    <link rel="stylesheet" href="/css/faq.css">
</head>
<body>

<header>
    <?php require_once '../app/views/Component/Header.php'; ?>
</header>

<main class="faq-page">

    <section class="faq-container">
        <div class="container">
            <div class="badge">FAQ</div>

                <h1>Frequently Asked Question</h1>

                <p>
                    Here are some of the most frequently asked 
                    questions to help you understand how the 
                    platform works.
                </p>

                <!-- SEARCH -->
                <div class="search-box">
                    <input type="text" placeholder="What is your problem ?">
                </div>

                <!-- ACCORDION -->
                <div class="faq-list">

                    <div class="faq-item">
                        <div class="faq-title">General Questions <span>⌄</span></div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-title">Account & Profile <span>⌄</span></div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-title">Career Recommendations <span>⌄</span></div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-title">Portfolio <span>⌄</span></div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-title">Favorite Careers <span>⌄</span></div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-title">Technical Support <span>⌄</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<footer>
    <?php require_once '../app/views/Component/Footer.php'; ?>
</footer>

</body>
</html>