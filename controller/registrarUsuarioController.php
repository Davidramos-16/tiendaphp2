<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
require_once('../model/usuario.php');

$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->nombre) && isset($data->apellido)&& isset($data->email)&& isset($data->pass)&& isset($data->direccion))
{
    $nombre= $data->nombre;
    $apellido = $data->apellido;
    $correo = $data->email;
    $pass  = $data->pass;
    $direccion = $data->direccion;

    $insert = new usuarioController();

    $insert ->registrarUsuario($nombre,$apellido,$correo,$pass,$direccion);
}


?>