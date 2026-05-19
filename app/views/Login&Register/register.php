<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
  <link rel="stylesheet" href="/css/register.css">
</head>
<body>

<header>
  <?php require_once '../app/views/Component/Header.php'; ?>
</header>

<!-- MAIN -->
<section class="register-section">

  <div class="container">

    <!-- LEFT IMAGE -->
    <div class="left">
      <img src="/asset/register.png" alt="illustration">
    </div>

    <!-- RIGHT FORM -->
    <div class="right">
      <h1>Create Account</h1>

      <form id="registerForm">
        <input type="text" placeholder="Email or username" required>
        <input type="text" placeholder="Phone Number" required>
        <input type="password" placeholder="Password" required>
        <input type="password" placeholder="Confirm Password" required>

        <button type="submit">Continue</button>
      </form>

      <div class="divider">
        <span></span>
        <p>Or</p>
        <span></span>
      </div>

            <div class="social-buttons">
                <a href="#" class="social-icon" aria-label="Continue with Google">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Google_Favicon_2025.svg/960px-Google_Favicon_2025.svg.png" alt="Google">
                </a>
                <a href="#" class="social-icon" aria-label="Continue with Facebook">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png" alt="Facebook">
                </a>
            </div>

      <p class="login-text">
        Have an account? <a href="/sign-in">Sign in</a>
      </p>
    </div>

  </div>

</section>

<footer>
  <?php require_once '../app/views/Component/Footer.php'; ?>
</footer>

<script src="/js/register.js"></script>
</body>
</html>