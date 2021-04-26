<?php
    require_once "core/init.php";
    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    $products = tampilkan();
    require_once "view/header.php";
?>
    <h1 class="text-center mt-5">Dashboard Admin</h1>
    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav m-auto">
        <a class="nav-link" href="tambah.php">Tambah Barang</a>
        <a class="nav-link" href="history_pembelian.php">History Pembelian</a>
        <a class="nav-link" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>



<section id="product">
  <div class="container mt-5">
    <div class="row text-center mb-3">
      <div class="col">
        <h3>Product</h3>
      </div>
    </div>

    <div class="row"> 
      <?php foreach ($products as $row) : ?>
      <div class="col-md-4">
        <div class="card mb-3">
          <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title"><?= $row['nama'] ?></h5>
                <p class="card-text"><?= $row['deskripsi']?></p>
                <a href="detail.php?id=<?= $row['id_product'] ?>" class="btn btn-warning">Detail Barang</a>
            </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php
    require_once "view/footer.php";
?>