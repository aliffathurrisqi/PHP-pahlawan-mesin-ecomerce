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

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Jumlah Produk-->

                        <div class="card shadow mb-4 w-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Profil Website</h6>
                                </div>
                                <div class="card-body align-self-center">
                                <form method="POST" enctype="multipart/form-data">    
                                <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="w-25">
                                            <div>
                                            <img src="../assets/image/website/logo/<?php echo $company_logo;?>"class="tumbnail w-100 rounded-circle">
                                            </div>
                                            <div class="mt-3">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                            <div class="mt-3">
                                                <button name="btnFoto" class="btn btn-outline-primary w-100">Ubah Logo</button>
                                            </div>
                                        </td> 
                                        <td class="align-self-center">
                                            <div style="font-weight: bold;">Nama Perusahaan</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="companyName" class="form-control" value="<?php echo $company_name;?>" aria-describedby="addon-wrapping">
                                            </div>
                                            <div style="font-weight: bold;">Deskripsi Perusahaan</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="companyDesc" class="form-control" value="<?php echo $company_desc?>" aria-describedby="addon-wrapping">
                                            </div>
                                            <div style="font-weight: bold;">Nomor Telepon</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="companyCall" class="form-control" value="0<?php echo $company_call;?>" aria-describedby="addon-wrapping">
                                            </div>
                                            <div style="font-weight: bold;">E-mail</div>
                                            <div class="input-group flex-nowrap mb-2">
                                                <input type="email" name="companyEmail" class="form-control" value="<?php echo $company_email?>" aria-describedby="addon-wrapping">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" name="btnSimpan" class="btn btn-primary w-100" value="Simpan Perubahan">
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                                </form>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                        <!-- Earnings (Monthly) Card Example -->

                        <!-- Pending Requests Card Example -->

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        

                        <!-- Pie Chart -->
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            

                            <!-- Color System -->
                            

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->

                            <!-- Approach -->

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>

<?php
if(isset($_POST["btnFoto"])){

$dir = "../assets/image/website/logo/";
$edit_foto = $_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"], $dir . $edit_foto);

$edit_logo = mysqli_query($conn, 
"UPDATE company SET logo = '$edit_foto'");
echo '<script> location.replace("profile.php"); </script>';
}

if(isset($_POST["btnSimpan"])){
$name = $_POST['companyName'];
$desc = $_POST['companyDesc'];
$call = $_POST['companyCall'];
$email = $_POST['companyEmail'];

$edit_profile = mysqli_query($conn,"UPDATE company SET name = '$name', c_desc = '$desc', nomor_telepon = '$call', email = '$email'");
echo '<script> location.replace("profile.php"); </script>';
}
?>

