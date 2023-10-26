<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
require_once('../controller/usuarioController.php');
require_once('../model/usuario.php');

if($_POST)
{
    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass  = $_POST['pass'];

    $insert = new usuarioController();

    $insert ->registrarUsuario($nombre,$apellido,$correo,$pass);
}


?>