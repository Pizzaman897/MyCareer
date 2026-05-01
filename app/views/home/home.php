<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interests - MyCareer</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <header>
        <?php require_once '../app/views/component/Header.php'; ?>
    </header>

  <div class="kartu-profil">
    <div class="profil-card">
      <div class="profile-image">
        <img src="https://via.placeholder.com/172" alt="Edward Hans Reinaldo" />
      </div>
      <div class="profile-info">
        <h2>Edward Hans Reinaldo</h2>
        <p><strong>Birth date:</strong> 12 Desember 1959</p>
        <p><strong>Gender:</strong> Female</p>
        <p><strong>E-Mail:</strong> edwardsufok200@gmail.com</p>
        <p><strong>Phone:</strong> +62 823-4456-7789</p>
      </div>
    </div>
  </div>
 
  <!-- ===== BAGIAN MINAT ===== -->
  <div class="bagian-minat">
    <h3>Your Interests</h3>
    <p>Click the arrow on the right to view recommended careers.</p>
 
    <!-- Item Minat 1 -->
    <div class="item-minat">
      <span>Photography</span>
      <div class="panah">→</div>
    </div>
 
    <!-- Item Minat 2 -->
    <div class="item-minat">
      <span>Playing Music</span>
      <div class="panah">→</div>
    </div>
 
    <!-- Item Minat 3 -->
    <div class="item-minat">
      <span>Playing Games</span>
      <div class="panah">→</div>
    </div>
  </div>
 
  <!-- ===== LIHAT LEBIH ===== -->
  <div class="lihat-lebih">
    <a href="#">See More</a>
  </div>
 
   <footer>
        <?php require_once '../app/views/component/Footer.php'; ?>
    </footer>

</body>
</html>