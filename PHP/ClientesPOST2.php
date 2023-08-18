<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
</head>
<body>
    <?php
        require './Conexion.php';
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $problema = $_POST['problema'];

        $regexNombre="/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/";
        $regexApellido="/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/";
        $regexEdad="/^[0-9]+$/";
        $regexEmail="/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/";
        $regexTelefono="/^[0-9]+$/";


        if ($conexion->connect_error) {
            die('Error en la conexión: ' . $conexion->connect_error);
        }
        else if((preg_match($regexNombre, $nombre) && preg_match($regexApellido, $apellido) && preg_match($regexEdad, $edad) && preg_match($regexEmail, $email) && preg_match($regexTelefono, $telefono))){
            $query = "INSERT INTO clientes (nombre, apellido, edad, email, telefono, direccion, descripcion_problema) VALUES ('$nombre', '$apellido', '$edad', '$email', '$telefono', '$direccion', '$problema')";
            $resultado = $conexion->query($query);
            if($resultado){
                echo "<script>alert('Cliente registrado');</script>";
                header('Refresh: 5; url=./ClientesPOST.php');
            }
            else{
                echo "<script>alert('Error al registrar cliente');</script>";
                header('Refresh: 5; url=./ClientesPOST.php');
            }
        }
        else{
            echo "<script>alert('Datos incorrectos');</script>";
            header('Refresh: 5; url=./ClientesPOST.php');
        }
        $conexion->close();
    ?>
</body>
</html>