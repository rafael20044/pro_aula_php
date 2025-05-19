<?php
require_once __DIR__ . '../../../model/crud/pregunta/EliminarPregunta.php';

session_start();

$preguntaID = $_POST['eliminar'];

$seElimino = EliminarPregunta::eliminarPor($preguntaID);

if ($seElimino) {
    $_SESSION['ok'] = 'Pregunta eliminada con exito';
    header('location: ../../view/principal.php');
}else{
    $_SESSION['error'] = 'No se pudo eliminar la pregunta';
    header('location: ../../view/principal.php');
}