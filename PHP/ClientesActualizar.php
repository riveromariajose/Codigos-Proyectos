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
    <title>Actualizar Cliente</title>
</head>
<body class="m-0 p-0 top-0 w-[100%] h-[100%] font-['Poppins'] bg-[#E4AE5C] ">
    <main class="flex justify-around items-center w-[100%] h-[100%]">
        <?php
            include './Menu.php';
        ?>
        <div class="flex flex-col justify-center items-center gap-2 w-[80%] h-[95%] bg-white rounded-lg pt-4 pb-4 mt-16">
            <div class="flex justify-between items-center pr-4 pb-4 w-[90%]">
                <h1 class="text-4xl font-bold ">Actualizar Cliente</h1>
                <span><a class="font-bold hover:text-[#E4AE5C] text-2xl" href="./Clientes.php">Volver</a></span>
            </div>
            <?php
                require './Conexion.php';

                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }else{

                    $query = "SELECT * FROM clientes";


                    $resultado = $conexion->query($query);
                    if ($resultado->num_rows > 0) {
                        echo "<table class='border-separate border-2 border-[#E4AE5C] w-[70%] mb-4'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>ID</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Nombre</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Apellido</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Edad</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Email</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Telefono</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Dirección</th>";
                                        echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-base font-bold'>Problema</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                        while ($fila = $resultado->fetch_assoc()) {
                            
                                    echo "<tr>";
                                        echo "<td class=' text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["id"] . "</td>";
                                        echo "<td class=' text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["nombre"] . "</td>";
                                        echo "<td class=' text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["apellido"] . "</td>";
                                        echo "<td class=' text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["edad"] . "</td>";
                                        echo "<td class=' text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["email"] . "</td>";
                                        echo "<td class=' text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["telefono"] . "</td>";
                                        echo "<td class=' text-sm max-w-prose border border-[#E4AE5C] text-center'>" . $fila["direccion"] . "</td>";
                                        echo "<td class=' text-sm max-w-prose border border-[#E4AE5C] text-center whitespace-normal'>" . $fila["descripcion_problema"] . "</td>";
                                    echo "</tr>";
                                
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }else{
                        echo "<p>No hay clientes registrados</p>";
                    }


                    $resultado->free_result();
                }


                $conexion->close();
            ?>
            <form class="grid grid-cols-2 justify-items-center content-around gap-4" action="./ClientesActualizar2.php" method="POST" target="_blank">
                <div class="flex flex-col">
                    <label for="id" class="font-bold">ID</label>
                    <input type="number" name="id" id="id" placeholder="ID" class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]">
                </div>
                <div class="flex flex-col">
                    <label for="nombre" class="font-bold">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" placeholder="Nombre">
                </div>
                <div class="flex flex-col">
                    <label for="email" class="font-bold">Email</label>
                    <input type="text" name="email" id="email" class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" placeholder="Email">
                </div>
                <div class="flex flex-col">
                    <label for="telefono" class="font-bold">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" placeholder="Telefono">
                </div>
                <div class="flex flex-col">
                    <label for="problema" class="font-bold">Problema</label>
                    <input type="text" name="problema" id="problema" class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" placeholder="Problema">
                </div>
                <div class="col-span-2">
                    <input type="submit" value="Actualizar" class=" bg-[#E4AE5C] rounded-xl h-[40px] w-[150px] hover:bg-[#E4AE5C]/50 cursor-pointer">
                </div>
            </form>
        </div>
    </main>
</body>
</html>