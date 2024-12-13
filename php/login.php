<?php
// Código por Enol
// Archivo para comprobar los datos de inicio de sesión con los de la BD. Si existen te redirigira al home. 

header("Content-Type: application/json");
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar entrada
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $hash = md5($password); 

    // Consulta segura con sentencias preparadas
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND pass = ? LIMIT 1");
    $stmt->bind_param("ss", $email, $hash);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Guardar datos de sesión
        $_SESSION["id"] = $user["id_player"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["birthDate"] = $user["birth_date"];


        $response = array("success" =>true);
        exit();

    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
}
?>
