<?php
    require_once "core/init.php";

    $id = $_GET['id'];
    
    if (reject($id) > 0) {
        echo "<script> 
        alert ('orderan ditolak karena alasan tertentu'); 
        location='history_pembelian.php';
        </script>";
    } else{
        echo "<script> 
        alert ('terjadi kesalahan'); 
        location='history_pembelian.php';
        </script>";
    }
?>