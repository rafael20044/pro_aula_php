<?php
require_once __DIR__ . '../../../model/crud/pregunta/ResolverPregunta.php';

session_start();

$preguntaID = $_POST['resuelta'];

$seResolvio = ResolverPregunta::resolverPor($preguntaID);

if ($seResolvio) {
    $_SESSION['ok'] = 'Pregunta marcada como resuelta';
    header('location: ../../view/principal.php');
}else{
    $_SESSION['error'] = 'No se pudo marcar como resulta';
    header('location: ../../view/principal.php');
}