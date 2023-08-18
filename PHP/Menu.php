<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<aside class=" w-[300px] h-[800px] mt-[60px] flex flex-col justify-center items-center text-center bg-white rounded-xl">
    <div class="flex flex-col justify-center items-center">
        <img class="w-[70px] h-[70px] " src="./img/Usuario.png" alt="">
        <?php
            session_start();
            $nombre = $_SESSION['nombre'];
            echo "<h1 class='font-bold text-2xl'>Bienvenido ".$nombre."</h1>";
        ?>
    </div>
    <div class="pt-[20px] gap-4 flex flex-col justify-center items-center ">
        <a href="./Inicio.php">
            <img class="w-[70px] h-[70px] hover:-translate-y-1 hover:scale-110" src="./img/Inicio.png" alt="">
            <h1 class="font-bold text-base  ">Inicio</h1>
        </a>
    </div>
    <div class="pt-[20px] gap-4 flex flex-col justify-center items-center ">
        <a href="./Clientes.php">
            <img class="w-[70px] h-[70px]  hover:-translate-y-1 hover:scale-110" src="./img/Clientes.png" alt="">
            <h1 class="font-bold text-base  ">Clientes</h1>
        </a>
    </div>
    <div class="pt-[20px] gap-4 flex flex-col justify-center items-center ">
        <a href="./Productos.php">
            <img class="w-[70px] h-[70px]  hover:-translate-y-1 hover:scale-110" src="./img/Productos.png" alt="">
            <h1 class="font-bold text-base  ">Productos</h1>
        </a>
    </div>
    <div class="pt-[20px] gap-4 flex flex-col justify-center items-center ">
        <a href="./Usuarios.php">
            <img class="w-[70px] h-[70px]  hover:-translate-y-1 hover:scale-110" src="./img/Inventario.png" alt="">
            <h1 class="font-bold text-base  ">Usuarios</h1>
        </a>
    </div>
    <div class="pt-[20px] gap-4 flex flex-col justify-center items-center">
        <a href="./CerrarSesion.php">
            <img class="w-[70px] h-[70px]  hover:-translate-y-1 hover:scale-110" src="./img/Salir.png" alt="">
            <h1 class="font-bold text-base  ">Cerrar Sesión</h1>
        </a>
    </div>
</aside>