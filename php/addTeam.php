<?php
// Código por Marcos Allet

include_once('config.php');

$response = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $ImagenSubida = '../data/imgTeams/default.jpg';

    // Recogemos el archivo enviado por el formulario
    $imagen = $_FILES['teamImg']['name'];

    if (isset($imagen) && $imagen != "") {
        $tipo = $_FILES['teamImg']['type'];
        $tamano = $_FILES['teamImg']['size'];
        $temp = $_FILES['teamImg']['tmp_name'];

        // Comprobar tipo y tamaño del archivo
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
            - Se permiten archivos .gif, .jpg, .png. y de 2 MB como máximo.</b></div>';
        } else {
            if (move_uploaded_file($temp, '../data/imgTeams/' . $imagen)) {
                chmod('../data/imgTeams/' . $imagen, 0777);
                echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                // Actualizar la ruta de $ImagenSubida si se ha subido correctamente
				$tiempo=time();
                $ImagenSubida = '../data/imgTeams/' . $imagen.'_'.$tiempo;
            } else {
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
        }
    }

    //Recogemos la información de la creación del equipo
    $teamName = $_POST['teamName'];
    $teamYear = $_POST['teamYear'];
    $stadiumName = $_POST['stadiumName'];
    $budget = $_POST['budget'];
    $player = $_POST['idPlayer'];

    $sql = "INSERT INTO teams (team_name, foundation_year, img_team, stadium_name, budget, id_player) VALUES (?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);

    if($stmt) {
        //Bindeamos los parametros
        $stmt->bind_param("sissdi",$teamName, $teamYear, $ImagenSubida, $stadiumName, $budget, $player);
        if($stmt->execute()) {
            $response = array("success" => true);
        } else {
            $response = array("success" => false, "error" => "Error al insertar los datos: ".$stmt->error);
        }
        $stmt->close();
    } else {
        $response = array("success" => false, "error" => "Error en la conexion: " .$conn->error);
    }

}
$conn->close();
echo json_encode($response);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Equipo</title>
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
        .form-group input[type="file"] {
            padding: 5px;
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
        <h1>Crear Equipo</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="teamName">Nombre del Equipo</label>
                <input type="text" id="teamName" name="teamName" required>
            </div>
            <div class="form-group">
                <label for="teamYear">Año de Fundación</label>
                <input type="number" id="teamYear" name="teamYear" required>
            </div>
            <div class="form-group">
                <label for="stadiumName">Nombre del Estadio</label>
                <input type="text" id="stadiumName" name="stadiumName" required>
            </div>
            <div class="form-group">
                <label for="budget">Presupuesto</label>
                <input type="number" id="budget" name="budget" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="idPlayer">ID del Jugador</label>
                <input type="number" id="idPlayer" name="idPlayer" required>
            </div>
            <div class="form-group">
                <label for="teamImg">Subir Imagen</label>
                <input type="file" id="teamImg" name="teamImg" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit">Crear Equipo</button>
            </div>
        </form>
    </div>
</body>
</html>
