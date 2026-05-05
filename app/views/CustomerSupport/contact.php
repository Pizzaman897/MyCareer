<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MyCareer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/contact.css">
</head>
<body>
    <header>
        <?php require_once __DIR__ . '/../component/Header.php'; ?>
    </header>

    <main class="contact-page">
        <section class="contact-hero">
            <div class="contact-badge">Contact Us</div>
            <div class="contact-hero-copy">
                <h1>Contact Us</h1>
                <p class="contact-subtitle">We’d Love to Hear From You</p>
                <p class="contact-description">Have questions, feedback, or need help? Feel free to reach out to us anytime. We’re here to support your career journey.</p>
            </div>
        </section>

        <section class="contact-cards">
            <article class="contact-card">
                <h3>Call center</h3>
                <p>Customer Support</p>
                <p class="contact-strong">+62 812–3456–7890</p>
                <p>Hotline (24/7)</p>
                <p class="contact-strong">+62 800–1234–567</p>
            </article>
            <article class="contact-card">
                <h3>Email</h3>
                <p>General Support</p>
                <p class="contact-strong">support@careerpathway.id</p>
                <p>Career Guidance</p>
                <p class="contact-strong">career@careerpathway.id</p>
            </article>
            <article class="contact-card">
                <h3>Our location</h3>
                <p>Jl. Ahmad Yani No. 123</p>
                <p>Pontianak, West Kalimantan</p>
                <p>Indonesia 78124</p>
            </article>
            <article class="contact-card">
                <h3>Office Hours</h3>
                <p>Monday – Friday:</p>
                <p class="contact-strong">08:00 – 17:00</p>
                <p>Saturday:</p>
                <p class="contact-strong">09:00 – 14:00</p>
                <p>Sunday: Closed</p>
            </article>
        </section>
         </main>
         <main class="contact-form">
        <section class="contact-form-section">
            <div class="contact-form-panel">
                <h2>Send Us a Message</h2>
                <form>
                    <label for="contact-name">Full Name :</label>
                    <input id="contact-name" type="text" placeholder="Enter your name">

                    <label for="contact-email">Email :</label>
                    <input id="contact-email" type="email" placeholder="Enter your email">

                    <label for="contact-message">Message :</label>
                    <textarea id="contact-message" rows="7" placeholder="Enter your message"></textarea>

                    <button type="submit">Send a message</button>
                </form>
            </div>
            <div class="contact-image-panel">
            <img src="/asset/lewisnelpon.png" alt="Contact illustration">
            </div>
        </section>
        </main> 
        <section class="contact-thanks">
            <div class="contact-thanks-overlay"></div>
            <div class="contact-thanks-content">
                <h2>Thank you for contacting us!</h2>
                <p>We appreciate your message and will respond shortly. Your questions and feedback mean a lot to us.</p>
            </div>
        </section>
   

    <footer>
        <?php require_once __DIR__ . '/../component/Footer.php'; ?>
    </footer>
</body>
</html>
