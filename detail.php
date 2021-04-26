<?php
    require_once "core/init.php";

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    $id = $_GET['id'];
    if (isset($_GET['id'])) {
        //membuat variabel untuk menampung data
        $product = tampilkan_per_id($id);
        while ($row = mysqli_fetch_assoc($product)) {
            $id = $row['id_product'];
            $nama_awal = $row['nama'];
            $desc_awal = $row['deskripsi'];
            $harga_awal = $row['harga'];
            $gambar_awal = $row['gambar'];
        }
    }

    require_once "view/header.php";
?>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand text-warning" href="#">Fruit-App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">

            <?php if (!isset($_SESSION["user"])) : ?>
            <a class="nav-link active text-warning" aria-current="page" href="index.php">Home</a>
            <a class="nav-link text-warning" href="#">Features</a>
            <a class="nav-link text-warning" href="#">Pricing</a>
            <a class="nav-link text-warning" href="login.php">Login</a>
            <a class="nav-link text-warning" href="register.php">Register</a>
            <?php elseif (isset($_SESSION["user"])) : ?>    
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

<div class="container mt-5">


    <h1 class="text-center mb-5">Detail Product</h1>

<div class="card">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Buah : <?= $nama_awal ?></h5>
    <p class="card-text">Deskripsi : <?= $desc_awal ?></p>
    <p class="card-text text-muted">Harga : <?= $harga_awal ?></p>
    <?php if (cek_role($_SESSION['user']) == "user") : ?>
    <a href="checkout.php?id=<?= $id ?>" class="btn btn-primary">Beli Sekarang</a>
    <?php elseif(cek_role($_SESSION['user']) == "admin") : ?>
    <a href="edit.php?id=<?= $id?>" class="btn btn-warning">Edit</a>
    <a href="hapus.php?id=<?= $id ?>" class="btn btn-danger">Hapus</a>
    <?php endif; ?>
  </div>
</div>
</div>

<?php
    require_once "view/footer.php";
?>