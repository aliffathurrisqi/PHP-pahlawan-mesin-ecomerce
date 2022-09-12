<!DOCTYPE html>
<?php
    include "../config.php";
    include "../company_info.php";
    session_start();
    if(!$_SESSION['user']){
        echo '<script> location.replace("login.php"); </script>';
    }
?>
<html lang="en">

<?php
        include "mockup/head.php";
    ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php
        include "mockup/sidebar.php";
    ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                    include "mockup/navbar.php";
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                        </div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">
                        Tambah Produk
                        </button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="40%">Nama Produk</th>
                                            <th width="10%">Foto</th>
                                            <th width="15%">Kategori</th>
                                            <th width="15%">Harga</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Foto</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                    
                                    <?php
                                    $produk = mysqli_query($conn, "SELECT produk.id,produk.nama_produk, FORMAT(produk.harga,0,'de_DE') AS harga, produk.harga AS harga2, produk.img, kategori.nama_kategori FROM produk INNER JOIN kategori
                                    ON produk.id_kategori = kategori.id");
                                        $no = 0;
                                          while ($row = mysqli_fetch_array($produk)){
                                                $no++;
                                                if($row['img'] == NULL){
                                                    $images = "default.jpg";
                                                }
                                                else{
                                                    $images = $row['img'];
                                                }

                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no;?></td>
                                            <td><?php echo $row['nama_produk']?></td>
                                            <td><img src="../assets/image/product/<?php echo $images;?>" class="w-100"></td>
                                            <td align="center"><?php echo $row['nama_kategori']?></td>
                                            <td align="center">Rp <?php echo $row['harga']?></td>
                                            <td align="center">
                                            <button class="btn btn-warning w-100 mb-2" data-toggle="modal" data-target="#editData<?php echo $row['id']?>">
                                                Edit
                                            </button>

<!-- Modal Edit -->
<form method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="editData<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                        <td class="align-self-center">
                                            <div style="font-weight: bold;">Nama Produk</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="e_nama" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Produk" value="<?php echo $row['nama_produk']?>">
                                            </div>
                                            <div style="font-weight: bold;">Foto Produk</div>
                                            <div class="mb-3">
                                                <input type="file" name="e_photo" class="form-control">
                                            </div>
                                            <div style="font-weight: bold;">Kategori</div>
                                            <div class="input-group flex-nowrap mb-3">
                                            <select class="form-control w-100" id="inputGroupSelect01" name="e_kategori">
                                            <?php
                                                $id_produk = $row['id'];
                                                    $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                                                    while ($row2 = mysqli_fetch_array($kategori)){
                                                ?>
                                                <option value="<?php echo $row2['id'];?>"><?php echo $row2['nama_kategori'];?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>  
                                            </div>
                                            <div style="font-weight: bold;">Harga</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="number" name="e_harga" class="form-control"  aria-describedby="addon-wrapping" placeholder="Masukkan Harga Produk" value="<?php echo $row['harga2']?>">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button name="btnEdit<?php echo $row['id']?>" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </div>
            </div>
            </div>
<?php
if(isset($_POST["btnEdit".$row['id'].""])){
    $e_nama = $_POST['e_nama'];
    $e_kategori = $_POST['e_kategori'];
    $e_harga = $_POST['e_harga'];
    $e_id = $row['id'];

    $dir = "../assets/image/product/";
    $e_foto = $_FILES["e_photo"]["name"];
    move_uploaded_file($_FILES["e_photo"]["tmp_name"], $dir . $e_foto);

    if($e_nama != NULL && $e_harga != NULL){
        if($e_foto == NULL){
            $edit_data = mysqli_query($conn,"UPDATE produk SET nama_produk = '$e_nama', id_kategori = '$e_kategori',harga ='$e_harga' WHERE id = '$e_id'");
            echo '<script> location.replace("produk.php"); </script>';
        }
        else{
            $edit_data = mysqli_query($conn,"UPDATE produk SET nama_produk = '$e_nama', id_kategori = '$e_kategori',harga ='$e_harga', img = '$e_foto' WHERE id = '$e_id'");
            echo '<script> location.replace("produk.php"); </script>';
        }
        
        }

}

?>
            </form>



                                            <a href="product_delete.php?id=<?php echo $row['id']?>" class="btn btn-danger w-100">Hapus</a>

                                                
                                            </td>
                                            
                                        </tr>
                                    <?php
                                          }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
                <!-- /.container-fluid -->

            <!-- Modal Tambah -->
            <form method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                        <td class="align-self-center">
                                            <div style="font-weight: bold;">Nama Produk</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="p_nama" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Produk">
                                            </div>
                                            <div style="font-weight: bold;">Foto Produk</div>
                                            <div class="mb-3">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                            <div style="font-weight: bold;">Kategori</div>
                                            <div class="input-group flex-nowrap mb-3">
                                            <select class="form-control w-100" id="inputGroupSelect01" name="p_kategori">
                                            <?php
                                                    $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                                                    while ($row = mysqli_fetch_array($kategori)){
                                                ?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['nama_kategori'];?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>  
                                            </div>
                                            <div style="font-weight: bold;">Harga</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="number" name="p_harga" class="form-control"  aria-describedby="addon-wrapping" placeholder="Masukkan Harga Produk">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button name="btnTambah" class="btn btn-primary">Tambah Produk</button>
                </div>
                </div>
            </div>
            </div>
            </form>


            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <!-- <span>Copyright &copy; Your Website 2021</span> -->
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>

<?php
if(isset($_POST["btnTambah"])){
    $nama = $_POST['p_nama'];
    $kategori = $_POST['p_kategori'];
    $harga = $_POST['p_harga'];

    $dir = "../assets/image/product/";
    $foto = $_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], $dir . $foto);
    if($nama != NULL && $harga != NULL){
    $tambah = mysqli_query($conn,"INSERT INTO produk VALUES(NULL,'$nama','$kategori','$harga','$foto')");
    echo '<script> location.replace("produk.php"); </script>';
    }
}
?>

