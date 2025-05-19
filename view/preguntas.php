<?php
require '../model/entity/Usuario.php';
require_once __DIR__ . '../../controller/etiqueta/VerEtiquetas.php';
require_once __DIR__ . '../../model/entity/Etiqueta.php';
require_once __DIR__ . '../../model/dto/PreguntaUsuarioEtiquetaRespuesta.php';
require_once __DIR__ . '../../controller/pregunta/BuscarPreguntasCtr.php';
session_start();
$usuario = null;
if (isset($_SESSION['usuario'])) {
    /** @var Usuario $usuario */
    $usuario = $_SESSION['usuario'];
}
$etiquetas = VerEtiquetas::verEtiquetas();
$prefuntasInfo = BuscarPreguntasCtr::buscarPreguntasCtr();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Questopia - Red Social Educativa</title>
    <link rel="stylesheet" href="../resource/css/preguntas.css">
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
            <?php if ($usuario): ?>
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

    <main class="main_principal">
        <section class="main-content">
            <h1>Bienvenido a Questopia</h1>
            <p>Explora preguntas y comparte tus conocimientos con la comunidad educativa.</p>

            <?php if ($usuario): ?>
                <div style="margin-top: 30px;">
                    <h2>Tu espacio de aprendizaje</h2>
                    <p>Comienza a interactuar con la comunidad haciendo tu primera pregunta.</p>
                </div>
                <a href="#" class="boton-flotante" id="abrirDialogo">+</a>

                <dialog id="dialogoPregunta">
                    <form method="post" action="../controller/pregunta/crearPregunta.php">
                        <h2>Crear nueva pregunta</h2>
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" placeholder="Ej: ¿Cómo resolver ecuaciones cuadráticas?" required>
                        <label for="contenido">Contenido:</label>
                        <textarea name="contenido" id="contenido" rows="4" placeholder="Describe tu pregunta con detalle..." required></textarea>
                        <select name="etiqueta" id="" required>
                            <?php foreach ($etiquetas as $etiqueta): ?>
                                <option value="<?= $etiqueta->getId() ?>"><?= $etiqueta->getNombre() ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="dialogo-botones">
                            <button type="button" id="cerrarDialogo">Cancelar</button>
                            <button type="submit">Publicar</button>
                        </div>
                    </form>
                </dialog>
            <?php endif; ?>
        </section>
        <section class="main-preguntas">
            <?php foreach ($prefuntasInfo as $prefuntaInfo): ?>
                <article>
                    <a href="pregunta.php?id=<?= $prefuntaInfo->getIdPublicacion() ?>">
                        <span>creado por: <?= $prefuntaInfo->getNombre() ?></span>
                        <p> <?= $prefuntaInfo->getTitulo() ?> </p>
                        <p><?= $prefuntaInfo->getContenido() ?></p>
                        <span>Fecha de publicacion: <?= $prefuntaInfo->getCreatedAt() ?></span>
                        <span>Estado: <?= $prefuntaInfo->getEstado() ?></span>
                        <span>Etiqueta: <?= $prefuntaInfo->getNombreEtiqueta() ?></span>
                        <span>Comentarios: <?= $prefuntaInfo->getNumeroComentarios() ?></span>
                    </a>
                </article>
            <?php endforeach; ?>
        </section>

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

<?php if(isset($_SESSION['error'])):?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "<?= $_SESSION['error'] ?>",
        });
    </script>
<?php unset($_SESSION['error']); ?>
<?php endif;?>

<?php if(isset($_SESSION['ok'])):?>
    <script>
        Swal.fire({
            title: "<?= $_SESSION['ok'] ?>",
            icon: "success",
            draggable: true
        });
    </script>
<?php unset($_SESSION['ok']); ?>
<?php endif;?>
