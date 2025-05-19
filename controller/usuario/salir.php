<?php
session_start();
$datos3 = $_POST['cerrar_sesion'];
unset($_SESSION['usuario']);
header('location: ../../view/preguntas.php');