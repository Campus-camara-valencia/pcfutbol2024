<?php
//Archivo para modificar la información del usuario
session_start();
include_once "config.php";

//array donde se guardan las variables a cambiar
$set = [];

if(isset($_SESSION["id"])){
    //Se comprueba cuales son los campos a modificar
    if(isset($_POST['name'])){
        $set[] = "name = '" . $conn->real_escape_string($_POST['name']) . "'";
    }

    if(isset($_POST["email"])){
        $set[] = "email = '". $conn->real_escape_string($_POST["email"]) . "'";
    }

    if(isset($_POST["birthDate"])){
        $set[] = "birth_date = '".$conn->real_escape_string($_POST["birthDate"]). "'";
    }

    if(isset($_POST["pass2"])){
        $passwordNuevo = md5($_POST["pass2"]);
        $set[] = "pass = '". $passwordNuevo  . "'";
    }

    //Modificación de la query
    if(!empty($set)){
        $sql = "UPDATE players SET " . implode(",", $set) . " WHERE id_player=" . $_SESSION["id"];

        if ($conn->query($sql)) {
            $response = array("success" => true);
        } else {
            $response = array("success" => false);
        }
    }
    echo json_encode($response);
}
