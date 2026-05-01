<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCareer – Mail</title>
    <link rel="stylesheet" href="/css/mail.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

    <main class="mail-page">
        <section class="mail-toolbar">
            <button class="mail-chip active">View all <span>12</span></button>
            <button class="mail-chip">Mentions <span>6</span></button>
            <button class="mail-chip">Followers <span>4</span></button>
            <button class="mail-chip">Invites <span>2</span></button>
        </section>

        <div class="mail-list">
            <div class="mail-item">
                <div class="mail-item-avatar">
                    <img src="/asset/Ellipse 11.png" alt="@Fransiskus michael lee">
                </div>
                <div class="mail-item-content">
                    <h3>@Fransiskus michael lee</h3>
                    <p>Monday, 23 March 2026</p>
                </div>
                <div class="mail-item-meta">
                    <span class="mail-item-time">2 hours ago</span>
                    <div class="mail-item-indicator"></div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>
</body>
</html>
