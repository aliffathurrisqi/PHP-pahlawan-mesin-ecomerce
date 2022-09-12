<?php

session_destroy();
session_start();
$_SESSION['user'] = NULL;

echo '<script> location.replace("login.php"); </script>';

?>