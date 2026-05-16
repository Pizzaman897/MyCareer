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
        <?php require_once '../app/views/Component/Header.php'; ?>
    </header>

    <main class="landing-page">
        <section class="hero">
            <h1>Discover Your Future Career Path</h1>

            <div class="hero-content">

                <!-- LEFT TEXT -->
                <div class="hero-left">
                    <p>
                    An interest and career path
                    exploration platform to help
                    students identify their
                    potential and plan their future
                    more purposefully.
                    </p>
                    <button>Get Started Now</button>
                </div>

                <!-- CENTER IMAGE -->
                <div class="hero-center">
                    <img src="/asset/Joey.001.png" alt="person">
                </div>

                <!-- RIGHT -->
                <div class="hero-right">
                    <img src="/asset/10-Years-Experience.png" alt="experience">
                </div>

            </div>
        </section>

        <!-- ABOUT SECTION -->
        <section class="about-section">

            <div class="about-top">

                <div class="about-left">
                    <h2>About Section</h2>
                    <h3>Empowering Students Through Smart Career Exploration</h3>

                    <img
                    src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200&auto=format&fit=crop"
                    alt="team"
                    >

                    <p>
                    Our platform provides a structured and interactive
                    system that helps students:
                    </p>

                    <ul>
                    <li>Understand themselves better</li>
                    <li>Explore career opportunities</li>
                    <li>Make informed decisions about their future</li>
                    </ul>

                    <p>
                    Modern career guidance emphasizes self-assessment,
                    exploration, and planning to help students connect their
                    interests with real career opportunities
                    </p>
                </div>

                <div class="about-right">

                    <p>
                    Many students struggle to understand which
                    career path fits them best. Information about
                    careers is often scattered and difficult to
                    connect with personal interests and skills.
                    </p>

                    <img
                    src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200&auto=format&fit=crop"
                    alt="man"
                    >

                </div>

                </div>

                <!-- FEATURES -->
                <div class="cards">

                <div class="card">
                    <h2>Features Section</h2>
                    <span>Our Core Features</span>

                    <div class="feature-box">1. Interest & Skill Tracker</div>
                    <div class="feature-box">2. Career Path Explorer</div>
                    <div class="feature-box">3. Personalized Recommendations</div>
                    <div class="feature-box">4. Career Portfolio</div>
                    <div class="feature-box">5. Guided Career Planning</div>
                </div>

                <div class="card">
                    <h2>Why This Matters</h2>

                    <h3>Bridging the Gap Between Students and Careers</h3>

                    <p>
                    Without proper guidance, students
                    often feel confused when choosing a
                    career. This platform helps by organizing
                    career information and connecting it
                    directly to each student's personal
                    profile.
                    </p>

                    <p>
                    Effective career systems help students
                    make better decisions by combining
                    interests, skills, and career data into one
                    structured platform
                    </p>
                </div>

            </div>

        </section>

        <!-- CTA -->
        <section class="cta">
            <h2>Start Building Your Future Today</h2>

            <p>
            Take control of your career journey and discover opportunities
            that match who you are.
            </p>

            <button>Get Started Now</button>
        </section>

    </main>
    
    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
</body>
</html>