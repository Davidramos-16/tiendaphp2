<?php

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