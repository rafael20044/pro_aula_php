<?php
require_once __DIR__ . '../../../model/crud/respuesta/EliminarRespuestaCRUD.php';

$respuesta_id = $_POST['respuesta_id'];
$id = $_POST['pregunta_id'];
$seElimino = EliminarRespuestaCRUD::eliminar($respuesta_id);


if ($seElimino) {
    $_SESSION['ok'] = 'Respuesta eliminada con exito';
    header("location: ../../view/pregunta.php?id=$id");
}else{
    $_SESSION['error'] = 'Error al eliminar la respuesta';
    header("location: ../../view/pregunta.php?id=$id");
}