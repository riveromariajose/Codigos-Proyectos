<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tabla Usuarios</h2>
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
            $query = "CREATE TABLE productos (id INT PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(35), descripcion VARCHAR(100), precio INT, colores VARCHAR(25), stock INT, precio_descuento INT)";


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