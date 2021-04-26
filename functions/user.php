<?php

    // function untuk registrasi user
    function register_user($nama, $username, $password){
        global $conn;

        $nama = mysqli_real_escape_string($conn, $nama);
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$password')";
        
        if (mysqli_query($conn, $query)) {
            return true;
        } else{
            return false;
        }
    }

    // function untuk mengecek username sudah tersedia apa blom
    function register_cek_username($username){
        global $conn;

        $username = mysqli_real_escape_string($conn, $username);

        $query = "SELECT * FROM users WHERE username = '$username'";

        if ($result = mysqli_query($conn, $query)) {
            if (mysqli_num_rows($result) == 0) {
                return true;
            } else{
                return false;
            }
        }
    }

    // function untuk login
    function cek_data($username, $password){
        global $conn;

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        
        $query = "SELECT password FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $hash = mysqli_fetch_assoc($result)['password'];

        if (password_verify($password, $hash)) {
            return true;
        } else{
            return false;
        }
    }

    // function untuk cek username sudah terdaftar apa blom
    function login_cek_data($username){
        global $conn;

        $username = mysqli_real_escape_string($conn, $username);

        $query = "SELECT * FROM users WHERE username = '$username'";

        if ($result = mysqli_query($conn, $query)) {
            if (mysqli_num_rows($result) != 0) {
                return true;
            } else{
                return false;
            }
        }
    }

    // cek role
    function cek_role($username){
        global $conn;

        $username = mysqli_real_escape_string($conn, $username);

        $query = "SELECT role FROM users WHERE username = '$username'";

        $result = mysqli_query($conn, $query);

        $role = mysqli_fetch_assoc($result)['role'];

        return $role;
    }
?>
