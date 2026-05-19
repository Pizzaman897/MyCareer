<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MyCareer</title>
    <link rel="stylesheet" href="/css/contact.css">
</head>
<body>

<header>
    <?php require_once '../app/views/Component/Header.php'; ?>
</header>

<main class="contact-page">

    <!-- TOP WHITE SECTION -->
    <section class="contact-hero">
        <div class="container">

            <div class="badge">Contact Us</div>

            <h1>Contact Us</h1>
            <h2>We’d Love to Hear From You</h2>

            <p>
                Have questions, feedback, or need help?
                Feel free to reach out to us anytime.
                We’re here to support your career journey.
            </p>

            <!-- INFO CARDS -->
            <div class="info-cards">

                <div class="card">
                    <h3>Call center</h3>
                    <p>Customer Support<br>+62 812–3456–7890</p>
                    <p>Hotline (24/7)<br>+62 800–1234–567</p>
                </div>

                <div class="card">
                    <h3>Email</h3>
                    <p>General Support<br>support@careerpathway.id</p>
                    <p>Career Guidance<br>career@careerpathway.id</p>
                </div>

                <div class="card">
                    <h3>Our location</h3>
                    <p>
                        Jl. Ahmad Yani No.123<br>
                        Pontianak, West Kalimantan<br>
                        Indonesia 78124
                    </p>
                </div>

                <div class="card">
                    <h3>Office Hours</h3>
                    <p>
                        Monday - Friday: 08:00 - 17:00<br>
                        Saturday: 09:00 - 14:00<br>
                        Sunday: Closed
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- FORM SECTION -->
    <section class="contact-form-section">
        <div class="container form-wrapper">

            <div class="form-box">
                <h2>Send Us a Message</h2>

                <label>Full Name :</label>
                <input type="text" placeholder="Enter your name">

                <label>Email :</label>
                <input type="email" placeholder="Enter your email">

                <label>Message :</label>
                <textarea placeholder="Enter your message"></textarea>

                <button>Sent a message</button>
            </div>

            <div class="form-image">
                <img src="/asset/Lewis.001.png" alt="person">
            </div>

        </div>
    </section>

    <!-- THANK YOU SECTION -->
    <section class="thank-you">
        <div class="container">
            <div class="overlay">
                <div class="bg-contact">
                    <img src="/asset/Career-bg.png" alt="person">
                </div>
                <h2>Thank you for contacting us!</h2>
                <p>
                    We appreciate your message and will respond shortly.
                    Your questions and feedback mean a lot to us.
                </p>
            </div>
        </div>
    </section>

</main>

<footer>
    <?php require_once '../app/views/Component/Footer.php'; ?>
</footer>

</body>
</html>