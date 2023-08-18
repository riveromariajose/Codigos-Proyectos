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
    <title>Crear Cliente</title>
</head>
<body class="m-0 p-0 top-0 w-[100%] h-[100%] font-['Poppins'] bg-[#E4AE5C] ">
    <main class="flex justify-around items-center w-[100%] h-[100%]">
        <?php
            include './Menu.php';
        ?>
        <div class="flex flex-col justify-center items-center gap-8 w-[80%] h-[95%] bg-white rounded-lg pt-4 pb-4 mt-16">
            <div class="flex justify-between items-center pr-4 pb-4 w-[90%]">
                <h1 class="text-4xl font-bold ">Registra un nuevo Cliente</h1>
                <span><a class="font-bold hover:text-[#E4AE5C] text-2xl" href="./Clientes.php">Volver</a></span>
            </div>
            <form class="grid grid-cols-2 justify-items-center content-around gap-4 w-[900px]" action="./ClientesPOST2.php" method="POST" target="_blank">
                <div class="flex flex-col">
                    <label class=" font-bold " for="nombre">Nombre</label>
                    <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="text" name="nombre" id="" placeholder="Nombre">
                </div>
                <div class="flex flex-col">
                    <label class=" font-bold " for="apellido">Apellido</label>
                    <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="text" name="apellido" id="" placeholder="Apellido">
                </div>
                <div class="flex flex-col">
                    <label class=" font-bold " for="edad">Edad</label>
                    <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="text" name="edad" id="" placeholder="Edad">
                </div>
                <div class="flex flex-col">
                    <label class=" font-bold " for="email">Email</label>
                    <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="text" name="email" id="" placeholder="Email">
                </div>
                <div class="flex flex-col">
                    <label class=" font-bold " for="telefono">Telefono</label>
                    <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="text" name="telefono" id="" placeholder="Telefono">
                </div>
                <div class="flex flex-col">
                    <label class=" font-bold " for="direccion">Dirección</label>
                    <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="text" name="direccion" id="" placeholder="Direccion">
                </div>
                <div class="flex flex-col">
                    <label class=" font-bold " for="problema">Problema</label>
                    <input class="border-2 border-orange-500 rounded-xl h-[100px] w-[400px]" type="text" name="problema" id="" placeholder="Problema">
                </div>
                <div class="col-span-2">
                    <input class=" bg-[#E4AE5C] rounded-xl h-[40px] w-[150px] hover:bg-[#E4AE5C]/50 cursor-pointer" type="submit" value="Registrar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>