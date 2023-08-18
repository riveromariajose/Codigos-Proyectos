<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Productos</title>
</head>
<body>
    <?php
        require './Conexion.php';
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $color = $_POST['colores'];
        $stock = $_POST['stock'];
        $descuento = $_POST['descuento'];

        $regexNombre= "/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s\-\_\(\)\.\,0-9]+$/";
        $regexDescripcion= "/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s\-\_\(\)\.\,0-9]+$/";
        $regexPrecio="/^[0-9]+$/";
        $regexColor="/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s\-\_\(\)\.\,]+$/";
        $regexDescuento="/^[0-9]+$/";



        if ($conexion->connect_error) {
            die('Error en la conexión: ' . $conexion->connect_error);
        }
        else if ((preg_match($regexNombre, $nombre) && preg_match($regexDescripcion, $descripcion) && preg_match($regexPrecio, $precio) && preg_match($regexColor, $color) && preg_match($regexDescuento, $descuento))){
            $query = "INSERT INTO productos (nombre, descripcion, precio, colores, stock, precio_descuento) VALUES ('$nombre', '$descripcion', '$precio', '$color', '$stock', '$descuento')";
            $resultado = $conexion->query($query);
            if($resultado){
                echo "<script>alert('Producto registrado');</script>";
                header('Refresh: 5; url=./Productos.php');
            }
            else{
                echo "<script>alert('Error al registrar producto');</script>";
                header('Refresh: 5; url=./ProductosPOST.php');
            }
        }
        else{
            echo "<script>alert('Datos incorrectos');</script>";
            header('Refresh: 5; url=./ProductosPOST.php');
        }
        $conexion->close();
    ?>
</body>
</html>