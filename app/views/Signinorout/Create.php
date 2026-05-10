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
    <main class="create-page">
        <aside class="side-panel">
            <div class="side-image">
                <img src="/asset/create.png" alt="Create account illustration">
            </div>
        </aside>

        <section class="create-card">
            <?php if (!empty($message)): ?>
                <div class="message-banner"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <h1>Create Account</h1>

            <form class="create-form" action="/create" method="post">
                <input type="hidden" name="slot" value="<?= htmlspecialchars($slot) ?>">

                <label class="field">
                    <span>Email or username</span>
                    <input type="text" name="email" placeholder="Email or username" value="<?= htmlspecialchars($email) ?>" autocomplete="username">
                </label>

                <label class="field">
                    <span>Phone Number</span>
                    <input type="tel" name="phone" placeholder="Phone Number" value="<?= htmlspecialchars($phone) ?>" autocomplete="tel">
                </label>

                <label class="field">
                    <span>Password</span>
                    <input type="password" name="password" placeholder="Password" value="<?= htmlspecialchars($password) ?>" autocomplete="new-password">
                </label>

                <label class="field">
                    <span>Confirm Password</span>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?= htmlspecialchars($confirm_password) ?>" autocomplete="new-password">
                </label>

                <button type="submit" class="cta-button">Continue</button>
            </form>

            <div class="divider">Or</div>

            <div class="social-buttons">
                <a href="#" class="social-button">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Google_Favicon_2025.svg/960px-Google_Favicon_2025.svg.png" alt="Google logo">
                    Continue with Google
                </a>
                <a href="#" class="social-button">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png" alt="Facebook logo">
                    Continue with Facebook
                </a>
            </div>

            <p class="bottom-note">Have san account? <a href="/signin">Sign in</a></p>
        </section>
    </main>

    <script src="/js/create.js" defer></script>
</body>
</html>
