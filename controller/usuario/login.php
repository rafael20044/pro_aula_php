<?php
require_once '../../model/crud/usuario/Login.php';
require_once '../../model/entity/Usuario.php';
session_start();
$correo = $_POST['correo'];
$pass = $_POST['pass'];

$usuario = Login::login($correo, $pass);

if ($usuario) {
    $_SESSION['usuario'] = $usuario;
    header('location: ../../view/principal.php');
    exit;
}else{
    $_SESSION['error'] = 'Error al autenticar';
    header('location: ../../view/login.php');
    exit;
}

