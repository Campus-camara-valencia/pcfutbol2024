<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="validacionEquipo.js"></script>
    <title>Crear equipo</title>
    <?php include_once "./php/session.php"; ?>
    <style>
        body{
            background-image: url(./img/imagen.jpg);
            background-size: cover;
            background-position: center;
        }

        @font-face {
            font-family: Title;
            src: url(./fonts/LEMONMILK-Bold.otf);
        }

        .title {
            font-family: Title;
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-400">
    <form id="teamForm" method="POST" action="enviarDatos.php">
        <!--Preguntar que campos se requieren  para crear el equipo-->
        <h2 class="text-white font-bold text-6xl mb-8 title">CREA TU EQUIPO</h2>
        <div class="teamInfo mb-6">
            <label for="teamName" class="block text-white text-lg font-bold mb-2">Nombre del equipo</label>
            <input type="text" name="teamName" id="teamName" minlength="6" onkeypress="return !(event.charCode >= 48 && event.charCode <= 57)" placeholder="Camara cf" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            <div class="nameMsg text-red-600" id="nameMsg"></div>
            <label for="teamYear" class="block text-white text-lg font-bold mb-2 mt-2">Año del equipo</label>
            <input type="text" name="teamYear" id="teamYear" minlength="4" placeholder="1991" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            <div class="yearMsg text-red-600" id="yearMsg"></div>
            <label for="stadiumName" class="block text-white text-lg font-bold mb-2 mt-2">Nombre del estadio</label>
            <input type="text" name="stadiumName" id="stadiumName" minlength="5" onkeypress="return !(event.charCode >= 48 && event.charCode <= 57)" placeholder="La Romareda" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="shieldImg">
            <label for="teamImg" class="block text-white text-lg font-bold mb-2 mt-2">Sube tu escudo</label>
            <input type="file" name="teamImg" id="teamImg" accept="image/jpeg,image/jpg,image/png" class=" bg-blue-300 shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            <div class="stadiumMsg text-red-600" id="stadiumMsg"></div>
        </div>
        <!--Pruebas hechas mediante submit , cambiar a button cuando se han terminado las pruebas-->
        <div class="button-container mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded w-full text-xl">Enviar</button>
        </div>
        <div class="budgetMsg text-red-600" id="budgetMsg"></div>
    </form>
</body>
</html>

