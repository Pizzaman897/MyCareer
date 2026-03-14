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
        <?php require_once __DIR__ . '/../component/Header.php'; ?>
    </header>

    <main class="landing-hero">
        <div class="landing-hero-content">
            <h1>Find Your Passion, Determine Your Future</h1>
            <p>An interest and career path exploration platform to help students identify their potential and plan their future more purposefully.</p>
            <a class="landing-hero-cta" href="/menu">START</a>
        </div>

        <div class="landing-hero-image">
            <img src="/asset/Landing-Page-Picture.png" alt="Students planning their future">
        </div>
    </main>
    <footer>
        <?php require_once __DIR__ . '/../component/Footer.php'; ?>
    </footer>
</body>
</html>