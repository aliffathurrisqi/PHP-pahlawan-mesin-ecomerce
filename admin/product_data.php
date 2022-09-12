<?php
    $servername = "localhost";
    $database   = "db_pahlawan_mesin";
    $username   = "root";
    $password   = "";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    $e_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$e_id'");
        while ($row2 = mysqli_fetch_array($e_produk)){
            $edit_id = $row2['id'];
            $edit_nama = $row2['nama_produk'];
        }
?>