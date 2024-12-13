<?php
include_once "./php/sessionlogin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="css/styles_login.css">
</head>

<body class="flex flex-col items-center justify-center min-h-screen p-4">
    <h2 class="text-white font-bold text-6xl mb-8 title">Iniciar sesión</h2>
    <form id="loginForm" action="loginInsert.php" method="POST" class="w-full max-w-3xl">
        <div class="mb-6">
            <label class="block text-white text-lg font-bold mb-2" for="email">Email:</label>
            <input type="email" name="email" id="email"
                class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required placeholder="Introduce tu email">
        </div>
        <div class="mb-6">
            <label class="block text-white text-lg font-bold mb-2" for="password">Contraseña:</label>
            <input type="password" name="pass" id="pass"
                class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required placeholder="Introduce tu contraseña">
        </div>
        <button id="inicio" type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full text-xl">Login</button>
        <div class="flex flex-col items-center my-8">
            <hr class="w-96 border-t border-white mb-8">
            <h3 class="text-white mb-2 text-lg">¿Aún no tienes cuenta?</h3>
            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="RegistroUsuarios.php" class="block">Registrate</a>
            </button>
        </div>
    </form>
</body>

</html>