<?php
    require_once "core/init.php";

    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
    }

    $error = '';

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

    if (isset($_POST['submit'])) {
        $nama_pembeli = $_POST['nama'];
        $email_pembeli = $_POST['email'];
        $telepon_pembeli = $_POST['telepon'];
        $product_dibeli = $_POST['product'];
        $alamat_pembeli = $_POST['alamat'];
        $harga = $_POST['harga'];

        if (!empty($nama_pembeli) && !empty($telepon_pembeli)) {
            if (checkout($nama_pembeli, $email_pembeli, $telepon_pembeli, $product_dibeli, $alamat_pembeli, $harga)) {
                header("Location: detail_pembelian.php");
            } else {
                $error = "ada masalah saat checkout";
            }
        } else {
            $error = "data harus di isi";
        }
    }

    require_once "view/header.php";
?>

<div class="container">
    <h1 class="text-center mt-5">Checkout Pembelian</h1>

    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Nama Product : <?= $nama_awal?></h5>
                    <p class="card-text">Deskripsi : <?= $desc_awal ?></p>
                    <p class="card-text text-muted">Harga : <?= $harga_awal?> </p>
                </div>  
            </div>
        </div>

        <div class="col">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Username Pembeli</label>
                    <input type="text" class="form-control" id="nama" name="nama">    
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon">
                </div>

                <div class="mb-3">
                    <label for="product" class="form-label">Nama Product</label>
                    <input type="text" class="form-control" id="product" name="product" value="<?= $nama_awal?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $harga_awal ?>" readonly>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Bayar Sekarang</button>
            </form>
        </div>
    </div>
</div>

<?php
    require_once "view/footer.php";
?>