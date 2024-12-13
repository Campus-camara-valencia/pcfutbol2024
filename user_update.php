<?php

/*session_start();
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-start min-h-screen">

    <header class="flex flex-start items-center w-full p-4">
        <div class="flex items-center text-white">
            <a href="index.html" class="flex items-center text-white font-bold text-2xl space-x-2">
                <img src="img/icons/home_40dp_E8EAED_FILL1_wght400_GRAD0_opsz40.svg" alt="Home" class="w-8 h-8">
                <span>HOME</span>
            </a>
        </div>
    </header>

    <div class="flex flex-col items-center w-full">
        <div class="w-2/4 my-4">
            <h1 class="title text-white text-center text-6xl">User Profile</h1>
        </div>

        <div class="w-1/4 my-4">
            <form action="user_update.php" method="POST">
                <div class="flex flex-col my-2">
                    <label class="text-2xl text-white font-bold" for="name">Username:</label>
                    <input class="text-base rounded p-1" type="text" name="name" id="name" placeholder="Username">
                </div>
                <div class="flex flex-col my-2">
                    <label class="text-2xl text-white font-bold" for="email">Email:</label>
                    <input class="text-base rounded p-1" type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="flex flex-col my-2">
                    <label class="text-2xl text-white font-bold" for="fnac">Birthdate</label>
                    <input class="text-base rounded p-1" type="text" name="fnac" id="birthDate" placeholder="Date of birth">
                </div>
                <div class="flex flex-col my-2 p-2 bg-blue-600 hover:bg-blue-800 rounded-lg">
                    <button type="submit" class="font-bold text-white">Update</button>
                </div>
            </form>
        </div>

        <hr class="w-1/4 my-4 border-1">

        <div class="w-1/4 my-4">
            <form id="formulario">
                <div class="flex flex-col my-2">
                    <label class="text-2xl text-white font-bold" for="pass">Current password</label>
                    <input class="text-base rounded p-1" type="password" name="pass" id="pass" placeholder="Current password">
                </div>
                <div class="flex flex-col my-2">
                    <label class="text-2xl text-white font-bold" for="pass2">New password</label>
                    <input class="text-base rounded p-1" type="password" name="pass2" id="pass2" placeholder="New password">
                </div>
                <div class="flex flex-col my-2">
                    <label class="text-2xl text-white font-bold" for="pass3">Repeat new password</label>
                    <input class="text-base rounded p-1" type="password" name="pass3" id="pass3" placeholder="Confirm new password">
                </div>
                <div class="flex flex-col my-2 p-2 bg-blue-600 hover:bg-blue-800 rounded-lg">
                    <button type="button" class="font-bold text-white">Change</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./js/validacionPerfil.js"></script>
</body>

</html>