<?php
require_once __DIR__ . '../../../model/crud/reaccion/GestionarReaccion.php';

session_start();

$datos = [
    ':usuario_id'=> $_POST['usuario_id'],
    ':respuesta_id' => $_POST['respuesta_id'],
    ':tipo' => $_POST['tipo']
];

$seCreo = GestionarReaccion::gestionar($datos);
if ($seCreo) {
    header("Location: ../../view/pregunta.php?id=" . $_POST['pregunta_id']);
}else{
    header("Location: ../../view/pregunta.php?id=" . $_POST['pregunta_id']);
}

//sesion de like y dislike de respuestas 