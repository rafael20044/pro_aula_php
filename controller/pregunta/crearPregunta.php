<?php
require_once __DIR__ . '../../../model/crud/pregunta/CrearPregunta.php';
require_once __DIR__ . '../../etiqueta/CrearEtiqueta.php';
require_once __DIR__ . '../../../model/entity/Usuario.php';
require_once __DIR__ . '../../../model/entity/Etiqueta.php';
session_start();

$usuario = $_SESSION['usuario'];

// Verifica si el usuario seleccionó "nueva"
if ($_POST['etiqueta'] === 'nueva') {
    $nombreNuevaEtiqueta = trim($_POST['nueva_etiqueta']);

    if (empty($nombreNuevaEtiqueta)) {
        $_SESSION['error'] = 'El nombre de la nueva etiqueta no puede estar vacío.';
        header('location: ../../view/preguntas.php');
        exit;
    }

    // Crear la etiqueta y obtener el ID
    $etiqueta = CrearEtiqueta::crear($nombreNuevaEtiqueta);
    $etiquetaId = $etiqueta->getId();
} else {
    $etiquetaId = (int) $_POST['etiqueta'];
}

$params = [
    ':usuario_id' => (int) $usuario->getId(),
    ':etiqueta_id' => $etiquetaId,
    ':titulo' => trim($_POST['titulo']),
    ':contenido' => trim($_POST['contenido']) 
];

$seCreo = CrearPregunta::crear($params);

if ($seCreo) {
    $_SESSION['ok'] = 'Pregunta creada con éxito';
} else {
    $_SESSION['error'] = 'Error al crear la pregunta';
}

header('location: ../../view/preguntas.php');

//aqui se crea todo lo relaicionado con una pregunta oncluyendo las etiquetas 