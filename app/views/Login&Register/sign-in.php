<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="/css/signin.css">
</head>
<body>

<header>
  <?php require_once '../app/views/Component/Header.php'; ?>
</header>

<section class="login-section">

  <div class="container">

    <!-- LEFT -->
    <div class="left">
      <h1>Sign in</h1>

      <form id="loginForm">
        <input type="text" placeholder="Email atau nomor telepon" required>
        <input type="password" placeholder="Password" required>

        <div class="options">
          <label>
            <input type="checkbox"> Remember me
          </label>
          <a href="#">Forgot password?</a>
        </div>

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

      <p class="register-text">
        Don’t have an account? <a href="register">Create Account</a>
      </p>
    </div>

    <!-- RIGHT -->
    <div class="right">
      <img src="/asset/Sign-in.png" alt="illustration">
    </div>

  </div>

</section>

<footer>
  <?php require_once '../app/views/Component/Footer.php'; ?>
</footer>

<script src="/js/signin.js"></script>
</body>
</html>