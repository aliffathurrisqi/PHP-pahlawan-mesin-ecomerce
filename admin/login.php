<!DOCTYPE html>
<html lang="en">
<?php
    include "../config.php";
    include "../company_info.php";
    session_start();
?>
<?php
    include "mockup/head.php";
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">

                            <div class="col-lg-10">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Masukkan Password">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="btnLogin">
                                            Login
                                        </button>
                                        <a href="../index.php" class="btn btn-danger btn-user btn-block">
                                            Kembali Ke Website
                                        </a>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>

<?php

if(isset($_POST["btnLogin"])){
$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
//var_dump($login);
if($login){
      while ($row = mysqli_fetch_array($login)){
      if($username == $row['username'] && $password == $row['password']){
          $_SESSION['user'] = $username;
          echo '<script> location.replace("index.php"); </script>';
      }
	  else{
		echo '<script language="javascript"> alert("Username dan Password tidak cocok"); </script>';
	  }
    }
  }
  else{
	echo '<script language="javascript"> alert("Username tidak ditemukan"); </script>';
  }
}
?>