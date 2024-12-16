<?php
include_once "Location: ./php/sessionlogin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>

    <!-- Enlaces a Bootstrap y jQuery -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/styles_register.css">
</head>

<body class="flex flex-col items-center justify-center min-h-screen bg-gray-800 p-4">

        <h1 class="text-white font-bold text-6xl title">Registrarse</h1><br>

        <form action="" method="post" class="w-full max-w-3xl">
            <div class="mb-6">
                <label class="block text-white text-sm font-bold mb-2">Nombre</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Introduce tu nombre" required/>
            </div>

            <div class="mb-6">
                <label class="block text-white text-sm font-bold mb-2">Email</label>
                <input type="Email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Introduce el email" required/>
            </div>

            <div class="mb-6">
                <label class="block text-white text-sm font-bold mb-2">Contraseña</label>
                <input type="password" name="pass" id="pass" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Introduce la contraseña" required/>
            </div>

            <div class="mb-6">
                <label class="block text-white text-sm font-bold mb-2">Fecha de Nacimiento</label>
                <input type="date" name="birthDate" id="birthDate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Introduce la fecha" required/>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full text-xl">Registrarme</button>
        </form>

        <div class="flex flex-col items-center my-8">
            <hr class="w-96 border-t border-white mb-8">
            <h3 class="text-white mb-2 text-lg">¿Ya tienes cuenta?</h3>
            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="login.php" class="block">Inicia Sesión</a>
            </button>
        </div>
</body>
<script>
    $(document).ready(function() { 
        $("input[name='name']").on("input", function() {
            var value = $(this).val();
            if (/\d/.test(value)) { 
                $(this).css("border", "2px solid red"); 
                alert("Por favor, introduce solo caracteres.");
            } else {
                $(this).css("border", "");
            }
        });
    });
</script>
</html>

