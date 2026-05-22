<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Sign In</title>
  <link rel="stylesheet" href="/css/signin.css">
</head>
<body>

<section class="login-section">

  <div class="container">

    <!-- LEFT -->
    <div class="left">
      <h1>Admin Sign in</h1>

      <?php if (!empty($message)): ?>
        <div class="alert-message"><?= htmlspecialchars($message, ENT_QUOTES) ?></div>
      <?php endif; ?>

      <form id="loginForm" method="POST" action="/sign-in-admin">
        <input type="text" name="email" value="<?= htmlspecialchars($email ?? '', ENT_QUOTES) ?>" placeholder="Email admin" required>
        <input type="password" name="password" placeholder="Password" required>
        <div class="options">
            <label>
                <input type="checkbox" name="remember" <?= !empty($remember) ? 'checked' : '' ?>> Remember me
            </label>
        </div>
        <button type="submit">Continue</button>
      </form>

      <div class="divider">
        <span></span>
        <p>Or</p>
        <span></span>
      </div>

      <p class="register-text">
        Back to user login? <a href="/sign-in">Go to sign in</a>
      </p>
    </div>

    <!-- RIGHT -->
    <div class="right">
      <img src="/asset/Sign-in.png" alt="illustration">
    </div>

  </div>

</section>

<script src="/js/signin.js"></script>
</body>
</html>
