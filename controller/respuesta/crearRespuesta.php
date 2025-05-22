<?php
require_once __DIR__ . '../../../model/crud/respuesta/CrearRespuesta.php';
session_start();

$params = [
    ':usuario_id' => $_POST['usuario_id'],
    ':pregunta_id' => $_POST['pregunta_id'],
    ':contenido' => $_POST['contenido']
];

$id = $params[':pregunta_id'];

$seCreo = CrearRespuesta::crear($params);

if ($seCreo) {
    $_SESSION['ok'] = 'Respuesta creada con exito';
    header("location: ../../view/pregunta.php?id=$id");
}else{
    $_SESSION['error'] = 'Error al crear la respuesta';
    header("location: ../../view/pregunta.php?id=$id");
}

//aqui se crea la respuesta de una pregunta 