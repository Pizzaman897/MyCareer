<?php
$email = $email ?? '';
$password = $password ?? '';
$remember = $remember ?? '';
$slot = $slot ?? 'user_slot';
$message = $message ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="/css/signin.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>
    <main class="signin-page">
        <section class="signin-card">
            <?php if (!empty($message)): ?>
                <div class="message-banner"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <h1>Sign in</h1>

            <form class="signin-form" action="/signin" method="post">
                <input type="hidden" name="slot" value="<?= htmlspecialchars($slot) ?>">

                <input type="text" class="form-input" name="email" placeholder="Email atau nomor telepon" value="<?= htmlspecialchars($email) ?>" autocomplete="username">

                <input type="password" class="form-input" name="password" placeholder="Password" value="<?= htmlspecialchars($password) ?>" autocomplete="current-password">

                <div class="form-row">
                    <label class="checkbox-group">
                        <input type="checkbox" name="remember" <?= $remember ?>>
                        Remember me
                    </label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>

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

            <p class="bottom-note">Don't have an account? <a href="/register">Create Account</a></p>
        </section>

        <aside class="side-panel">
            <div class="side-image">
                <img src="/asset/Foto Signin.png" alt="Sign in illustration">
            </div>
        </aside>
    </main>

    <script src="/js/signin.js" defer></script>
</body>
</html>
