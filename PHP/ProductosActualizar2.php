<?php
    require './Conexion.php';
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];

    if($conexion->connect_error){
        die('Error en la conexión: ' . $conexion->connect_error);
    }else{
        $query = "UPDATE productos SET descripcion='$descripcion', precio='$precio', precio_descuento='$descuento' WHERE id='$id'";
        $query2= "SELECT * FROM productos WHERE id='$id'";
        $resultado = $conexion->query($query);

        $filas = $conexion->affected_rows;

        if($filas >= 1){
            echo "<script>alert('Producto actualizado');</script>";
            header('Refresh: 3; url=./ProductosActualizar.php');
        }
        else{
            echo "<script>alert('Error al actualizar producto');</script>";
            header('Refresh: 3; url=./Productos.php');
        }
    }
    $conexion->close();
?>

