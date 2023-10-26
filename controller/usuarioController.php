<?php
require_once('../config/database.php');
require_once('../view/login.html');
require_once('../model/usuario.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: application/json");
   if($_POST)
   {
    $usuario = new usuarioController();
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $usuario->verificarUsuario($correo,$pass);
   }

    
?>