<?php
require_once __DIR__ . '../../../model/crud/usuario/EliminarUsuario.php';
session_start();

$id = $_POST['id'];

$seBorro = EliminarUsuario::eliminar($id);

if ($seBorro) {
    $_SESSION['ok'] = 'Perfil borrado con éxito';
    unset($_SESSION['usuario']);
} else {
    $_SESSION['error'] = 'Error al eliminar el perfil';
}

header('location: ../../view/principal.php');
exit;
