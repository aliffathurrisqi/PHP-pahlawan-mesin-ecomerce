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
                            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                        </div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">
                        Tambah Kategori
                        </button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="45%">Nama Kategori</th>
                                            <th width="10%">Foto</th>
                                            <th width="20%">Jumlah Produk</th>
                                            <th width="20%">Aksi</th>
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
                                    $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                                        $no = 0;
                                          while ($row = mysqli_fetch_array($kategori)){
                                              $id_kat = $row['id'];
                                            $jmlproduk = mysqli_query($conn, "SELECT COUNT(id_kategori) AS jmlproduk FROM produk WHERE id_kategori = '$id_kat'");
                                            while ($row2 = mysqli_fetch_array($jmlproduk)){
                                                $jml = $row2['jmlproduk'];
                                            }
                                                $no++;
                                                if($row['img'] == NULL){
                                                    $images = "default_image.jpg";
                                                }
                                                else{
                                                    $images = $row['img'];
                                                }

                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no;?></td>
                                            <td><?php echo $row['nama_kategori']?></td>
                                            <td><img src="../assets/image/website/kategori/<?php echo $images;?>" class="w-100"></td>
                                            <td align="center"><?php echo $jml?> Produk</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                        <td class="align-self-center">
                                            <div style="font-weight: bold;">Nama Kategori</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="e_nama" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Kategori" value="<?php echo $row['nama_kategori']?>">
                                            </div>
                                            <div style="font-weight: bold;">Foto Kategori</div>
                                            <div class="mb-3">
                                                <input type="file" name="e_photo" class="form-control">
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
    $e_id = $row['id'];

    $dir = "../assets/image/website/kategori/";
    $e_foto = $_FILES["e_photo"]["name"];
    move_uploaded_file($_FILES["e_photo"]["tmp_name"], $dir . $e_foto);

    if($e_nama != NULL){
        if($e_foto == NULL){
            $edit_data = mysqli_query($conn,"UPDATE kategori SET nama_kategori = '$e_nama' WHERE id = '$e_id'");
            echo '<script> location.replace("kategori.php"); </script>';
            }
        else{
            $edit_data = mysqli_query($conn,"UPDATE kategori SET nama_kategori = '$e_nama', img = '$e_foto' WHERE id = '$e_id'");
            echo '<script> location.replace("kategori.php"); </script>';
            }
        }

}
?>
            </form>
                                            <a href="kategori_delete.php?id=<?php echo $row['id']?>" class="btn btn-danger w-100">Hapus</a>   
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                        <td class="align-self-center">
                                            <div style="font-weight: bold;">Nama Kategori</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="p_nama" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Kategori">
                                            </div>
                                            <div style="font-weight: bold;">Foto Kategori</div>
                                            <div class="mb-3">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button name="btnTambah" class="btn btn-primary">Tambah Kategori</button>
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

    $dir = "../assets/image/website/kategori/";
    $foto = $_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], $dir . $foto);
    if($nama != NULL){
        if($foto == NULL){
            $tambah = mysqli_query($conn,"INSERT INTO kategori VALUES(NULL,'$nama',NULL)");
            echo '<script> location.replace("kategori.php"); </script>';
        }
        else{
            $tambah = mysqli_query($conn,"INSERT INTO kategori VALUES(NULL,'$nama','$foto')");
            echo '<script> location.replace("kategori.php"); </script>';
        }
    
    }
}
?>

