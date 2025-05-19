<?php
require_once __DIR__ . '../../../model/crud/pregunta/EditarPregunta.php';

session_start();

$datos = [
    ':id' => $_POST['pregunta_id'],
    ':titulo' => $_POST['titulo'],
    ':contenido' => $_POST['contenido'],
    ':etiqueta_id'  => $_POST['etiqueta']
];

$seEdito = EditarPregunta::editar($datos);

if ($seEdito) {
    $_SESSION['ok'] = 'Pregunta editada con exito';
    header('location: ../../view/principal.php');
}else{
    $_SESSION['error'] = 'No se puedo editar la pregunta';
    header('location: ../../view/principal.php');
}
