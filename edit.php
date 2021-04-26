<?php
    require_once "core/init.php";

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
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $gambar = $_POST['gambar'];

        if (!empty(trim($nama)) && !empty(trim($deskripsi))) {
            if (editData($nama, $deskripsi, $harga, $gambar, $id)) {
                header("Location: dashboard.php");
            } else{
                $error = "ada masalah saat mengupdate data";
            }
        } else{
            $error = "data tidak boleh kosong";
        }
    }

    require_once "view/header.php";
?>
    <h1 class="text-center mt-5">Update Barang</h1>

    <div class="container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Buah</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama_awal ?>">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control"><?= $desc_awal ?></textarea>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?= $harga_awal ?>">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar" value="<?= $gambar_awal ?>">
            </div>

            <!-- untuk menampilkan error -->
            <?php if ($error != '') { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php } ?>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
<?php
    require_once "view/footer.php";
?>