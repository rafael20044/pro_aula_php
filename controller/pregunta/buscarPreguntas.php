<?php
require_once __DIR__ . '../../../model/crud/pregunta/BuscarPreguntaCRUD.php';
require_once __DIR__ . '../../../model/dto/PreguntaEtiquetaRespuesta.php';
session_start();

$buscar = '%' . trim($_GET['busqueda']) . '%';

$preguntasBuscar = BuscarPreguntaCRUD::buscar($buscar);
$_SESSION['preguntasBuscar'] = $preguntasBuscar;

header('location: ../../view/buscador.php');
exit;

//esta busca una pregunta por el titulo o contenido