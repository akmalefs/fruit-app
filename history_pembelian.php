<?php
    require_once "core/init.php";

    $data_pembelian = tampilkan_checkout();

    require_once "view/header.php";
?>

    <h1 class="text-center mt-5 mb-4"> History Pembelian </h1>
    <p class="text-center"><a href="dashboard.php">Kembali</a></p>
    <div class="container-fluid">
        <table class="table mt-5">
            <thead>
                <tr>
                <th scope="col">Id Pembelian</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Email Pembeli</th>
                <th scope="col">Telepon Pembeli</th>
                <th scope="col">Product Yang Dibeli</th>
                <th scope="col">Alamat Pembeli</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Waktu Dibeli</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor = 1;
                foreach ($data_pembelian as $data) : ?>
                <tr>
                <th><?= $nomor++?></th>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['email']?></td>
                <td><?= $data['telepon']?></td>
                <td><?= $data['nama_product']?></td>
                <td><?= $data['alamat']?></td>
                <td><?= $data['harga']?></td>
                <td>
                    <?php if ($data['status'] === "accept") : ?>
                    <span class="text-success fw-bold"><?= $data['status'] ?></span>
                    <?php elseif($data['status'] === "reject") : ?> 
                    <span class="text-danger fw-bold"><?= $data['status'] ?></span>
                    <?php else : ?>
                    <p><?= $data['status'] ?></p>
                    <a href="accept.php?id=<?= $data['id'] ?>" class="btn btn-success">Accept</a>
                    <a href="reject.php?id=<?= $data['id'] ?>" class="btn btn-danger">Reject</a>
                    <?php endif;?>
                </td>
                <td><?= date("d-M-Y", strtotime($data["created_at"])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php
    require_once "view/footer.php";
?>