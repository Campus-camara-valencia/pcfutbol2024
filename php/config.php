<?php

// Usuario root para poder acceder 

$servername = "db5016818342.hosting-data.io";
$username = "dbu4259499";
$password = "pcfutbol2024";
$dbname = "dbs13587886";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>