<?php
require_once __DIR__ . '../../../model/crud/pregunta/CrearPregunta.php';
require_once __DIR__ . '../../../model/entity/Usuario.php';
session_start();
$usuario = $_SESSION['usuario'];
$params = [
    ':usuario_id' => (int) $usuario->getId(),
    ':etiqueta_id' => (int) $_POST['etiqueta'],
    ':titulo' => trim($_POST['titulo'] ),
    ':contenido' => trim($_POST['contenido']) 
];
$seCreo = CrearPregunta::crear($params);

if ($seCreo) {
    $_SESSION['ok'] = 'Pregunta creada con exito';
    header('location: ../../view/preguntas.php');
}else{
    $_SESSION['error'] = 'Error al crear la pregunta';
    header('location: ../../view/preguntas.php');
}