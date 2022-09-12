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
    $update_data = mysqli_query($conn,"UPDATE produk SET id_kategori = 1 WHERE id_kategori = '$id'");
    $hapus = mysqli_query($conn,"DELETE FROM kategori WHERE id = '$id'");
    echo '<script> location.replace("kategori.php"); </script>';
?>