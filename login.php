<?php
    require_once "core/init.php";

    $error = '';

    if (isset($_SESSION['user'])) {
        header('Location: index.php');
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty(trim($username)) && !empty(trim($password))) {
            if (login_cek_data($username)) {
                if (cek_data($username, $password)) {
                    $_SESSION['user'] = $username;
                    header("Location: index.php");
                } else{
                    $error = "username atau password salah";
                }
            } else{
                $error = "username belum terdaftar";
            }
        } else{
            $error = "data tidak boleh kosong";
        }
    }

    require_once "view/header.php";
?>

<div class="container mt-5">
    <h1 class="text-center">Login</h1>
<form action="" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" autocomplete="off">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

    <!-- untuk menampilkan error -->
    <?php if ($error != '') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php } ?>

<p>Belum punya akun? ayo <a href="register.php">daftar</a></p>
  <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>
</div>

<?php
    require_once "view/footer.php";
?>