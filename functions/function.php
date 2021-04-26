<?php
    // function untuk menampilkan data
    function tampilkan(){
        global $conn;

        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        $rows =[];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tampilkan_pembelian($user){
        global $conn;

        $query = "SELECT * FROM checkout WHERE nama='$user'";
        $result = mysqli_query($conn, $query);
        $rows =[];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tampilkan_checkout(){
        global $conn;

        $query = "SELECT * FROM checkout";
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tampilkan_per_id($id){
        global $conn;

        $query = "SELECT * FROM products WHERE id_product=$id";
        $result = mysqli_query($conn, $query);

        return $result;
    }

    function tambahData($nama, $deskripsi, $harga, $gambar){
        global $conn;

        $nama = mysqli_real_escape_string($conn, $nama);
        $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
        $harga = mysqli_real_escape_string($conn, $harga);
        $gambar = mysqli_real_escape_string($conn, $gambar);

        $query = "INSERT INTO products (nama, deskripsi, harga, gambar) VALUES ('$nama', '$deskripsi', '$harga', '$gambar')";

        if (mysqli_query($conn, $query)) {
            return true;
        } else{
            return false;
        }
    }

    function editData($nama, $deskripsi, $harga, $gambar, $id){
        global $conn;

        $query = "UPDATE products SET nama='$nama', deskripsi='$deskripsi', harga='$harga', gambar='$gambar' WHERE id_product=$id";

        if (mysqli_query($conn, $query)) {
            return true;
        } else{
            return false;  
        }
    }

    function hapusData($id){
        global $conn;

        $query = "DELETE FROM products WHERE id_product=$id";

        if (mysqli_query($conn, $query)) {
            return true;
        } else {
            return false;
        }
    }

    function checkout($nama_pembeli, $email_pembeli, $telepon_pembeli, $product_dibeli, $alamat_pembeli, $harga){
        global $conn;

        $nama_pembeli = mysqli_real_escape_string($conn, $nama_pembeli);
        $email_pembeli = mysqli_real_escape_string($conn, $email_pembeli);
        $telepon_pembeli = mysqli_real_escape_string($conn, $telepon_pembeli);
        $alamat_pembeli = mysqli_real_escape_string($conn, $alamat_pembeli);

        $query = "INSERT INTO checkout (nama, email, telepon, nama_product, alamat, harga) VALUES ('$nama_pembeli', '$email_pembeli', '$telepon_pembeli', '$product_dibeli', '$alamat_pembeli', '$harga')";

        if (mysqli_query($conn, $query)) {
            return true;
        } else {
            return false;
        }
    }

    function accept($id){
        global $conn;

        $query = "UPDATE checkout SET status ='accept' WHERE id = '$id'";
        
        if (mysqli_query($conn, $query)) {
            return true;
        } else{
            return false;
        }
    }

    function reject($id) {
        global $conn;

        $query = "UPDATE checkout SET status = 'reject' WHERE id ='$id'";

        if (mysqli_query($conn, $query)) {
            return true;
        } else{
            return false;
        }
    }

?>