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
    <title>Actualizar Productos</title>
</head>
<body class="m-0 p-0 top-0 w-[100%] h-[100%] font-['Poppins'] bg-[#E4AE5C] ">
    <main class="flex justify-around items-center w-[100%] h-[100%]">
        <?php
            include './Menu.php';
        ?>

        <div class="flex flex-col justify-center items-center w-[80%] h-[95%] bg-white rounded-lg pt-4 pb-4 mt-16">
            <div class="flex justify-between items-center pr-4 pb-4 w-[90%]">
                <h1 class="text-4xl font-bold ">Actualizar Productos</h1>
                <span><a class="font-bold hover:text-[#E4AE5C] text-2xl" href="./Productos.php">Volver</a></span>
            </div>
            <?php
                require './Conexion.php';

                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }else{

                    $query = "SELECT * FROM productos";

                    // ejecutamos la consulta
                    $resultado = $conexion->query($query);

                    // Verificamos si la consulta fue ejecutada

                    // Usamos "num_rows" para saber si hay resultados, de manera que si existe al menos 
                    // un resultado o una fila estos es mostrarán. sino mostrará un mensaje de no hay resultados
                    if ($resultado->num_rows > 0) {
                        echo "<table class='border-separate border-2 border-[#E4AE5C] w-[70%] gap-4 mb-4'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>ID</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Nombre</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Descripción</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Precio</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Color</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Stock</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Descuento</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                        while ($fila = $resultado->fetch_assoc()) {
                            
                                    echo "<tr>";
                                        echo "<td class='text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["id"] . "</td>";
                                        echo "<td class='text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["nombre"] . "</td>";
                                        echo "<td class='text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["descripcion"] . "</td>";
                                        echo "<td class='text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["precio"] . "</td>";
                                        echo "<td class='text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["colores"] . "</td>";
                                        echo "<td class='text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["stock"] . "</td>";
                                        echo "<td class='text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["precio_descuento"] . "</td>";
                                    echo "</tr>";
                                
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }else{
                        echo "<p>No hay productos registrados</p>";
                    }

                    // Liberamos la memoria
                    $resultado->free_result();
                }

                // Cerramos la conexión
                $conexion->close();
            ?>

            <form class="grid grid-cols-2 justify-items-center content-around gap-4 w-[900px]" action="./ProductosActualizar2.php" method="POST" target="_blank">
                <div class="flex flex-col">
                    <label for="id" class="font-bold">ID</label>
                    <input type="number" name="id" id="id" placeholder="ID" class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]">
                </div>
                <div class="flex flex-col">
                    <label for="descripcion" class="font-bold">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" placeholder="Descripción">
                </div>
                <div class="flex flex-col">
                    <label for="precio" class="font-bold">Precio</label>
                    <input type="text" name="precio" id="precio" class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" placeholder="Precio">
                </div>
                <div class="flex flex-col">
                    <label for="descuento" class="font-bold">Descuento</label>
                    <input type="text" name="descuento" id="descuento" class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" placeholder="Descuento">
                </div>
                <div class="col-span-2">
                    <input type="submit" value="Actualizar" class=" bg-[#E4AE5C] rounded-xl h-[40px] w-[150px] hover:bg-[#E4AE5C]/50 cursor-pointer">
                </div>
            </form>
        </div>
    </main>
</body>
</html>