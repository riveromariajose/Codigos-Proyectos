<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
</head>
<body class="m-0 p-0 top-0 w-[100%] h-[100%] font-['Poppins'] bg-[#E4AE5C] ">
    <main class="flex justify-around items-center w-[100%] h-[100%]">
        <?php
            include './Menu.php';
        ?>
        <div class="flex flex-col justify-center items-center gap-8  w-[80%] bg-white rounded-lg pr-4 pb-4 mt-8">
            <div class="flex justify-between items-center pt-2  w-[90%]">
                <h1 class="text-4xl font-bold ">Usuarios</h1>
                <span><a class="font-bold hover:text-[#E4AE5C] text-2xl" href="./Inicio.php">Volver</a></span>
            </div>
                <?php
                    require './Conexion.php';

                    if ($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion->connect_error);
                    }else{

                        $query = "SELECT * FROM usuarios";

                        $resultado = $conexion->query($query);

                        if ($resultado->num_rows > 0) {
                            echo "<table class='border-separate border-2 border-[#E4AE5C] w-[500px] gap-4 mb-4'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>ID</th>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>Nombre</th>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>Apellido</th>";
                                            echo "<th class='border-[#E4AE5C] bg-[#E4AE5C]/50 text-center text-lg font-bold'>Email</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                            while ($fila = $resultado->fetch_assoc()) {
                                
                                        echo "<tr>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["id"] . "</td>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["nombre"] . "</td>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["apellido"] . "</td>";
                                            echo "<td class='text-base max-w-prose border border-[#E4AE5C] text-center'>" . $fila["email"] . "</td>";
                                        echo "</tr>";
                                    
                            }
                            echo "</tbody>";
                            echo "</table>";
                        }else{
                            echo "<p>No hay usuarios registrados</p>";
                        }

                        $resultado->free_result();
                    }

                    $conexion->close();
                ?>
            <form class="flex flex-col justify-center items-center" action="./EliminarUsuario2.php" method="POST" target="_blank">
                <label class="font-bold" for="id">ID</label>
                <input type="number" name="id" id="id" placeholder="ID" class="border-2 border-orange-500 rounded-xl h-[50px] w-[500px]">
                <label class="font-bold" for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="border-2 border-orange-500 rounded-xl h-[50px] w-[500px]">
                <br>
                <input type="submit" value="Eliminar" class=" bg-[#E4AE5C] rounded-xl h-[40px] w-[150px] hover:bg-[#E4AE5C]/50 cursor-pointer">
            </form>
        </div>
    </main>
</body>
</html>