<?php
require_once __DIR__ . '../../../model/crud/respuesta/EditarRespuestaCRUD.php';
session_start();

$params = [
    ':respuesta_id' => $_POST['respuesta_id'],
    ':contenido' => $_POST['contenido']
];

$id = $_POST['pregunta_id'];

$seEdito = EditarRespuestaCRUD::editar($params);

if ($seEdito) {
    $_SESSION['ok'] = 'Respuesta editada con exito';
    header("location: ../../view/pregunta.php?id=$id");
}else{
    $_SESSION['error'] = 'Error al editar la respuesta';
    header("location: ../../view/pregunta.php?id=$id");
}