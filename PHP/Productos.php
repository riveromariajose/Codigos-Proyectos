<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
    <title>Productos</title>
</head>
<body class="m-0 p-0 top-0 w-[100%] h-[100%] font-['Poppins'] bg-[#E4AE5C] ">
    <main class="flex justify-around items-center w-[100%] h-[100%]">
        <?php
            include './Menu.php';
        ?>
        <div class="flex flex-col justify-center items-center gap-8  w-[80%] bg-white rounded-lg pr-4 pb-4 mt-8" >
            <div class="flex justify-between items-center pt-2  w-[90%]">
                <h1 class="text-4xl font-bold ">Productos</h1>
                <span><a class="font-bold hover:text-[#E4AE5C] text-2xl" href="./Inicio.php">Volver</a></span>
            </div>
            <div class="flex flex-col justify-center items-center w-[80%] text-center">
                <div class="flex justify-between items-center w-[80%] text-center">
                    <div class="p-6">
                        <a href="./ProductosPOST.php">
                            <img class="w-[200px] h-[200px] hover:-translate-y-1 hover:scale-110" src="./img/CUsuario.png" alt="">
                            <h1 class="font-bold text-2xl">Crear Productos</h1>
                        </a>
                    </div>
                    <div class="p-6">
                        <a href="./ProductosGET.php">
                            <img class="w-[200px] h-[200px] hover:-translate-y-1 hover:scale-110" src="./img/VUsuario.png" alt="">
                            <h1 class="font-bold text-2xl">Ver Productos</h1>
                        </a>
                    </div>
                    <div class="p-6">
                        <a href="./ProductosActualizar.php">
                            <img class="w-[200px] h-[200px] hover:-translate-y-1 hover:scale-110" src="./img/AUsuario.png" alt="">
                            <h1 class="font-bold text-2xl">Actualizar Productos</h1>
                        </a>
                    </div>
                    <div class="p-6">
                        <a href="./ProductosEliminar.php">
                            <img class="w-[200px] h-[200px] hover:-translate-y-1 hover:scale-110" src="./img/EUsuario.png" alt="">
                            <h1 class="font-bold text-2xl">Eliminar Productos</h1>
                        </a>
                    </div>
                </div>
                <div>
                    <?php
                    require './Conexion.php';

                    if ($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion->connect_error);
                    }else{

                        $query = "SELECT * FROM productos";

                        $resultado = $conexion->query($query);

                        if ($resultado->num_rows > 0) {
                            echo "<table class='border-separate border-2 border-[#E4AE5C] w-[900px] gap-4 mb-4 hover:-translate-y-1 hover:scale-110'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>ID</th>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>Nombre</th>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>Descripción</th>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>Precio</th>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>Color</th>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>Stock</th>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>Descuento</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                            while ($fila = $resultado->fetch_assoc()) {
                                
                                        echo "<tr>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["id"] . "</td>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["nombre"] . "</td>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["descripcion"] . "</td>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["precio"] . "</td>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["colores"] . "</td>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["stock"] . "</td>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["precio_descuento"] . "</td>";
                                        echo "</tr>";
                                    
                            }
                            echo "</tbody>";
                            echo "</table>";
                        }else{
                            echo "<p>No hay productos registrados</p>";
                        }

                        $resultado->free_result();
                    }

                    $conexion->close();
                ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>