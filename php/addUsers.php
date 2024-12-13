<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Jugador</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .form-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }
        .form-container h1 {
            font-size: 1.8em;
            margin-bottom: 10px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fdfdfd;
            font-size: 14px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }
        .form-group button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Registro de Jugador</h1>
        <form action="registro.php" method="POST">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" id="pass" name="pass" required>
            </div>
            <div class="form-group">
                <label for="birthDate">Fecha de Nacimiento</label>
                <input type="date" id="birthDate" name="birthDate" required>
            </div>
            <div class="form-group">
                <button type="submit">Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
// Código PHP
header("Content-Type: application/json");
include_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "Método POST recibido.\n";

    $name = $_POST["name"] ?? null;
    $email = $_POST["email"] ?? null;
    $pass = $_POST["pass"] ?? null;
    $birthDate = $_POST["birthDate"] ?? null;

    if (!$name || !$email || !$pass || !$birthDate) {
        echo json_encode(["success" => "False", "error" => "Faltan datos obligatorios."]);
        exit;
    }

    echo "Datos recibidos: \n";
    echo "Nombre: $name\n";
    echo "Email: $email\n";
    echo "Fecha de Nacimiento: $birthDate\n";

    $hash = password_hash($pass, PASSWORD_DEFAULT);
    echo "Contraseña hash generada.\n";

    $sql = "INSERT INTO players (name, email, pass, birth_date) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(["success" => "False", "error" => "Error preparando la consulta: " . $conn->error]);
        exit;
    }

    echo "Consulta preparada correctamente.\n";

    $stmt->bind_param("ssss", $name, $email, $hash, $birthDate);
    echo "Parámetros bindeados correctamente.\n";

    if ($stmt->execute()) {
        echo json_encode(["success" => "True"]);
        echo "Datos insertados correctamente.\n";
    } else {
        echo json_encode(["success" => "False", "error" => "Error ejecutando la consulta: " . $stmt->error]);
    }

    $stmt->close();
    echo "Statement cerrado.\n";
}
$conn->close();
echo "Conexión cerrada.\n";
?>
