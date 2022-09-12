<!doctype html>
<html lang="en">
<?php
    include "config.php";
    include "company_info.php";
    include "assets/mockup/head.php";
    if($_GET['search'] == NULL){
        $search = "";
    }
    else{
        $search = $_GET['search'];
    }

    if($search){
        $query = "SELECT produk.nama_produk, FORMAT(produk.harga,0,'de_DE') AS harga, produk.img,kategori.nama_kategori FROM produk 
        INNER JOIN kategori ON produk.id_kategori = kategori.id WHERE produk.nama_produk LIKE '%".$search."%' OR kategori.nama_kategori LIKE '%".$search."%' 
        ORDER BY produk.id DESC";
    }
    else{
        $query = "SELECT produk.nama_produk, FORMAT(produk.harga,0,'de_DE') AS harga, produk.img,kategori.nama_kategori FROM produk 
        INNER JOIN kategori ON produk.id_kategori = kategori.id ORDER BY produk.id DESC";
    }
?>
<body>
<?php 
    include "assets/mockup/navbar.php"; 
?>
<div class="container-fluid">
<div class="row mt-3">
    <div class="col-md-7">
    </div>
    <div class="col-md-5">
    <form class="d-flex" method="POST">
        <input name="cari" class="form-control me-2" type="text" placeholder="Cari disini...">
          <input type="submit" name="btnCari" class="btn btn-warning" value="Cari">
    </form>
    </div>
</div>
  <div class="row mt-3 min-vh-100">
    <div class="col-md-3 mb-3">
    <h6 class="text-center fs-5">Kategori</h6>
    <a class="btn btn-warning w-100 mb-3" type="submit" href="katalog.php?search=">Semua Kategori</a>
    <?php
        $kategori = mysqli_query($conn, "SELECT * FROM kategori");
        while ($row = mysqli_fetch_array($kategori)){
    ?>
        <a class="btn btn-warning w-100 mb-3" type="submit" href="katalog.php?search=<?php echo $row['nama_kategori']?>"><?php echo $row['nama_kategori']?></a>
    <?php
        }
    ?>
    </div>
    <div class="col-md-9 pb-5">
    <div class="row row-cols-2 row-cols-md-5 g-4">
        <?php
            $today = mysqli_query($conn, "SELECT DATE_FORMAT(NOW(),'%d-%m-%Y') AS today");
            while ($row = mysqli_fetch_array($today)){
                $hari = $row['today'];
                }
            $jml = 0;
            $produk = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($produk)){
                $jml++;
                $image = $row['img'];
                if($image == NULL){
                    $image = "default.jpg";
                }
            ?>
        <div class="col">
            <div class="card h-100">
            <img src="assets/image/product/<?php echo $image;?>" class="card-img-top" alt="...">
            <div class="card-body text-dark text-center">
                <h6 class="card-title"><a href="#" class="produk_name_link"><?php echo $row['nama_produk'];?></a></h6>
                <p><a href="katalog.php?search=<?php echo $row['nama_kategori']?>" class="produk_kat_link"><?php echo $row['nama_kategori'];?></a></p>
                <h6 class="card-title">Rp <?php echo $row['harga'];?></h6>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-warning" href="https://api.whatsapp.com/send/?phone=62<?php echo $company_call; ?>&text=Order%20:%20<?php echo $row['nama_produk'];?>%20%0DHarga%20:%20Rp%20<?php echo $row['harga'];?>%20%0DTanggal%20:%20<?php echo $hari;?>" target="_BLANK">Pesan</a>
            </div>
            </div>
        </div>
        <?php
            }
            if($jml<1){
        ?>
        <div class="col w-100">
            <div class="card h-100">
            <div class="card-footer text-center">
                <h3>Data Tidak Ditemukan</h3>
            </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    </div>
  </div>
</div>
<?php 
    include "assets/mockup/footer.php"; 
?>
</body>
</html>
<?php

if(isset($_POST['btnCari'])){
  $cari = $_POST['cari'];
  echo '<script>location.replace("katalog.php?search='.$cari.'");</script>';
}

?>