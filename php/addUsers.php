<?php
header("Content-Type: application/json");
include_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $name = $_POST("name");
    $email = $_POST("email");
    $pass = $_POST("pass");
    $birthDate = $_POST("birthDate");
    $hash = password_hash($pass, PASSWORD_DEFAULT);
 
    $sql = "INSERT INTO players (name, email, pass, birth_date) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssd", $name, $email, $hash, $birthDate);

    if ($stmt->execute()) {
        echo json_encode(["success" => "True"]);
    } else {
        echo json_encode(["success" => "False"]);
    }

    $stmt->close();
}
$conn->close();
?>