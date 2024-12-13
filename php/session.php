<?php
// Archivo para que si no estas registrado te redirija a la página de registro
// Una vez registrado te redirige a login para iniciar sesión

session_start();

if (!isset($_SESSION["id"])) {
    header('Location: ../login.php');
    exit();
}
?>