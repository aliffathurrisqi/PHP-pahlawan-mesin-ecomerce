<!doctype html>
<html lang="en">
<?php
    include "config.php";
    include "company_info.php";
    include "assets/mockup/head.php";
?>
<body class="min-vh-100">
<?php 
    include "assets/mockup/navbar.php"; 
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 bg-dark pb-3">
        <!-- Carousel -->
        <?php
            $i = 0;
            $carousel = mysqli_query($conn, "SELECT img FROM carousel");
            while ($row = mysqli_fetch_array($carousel)){
            $i++;
            if($i != 0 && $i <= 1){
        ?>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <?php
        }
                if($i == 1){    
        ?>
                <div class="carousel-item active">
                <img src="assets/image/website/carousel/<?php echo $row['img'];?>" class="d-block w-100">
                </div>
        <?php
                }
                if($i != 1){ 
        ?>
                <div class="carousel-item">
                <img src="assets/image/website/carousel/<?php echo $row['img'];?>" class="d-block w-100">
                </div>
        <?php
                }
            }
        ?>
        <?php
        if($i != 0 && $i >= 1){
        ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <?php
        }
        ?>
        <!-- Carousel End -->
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-1 text-break text-white p-3 align-self-center bg-warning">
    </div>
    <div class="col-md-5 p-3 bg-dark">
    <img src="assets/image/website/about/<?php echo $company_img?>" class="img-thumbnail" alt="...">
    </div>
    <div class="col-md-6 text-break text-white p-4 fs-6 align-self-center bg-warning" align="justify">
    <?php
        echo $company_desc;
    ?>
    </div>
  </div>
  <div class="row ">
    <div class="col-md-12 pb-5 pt-3">
    <h3 class="mt-2 mb-3 text-center text-dark">Kategori</h3>
    <div class="row row-cols-2 row-cols-md-6 g-4">
        <?php
        $jml = 0;
            $kategori = mysqli_query($conn, "SELECT * FROM kategori");
            while ($row = mysqli_fetch_array($kategori)){
                $jml++;
                $image = $row['img'];
                if($image == NULL){
                    $image = "default_image.jpg";
                }
            ?>
        <div class="col">
            <div class="card h-100">
            <img src="assets/image/website/kategori/<?php echo $image;?>" class="card-img-top" alt="...">
            <div class="card-body text-dark text-center">
                <h6 class="card-title"><a href="katalog.php?search=<?php echo $row['nama_kategori']?>" class="linked"><?php echo $row['nama_kategori'];?></a></h6>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-warning" href="katalog.php?search=<?php echo $row['nama_kategori']?>">Lihat Produk</a>
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
  <div class="row">
    <div class="col-md-12 pb-5">
    <h3 class="mt-2 mb-3 text-center text-dark">Produk</h3>
    <div class="row row-cols-2 row-cols-md-6 g-4">
        <?php
            
            $today = mysqli_query($conn, "SELECT DATE_FORMAT(NOW(),'%d-%m-%Y') AS today");
            while ($row = mysqli_fetch_array($today)){
                $hari = $row['today'];
                }
            $jml = 0;
            $produk = mysqli_query($conn, "SELECT produk.nama_produk, FORMAT(produk.harga,0,'de_DE') AS harga, produk.img,kategori.nama_kategori FROM produk 
            INNER JOIN kategori ON produk.id_kategori = kategori.id ORDER BY produk.id DESC LIMIT 0,6");
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