<?php
require_once('../config/database.php');
require_once('../model/usuario.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
  
$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->email) && isset($data->pass)) {
    $usuario = new usuarioController();
    $correo = $data->email;
    $pass = $data->pass;
    $usuario->verificarUsuario($correo, $pass);
} else {
    echo json_encode("No se han enviado datos válidos en la solicitud POST");
}
?>