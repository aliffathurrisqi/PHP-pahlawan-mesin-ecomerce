<?php

    $servername = "localhost";
    $database   = "db_pahlawan_mesin";
    $username   = "root";
    $password   = "";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $id = $_GET['id'];
    $hapus = mysqli_query($conn,"DELETE FROM carousel WHERE id = '$id'");
    echo '<script> location.replace("landing_page.php"); </script>';
?>