<?php
require_once __DIR__ . '../../model/entity/Usuario.php';
require_once __DIR__ . '../../controller/pregunta/BuscarPreguntaPorCtrl.php';
session_start();
$usuario = null;
if (isset($_SESSION['usuario'])) {
    /** @var Usuario $usuario */
    $usuario = $_SESSION['usuario'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Questopia - Red Social Educativa</title>
    <link rel="stylesheet" href="../resource/css/404.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <a href="preguntas.php">
            <img src="../resource/img/favicon.ico" alt="Questopia">
            Questopia
        </a>
        <div class="buscador">
            <input type="text" placeholder="Buscar pregunta">
            <img src="../resource/img/lupa.png" alt="Buscar">
        </div>
        <div class="logings">
            <?php if($usuario): ?>
                <p>Hola, <?= $usuario->getNombre1() ?></p>
                <form action="../controller/usuario/salir.php" method="post">
                    <button type="submit" name="cerrar_sesion">
                        Cerrar sesión
                    </button>
                </form>
            <?php else: ?>
                <a href="login.php">Iniciar sesión</a>
                <a href="singup.php">Registrarse</a>
            <?php endif; ?>
        </div>
    </header>
    
    <nav>
        <a href="principal.php">
            <img src="../resource/img/casa.png" alt="Inicio">
            Inicio
        </a>
        <a href="preguntas.php">
            <img src="../resource/img/mensaje.png" alt="Preguntas">
            Preguntas
        </a>
        <a href="nosotros.php">
            <img src="../resource/img/cuerpo.png" alt="Nosotros">
            Nosotros
        </a>
    </nav>
    
    <main class="main_pregunta">
        <h1>ERROR 404</h1>
        <p>Pregunta no existente</p>
    </main>
</body>
