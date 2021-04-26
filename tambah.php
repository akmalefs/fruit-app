<?php
    require_once "core/init.php";

    $error = '';

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $gambar = $_POST['gambar'];

        if (!empty(trim($nama)) && !empty(trim($deskripsi)) && !empty(trim($harga)) && !empty(trim($gambar))) {
            if (tambahData($nama, $deskripsi, $harga, $gambar)) {
                header("Location: dashboard.php");
            } else{
                $error = "ada masalah saat menambah data";
            }
        } else{
            $error = "data tidak boleh kosong";
        }
    }

    require_once "view/header.php";
?>
    <h1 class="text-center mt-5">Tambah Barang</h1>

    <div class="container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Buah</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar">
            </div>

            <!-- untuk menampilkan error -->
            <?php if ($error != '') { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php } ?>

            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
<?php
    require_once "view/footer.php";
?>