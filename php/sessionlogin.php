<?php
session_start();
// Si ya estas registrado te redirige directamente al home 
if (isset($_SESSION["id"])) {
    header('Location: ../index.php');
    exit();
}
?>