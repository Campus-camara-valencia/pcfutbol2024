<?php
include_once('config.php');

$response = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $ImagenSubida = '../data/imgTeams/default.jpg';

    // Recogemos el archivo enviado por el formulario
    $imagen = $_FILES['teamImg']['name'];

    if (isset($imagen) && $imagen != "") {
        $tipo = $_FILE5S['teamImg']['type'];
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