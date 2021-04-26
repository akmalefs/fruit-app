<?php
    require_once "core/init.php";

    $user = $_SESSION['user'];
    $orderan = tampilkan_pembelian($user);

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

<div class="container">
    <h1 class="text-center mt-5">History Pembelian</h1>

    <div class="row">
        <?php foreach ($orderan as $order) : ?>
        <div class="col-md-4">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Username : <?= $order['nama']?></h5>
                    <p class="card-text">Email : <?= $order['email']?></p>
                    <p class="card-text">Telepon : <?= $order['telepon']?></p>
                    <p class="card-text">Product : <?= $order['nama_product']?></p>
                    <p class="card-text">Alamat : <?= $order['alamat']?></p>
                    <p class="card-text text-muted">Harga : <?= $order['harga']?></p>
                    <p class="card-text">Dibeli Pada : <?= date("d-M-Y", strtotime($order["created_at"])); ?></p>

                    <?php if ($order['status'] === "accept") : ?>
                    <p class="btn btn-success">Accept</p>
                    <?php elseif($order['status'] === "reject") : ?>
                    <p class="btn btn-danger">Reject</p>
                    <?php else : ?>
                    <p class="btn btn-warning">Pending</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
    require_once "view/footer.php";
?>