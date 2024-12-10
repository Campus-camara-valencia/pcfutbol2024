<?php
session_start(); // Iniciar
session_unset(); // Borrar datos de la sesión
session_destroy();// Destruyes la sesion
header("Location:login.php");// Redirecciona;
exit();


