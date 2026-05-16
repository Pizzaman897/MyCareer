<?php
$email = $email ?? '';
$phone = $phone ?? '';
$password = $password ?? '';
$confirm_password = $confirm_password ?? '';
$slot = $slot ?? 'user_slot';
$message = $message ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="/css/create.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>
    <main class="create-page">
        <aside class="side-panel">
            <div class="side-image">
                <img src="/asset/Foto Create Account.png" alt="Create account illustration">
            </div>
        </aside>

        <section class="create-card">
            <?php if (!empty($message)): ?>
                <div class="message-banner"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <h1>Create Account</h1>

            <form class="create-form" action="/create" method="post">
                <input type="hidden" name="slot" value="<?= htmlspecialchars($slot) ?>">

                <input type="text" class="form-input" name="email" placeholder="Email or username" value="<?= htmlspecialchars($email) ?>" autocomplete="username">

                <input type="tel" class="form-input" name="phone" placeholder="Phone Number" value="<?= htmlspecialchars($phone) ?>" autocomplete="tel">

                <input type="password" class="form-input" name="password" placeholder="Password" value="<?= htmlspecialchars($password) ?>" autocomplete="new-password">

                <input type="password" class="form-input" name="confirm_password" placeholder="Confirm Password" value="<?= htmlspecialchars($confirm_password) ?>" autocomplete="new-password">

                <button type="submit" class="cta-button">Continue</button>
            </form>

            <div class="divider">Or</div>

            <div class="social-buttons">
                <a href="#" class="social-icon" aria-label="Continue with Google">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Google_Favicon_2025.svg/960px-Google_Favicon_2025.svg.png" alt="Google">
                </a>
                <a href="#" class="social-icon" aria-label="Continue with Facebook">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png" alt="Facebook">
                </a>
            </div>

            <p class="bottom-note">Have san account? <a href="/signin">Sign in</a></p>
        </section>
    </main>
    <script src="/js/create.js" defer></script>
</body>
</html>
