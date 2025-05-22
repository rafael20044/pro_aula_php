<?php
require_once __DIR__ . '../../../model/crud/usuario/EditarPerfilCRUD.php';
require_once __DIR__ . '../../../model/entity/Usuario.php';

session_start();

$datos = $_POST;

$params = [
    ':id'        => $datos['id'],
    ':nombre1'   => trim($datos['nombre1']),
    ':nombre2'   => trim($datos['nombre2']),
    ':apellido1' => trim($datos['apellido1']),
    ':apellido2' => trim($datos['apellido2']),
    ':email'     => trim($datos['email']),
];

if (!empty($datos['password'])) {
    $params[':password'] = password_hash(trim($datos['password']), PASSWORD_DEFAULT);
} else {
    $params[':password'] = null;
}

$seEdito = EditarPerfilCRUD::editar($params);

if ($seEdito) {
    $_SESSION['ok'] = 'Perfil editado con éxito';
    /** @var Usuario $usuario */
    $usuario = $_SESSION['usuario'];
    $usuario->setNombre1($params[':nombre1']);
    $usuario->setNombre2($params[':nombre2']);
    $usuario->setApellido1($params[':apellido1']);
    $usuario->setApellido2($params[':apellido2']);
    $usuario->setEmail($params[':email']);

    $_SESSION['usuario'] = $usuario;
} else {
    $_SESSION['error'] = 'Error al editar el perfil';
}

header('location: ../../view/principal.php');
exit;


// aqui se edita el perfil de la persona 