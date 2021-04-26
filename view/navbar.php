<header class="jumbotron">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand text-warning" href="#">Fruit-App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">

            <?php if (!isset($_SESSION["user"])) : ?>
            <a class="nav-link active text-warning" aria-current="page" href="#">Home</a>
            <a class="nav-link text-warning" href="#">Features</a>
            <a class="nav-link text-warning" href="#">Pricing</a>
            <a class="nav-link text-warning" href="login.php">Login</a>
            <a class="nav-link text-warning" href="register.php">Register</a>
            <?php elseif (isset($_SESSION["user"])) : ?>
            <a href="detail_pembelian.php" class="nav-link text-warning" >History Orderan</a>
            <a class="nav-link text-warning" href="<?php
                if (cek_role($_SESSION['user']) == "admin") {
                  echo "dashboard.php";
                } else{
                  echo "index.php";
                }
              ?>">Halo, <?= $_SESSION['user'] ?></a>
            <a class="nav-link text-warning" href="logout.php">Logout</a>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <?php require_once "view/hero.php" ?>

</header>
