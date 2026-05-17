<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCareer – About Us</title>
    <link rel="stylesheet" href="/css/about-us.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <main class="about-page">
        <section class="about-top">
            <h1>About Us</h1>
            <h3>Empowering Students to Discover Their Future</h3>

            <p class="desc">
                We are a digital platform designed to help students explore their interests, understand their skills, and discover the right career path with confidence.
                Many students struggle to choose a career because information is scattered and difficult to connect with their personal strengths. Our platform solves this problem by providing a structured, easy-to-use system that brings everything together in one place.
            </p>

            <!-- TEAM -->
            <div class="team">
                <div class="member"><img src="/asset/Jose.png"></div>
                <div class="member"><img src="/asset/Edward.png"></div>
                <div class="member"><img src="/asset/Joey.png"></div>
                <div class="member"><img src="/asset/Lewis.png"></div>
            </div>
        </section>

        <!-- MISSION -->
        <section class="mission">
            <h2>Our Mission</h2>
            <p>
                Our mission is to guide students in making informed career decisions by connecting their interests,
                skills, and potential with real career opportunities.
            </p>

            <h2>Our Vision</h2>
            <p>
                We envision a future where every student has a clear understanding of their potential and a well-planned path.
            </p>
        </section>

            <!-- WHAT WE DO -->
        <section class="what-we-do">
            <div class="left">
                <h2>What We Do</h2>
                <p>We provide tools that help students:</p>

                <div class="pill">Record and understand their interests and skills</div>
                <div class="pill">Explore various career options and industries</div>
                <div class="pill">Get personalized career recommendations</div>
                <div class="pill">Plan and track their career journey</div>
            </div>

            <div class="right">
                <img src="/asset/Edward.001.png" alt="person">
            </div>
        </section>

            <!-- BOTTOM -->
        <section class="bottom">
            <div class="why">
                <h2>Why We Exist</h2>
                <p>
                    Students often feel confused when choosing a career due to a lack of guidance and organized information. Schools need a system that helps students connect their personal interests with real career opportunities.
                    Our platform bridges this gap by turning complex career information into a simple and interactive experience.
                </p>
            </div>

            <div class="goal">
                <h2>Our Goal</h2>
                <p>
                    To become a trusted platform that supports students in building their future—step by step, from self-discovery to career planning.
                </p>
            </div>
        </section>

    </main>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
</body>
</html>
