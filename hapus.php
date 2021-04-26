<?php
    require_once "core/init.php";

    if (isset($_GET['id'])) {
        if (hapusData($_GET['id'])) {
            header("Location: dashboard.php");
        } else{
            echo "<script> alert('data gagal dihapus') </script>";
        }
    }
?>