<?php
    require './Conexion.php';
    session_start();

    $correo=$_POST['email'];
    $clave=$_POST['password'];

    $query = "SELECT * FROM usuarios WHERE email='$correo'";
    $resultado = $conexion->query($query);
    $array=$resultado->fetch_assoc();


    if(password_verify($clave, $array['clave'])){
        $_SESSION['nombre']=$array['nombre'];
        header('Location: ./Inicio.php');
    }else{
        echo "<script>alert('Datos incorrectos');</script>";
    }

?>