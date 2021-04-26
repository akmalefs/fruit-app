<?php
    require_once 'core/init.php';
    require_once 'view/header.php';
    require_once 'view/navbar.php';

    $products = tampilkan();
?>

<section id="product">
  <div class="container">
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
    require_once 'view/footer.php';
?>