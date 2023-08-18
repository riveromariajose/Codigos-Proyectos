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
        <title>Nueva Contraseña</title>
    </head>
    <body class="m-0 p-0 top-0 w-[100%] h-[100%] font-['Poppins'] bg-[#E4AE5C]">
        <main class="flex justify-center items-center w-[100%] pt-[170px]">
            <form class="flex flex-col justify-center items-center gap-4 bg-white w-[400px] h-[550px] rounded-xl pt-[20px] pb-[20px] " action="./PasswordAct.php" method="POST" target="_blank">
                <h1 class="text-4xl font-bold ">Nueva Contraseña</h1>
                <br>
                <label class=" font-bold " for="email">Email</label>
                <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[300px]" type="text" name="email" id="email" placeholder="Email">
                <label class=" font-bold " for="password">Contraseña</label>
                <input class="border-2 border-orange-500 rounded-xl h-[50px] w-[300px]" type="password" name="password" id="password" placeholder="Contraseña">
                <br>
                <input class=" bg-[#E4AE5C] rounded-xl h-[40px] w-[150px] hover:bg-[#E4AE5C]/75 cursor-pointer" type="submit" value="Actualizar">
            </form>
        </main>
    </body>
</html>