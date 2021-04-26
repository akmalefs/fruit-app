<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "fruit-app";

    $conn = mysqli_connect($host, $username, $password, $database) or die(mysqli_error($conn));
?>