<?php
    require './Conexion.php';

    if ($conexion->connect_error) {
        die("Fallo en la conexion: " . $conexion->connect_error);
    }else{
        echo "<script> alert('Conectado');</script>";
    }


    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $consulta = "DELETE FROM clientes WHERE id = '$id' AND nombre = '$nombre'";

        $resultado = $conexion->query($consulta);
    

        $filas = $conexion->affected_rows;
    

        if ($filas > 0) {
            echo "<script> alert('Se elimino el cliente $nombre');</script>";
            header('Refresh: 3; url=./Clientes.php');
        }else{
            echo "$filas <br>";
            echo "La consulta es: $consulta <br>";
            echo "Error al eliminar el cliente: El cliente no existe.";
            echo $conexion->error;
        }
        // Cerramos la conexion
        $conexion->close();
    // }
?>