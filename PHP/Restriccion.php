<?php
session_start();
$sesion=$_SESSION['nombre'];
error_reporting(0);

if($sesion == null || $sesion == ''){
    echo "<script>alert('No se ha iniciado sesion');</script>";
    header('Location: ./Login.php');
    die();
}
?>