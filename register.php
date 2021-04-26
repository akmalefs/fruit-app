<?php
    require_once "core/init.php";

    $error = '';

    if (isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty(trim($nama)) && !empty(trim($username)) && !empty(trim($password))) {
            if (register_cek_username($username)) {
                if (register_user($nama, $username, $password)) {
                    header("Location: login.php");
                } else{
                    $error = "gagal melalukan registrasi";
                }
            } else{
                $error = "username sudah terdaftar";
            }
        } else{
            $error = "data tidak boleh kosong";
        }
    }

    require_once "view/header.php";
?>

<div class="container mt-5">
    <h1 class="text-center">Register</h1>
    <p class="text-center">jika punya akun sini <a href="login.php">login</a></p>
<form action="" method="POST">
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" id="nama" autocomplete="off">
  </div>

  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="username" autocomplete="off">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>

    <?php if ($error != '') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php } ?>

  <button type="submit" name="submit" class="btn btn-primary">Register</button>
</form>
</div>

<?php
    require_once "view/header.php";
?>