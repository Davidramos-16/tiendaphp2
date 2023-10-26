<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");

require_once('../model/usuario.php');


    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email= $_POST['correo'];
    $pass = $_POST['pass'];
    $imagen = $_POST['imagen'];
    $id = 1;

    $user = new usuarioController();

    $user->actualizarUsuario($nombre,$apellido,$email,$pass,$imagen,$id);


?>