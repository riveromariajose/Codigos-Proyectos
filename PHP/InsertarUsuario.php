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
        <title>Insertar Usuarios</title>
    </head>
    <body class="m-0 p-0 top-0 w-[100%] h-[100%] font-['Poppins'] bg-[#E4AE5C]">
        <main class="flex justify-center items-center w-[100%] pt-[100px]">
            <form class="flex flex-col justify-center items-center bg-white w-[670px] h-[730px] rounded-xl pt-[20px] pb-[20px] " action="./RegistrarUsuario.php" method="POST" target="_blank">
                <h1 class="text-4xl font-bold ">Registrate</h1>
                <br>
                <br>
                <label class=" font-bold " for="nombre">Nombre</label>
                <br>
                <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="text" name="nombre" id="nombre" placeholder="Nombre">
                <br>
                <label class=" font-bold " for="apellido">Apellido</label>
                <br>
                <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="text" name="apellido" id="apellido" placeholder="Apellido">
                <br>
                <label class=" font-bold " for="email">Email</label>
                <br>
                <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="text" name="email" id="email" placeholder="Email">
                <br>
                <label class=" font-bold " for="password">Contraseña</label>
                <br>
                <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[400px]" type="password" name="password" id="password" placeholder="Contraseña">
                <br>
                <input class=" bg-[#E4AE5C] rounded-xl h-[40px] w-[150px] hover:bg-[#E4AE5C]/75 cursor-pointer" type="submit" value="Registrar">
                <br>
                <span><a class="font-bold hover:text-slate-400" href="./Login.php">Iniciar Sesión</a></span>
            </form>
        </main>
    </body>
</html>