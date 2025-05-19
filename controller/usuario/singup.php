<?php
require_once __DIR__ . '../../../model/crud/usuario/CrearUsuario.php';
session_start();


$datos = [
    'nombre1' => $_POST['nombre1'] ?? null,
    'nombre2' => $_POST['nombre2'] ?? null,
    'apellido1' => $_POST['apellido1'] ?? null,
    'apellido2' => $_POST['apellido2'] ?? null,
    'correo' => $_POST['correo'] ?? null,
    'contraseña' => $_POST['pass'] ?? null,
];

$seCreo = CrearUsuario::crearUsuario($datos);
if ($seCreo) {
    $_SESSION['ok'] = 'Usuario creado con exito';
    header('location: ../../view/login.php');
    exit;
}else{
    $_SESSION['error'] = 'Error al crear el usuario';
    header('location: ../../view/singup.php');
    exit;
}