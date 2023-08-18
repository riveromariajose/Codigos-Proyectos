<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tabla Clientes</h2>
        <?php
            $servidor = "localhost"; 
            $usuario = "root";
            $password = "";
            $basededatos = "base_de_datos_php";

            $conexion = new mysqli($servidor, $usuario, $password, $basededatos);
            
            if($conexion->connect_error){
                echo $conexion->connect_error;
            }else{
                echo "<p>La conexion se realizo satisfactoriamente</p> <br>";
                echo "<script>console.log('La conexion se realizo satisfactoriamente');</script>";
            }

            // Definimos el esquema de la tabla en una variable de consulta.
            $query = "CREATE TABLE clientes (id INT PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(35), apellido VARCHAR(35),edad INT, email VARCHAR(35), telefono INT, direccion VARCHAR(100), descripcion_problema VARCHAR(100))";


            // Realizamos la consulta en la base de datos.
            $colsulta = $conexion->query($query);


            // Verificamos si la consulta fue exitosa.
            if($colsulta){
                echo "La consulta se realizo satisfactoriamente <br>";
                echo "Se creo la tabla <br>";
                echo "<script>console.log('La consulta se realizo satisfactoriamente');</script>";
                echo "<script>console.log('Se creo la tabla');</script>";
            }else{
                echo $conexion->error;
            }
        ?>
</body>
</html>