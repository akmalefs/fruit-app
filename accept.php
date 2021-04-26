<?php
    require_once "core/init.php";

    $id = $_GET['id'];
    
    if (accept($id) > 0) {
        echo "<script> 
        alert ('orderan diterima'); 
        location='history_pembelian.php';
        </script>";
    } else{
        echo "<script> 
        alert ('terjadi kesalahan'); 
        location='history_pembelian.php';
        </script>";
    }
?>