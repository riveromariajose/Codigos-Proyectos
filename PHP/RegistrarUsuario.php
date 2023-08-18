<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrar Usuarios</title>
    </head>
    <body>
        <?php
            require './Conexion.php';
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $clave = $_POST['password'];

            $regexNombre="/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/";
            $regexApellido="/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/";
            $regexEmail="/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/";
            $passwordEncriptado = password_hash($clave, PASSWORD_DEFAULT);

            if ($conexion->connect_error) {
                die('Error en la conexión: ' . $conexion->connect_error);
            }
            else if((preg_match($regexNombre, $nombre) && preg_match($regexApellido, $apellido) && preg_match($regexEmail, $email))){
                $query = "INSERT INTO usuarios (nombre, apellido, email, clave) VALUES ('$nombre', '$apellido', '$email', '$passwordEncriptado')";
                $resultado = $conexion->query($query);
                if($resultado){
                    echo "<script>alert('Usuario registrado');</script>";
                    header('Refresh: 5; url=./Login.php');
                }
                else{
                    echo "<script>alert('Error al registrar usuario');</script>";
                }
            }
            else{
                echo "<script>alert('Datos incorrectos');</script>";
                header('Refresh: 5; url=./InsertarUsuario.php');
            }
            $conexion->close();
        ?>
    </body>
</html>