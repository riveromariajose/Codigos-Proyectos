<?php
    require './Conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $problema = $_POST['problema'];

    if($conexion->connect_error){
        die('Error en la conexión: ' . $conexion->connect_error);
    }else{
        $query = "UPDATE clientes SET nombre='$nombre', email='$email', telefono='$telefono', descripcion_problema='$problema' WHERE id='$id'";
        $query2= "SELECT * FROM clientes WHERE id='$id'";
        $resultado = $conexion->query($query);

        $filas = $conexion->affected_rows;

        if($filas >= 1){
            echo "<script>alert('Cliente actualizado');</script>";
            header('Refresh: 3; url=./ClientesActualizar.php');
        }
        else{
            echo "<script>alert('Error al actualizar cliente');</script>";
            header('Refresh: 3; url=./Clientes.php');
        }
    }
    $conexion->close();
?>