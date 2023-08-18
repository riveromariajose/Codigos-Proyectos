<?php
    require './Conexion.php';
    $email = $_POST['email'];
    $clave = $_POST['password'];

    $regexEmail="/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/";
    $passwordEncriptado = password_hash($clave, PASSWORD_DEFAULT);

    if($conexion->connect_error){
        die('Error en la conexión: ' . $conexion->connect_error);
    }else if(preg_match($regexEmail, $email)){
        $query = "UPDATE usuarios SET contraseña='$passwordEncriptado' WHERE email='$email'";
        $query2= "SELECT * FROM usuarios WHERE email='$email'";
        $resultado = $conexion->query($query);

        $filas = $conexion->affected_rows;

        if($filas >= 1){
            echo "<script>alert('Contraseña actualizado');</script>";
            header('Refresh: 5; url=./Login.php');
        }
        else{
            echo "<script>alert('Error al actualizar contraseña');</script>";
            header('Refresh: 5; url=./Password.php');
        }
    }
    $conexion->close();
?>