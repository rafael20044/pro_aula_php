<?php
require '../model/entity/Usuario.php';
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
    <title>Nosotros - Questopia</title>
    <link rel="stylesheet" href="../resource/css/nosotros.css">
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
    
    <main>
        <div class="about-container">
            <div class="about-logo">
                <img src="../resource/img/favicon.ico" alt="Questopia">
            </div>
            
            <p class="about-mission">
                IMPULSAMOS EL CONOCIMIENTO COLABORATIVO PARA CREAR TECNOLOGÍA QUE TRANSFORME EL MUNDO.
            </p>
            
            <h3 class="partners-title">Nuestros colaboradores</h3>
            
            <div class="partners-grid">
                <div class="partner-item">
                    <img src="../resource/img/bxl-angular 1.png" alt="Angular">
                </div>
                <div class="partner-item">
                    <img src="../resource/img/bxl-github 1.png" alt="GitHub">
                </div>
                <div class="partner-item">
                    <img src="../resource/img/bxl-google 1.png" alt="Google">
                </div>
                <div class="partner-item">
                    <img src="../resource/img/bxl-microsoft 1.png" alt="Microsoft">
                </div>
                <div class="partner-item">
                    <img src="../resource/img/bxl-stack-overflow 1.png" alt="Stack Overflow">
                </div>
            </div>
        </div>
    </main>

    <script>
        const boton = document.getElementById('abrirDialogo');
        const dialogo = document.getElementById('dialogoPregunta');
        const cerrar = document.getElementById('cerrarDialogo');

        boton?.addEventListener('click', (e) => {
            e.preventDefault();
            dialogo?.showModal();
        });

        cerrar?.addEventListener('click', () => {
            dialogo?.close();
        });
    </script>
</body>
</html>