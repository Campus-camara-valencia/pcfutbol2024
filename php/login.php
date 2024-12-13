<?php
// Código por Enol
header("Content-Type: application/json");
include_once "config.php";

// Iniciar la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar entrada
    $email = $_POST["email"] ?? '';
    $password = $_POST["pass"] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(array("success" => false, "error" => "Faltan datos: email o contraseña no proporcionados."));
        exit();
    }

    // Encriptar contraseña usando MD5
    $hashed_password = md5($password);

    // Consulta segura con sentencias preparadas
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND pass = ? LIMIT 1");

    if ($stmt) {
        // Vincular parámetros
        $stmt->bind_param("ss", $email, $hashed_password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Guardar datos de sesión
            $_SESSION["id"] = $user["id_player"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["birthDate"] = $user["birth_date"];

            $response = array("success" => true);
        } else {
            $response = array("success" => false, "error" => "Usuario o contraseña incorrectos.");
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        $response = array("success" => false, "error" => "Error al preparar la consulta.");
    }

    // Enviar respuesta en formato JSON
    echo json_encode($response);

    // Cerrar la conexión
    $conn->close();
}
