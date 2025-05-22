<?php
require_once __DIR__ . '../../model/entity/Usuario.php';
require_once __DIR__ . '../../controller/pregunta/BuscarPreguntaPorCtrl.php';
session_start();
$usuario = null;
if (isset($_SESSION['usuario'])) {
    /** @var Usuario $usuario */
    $usuario = $_SESSION['usuario'];
}

if (!isset($_GET['id'])) {
    echo "Pregunta no especificada";
    exit;
}

$id = intval($_GET['id']);
$datos = BuscarPreguntaPorCtrl::buscar($id);
$preguntaInfo = $datos['pregunta'];
$respuestas = $datos['respuestas'];
if (!$preguntaInfo->getContenido()) {
    header('location: 404.php');
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
    <link rel="stylesheet" href="../resource/css/pregunta.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <a href="preguntas.php">
            <img src="../resource/img/favicon.ico" alt="Questopia">
            Questopia
        </a>
        <form class="buscador" method="get" action="../controller/pregunta/buscarPreguntas.php">
            <input type="text" name="busqueda" placeholder="Buscar pregunta">
            <button type="submit">
                <img src="../resource/img/lupa.png" alt="Buscar">
            </button>
        </form>

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

    <main class="main_pregunta">
        <section>
            <span> <?= $preguntaInfo->getNombre() ?> </span>
            <h1> <?= $preguntaInfo->getTitulo() ?> </h1>
            <p> <?= $preguntaInfo->getContenido() ?> </p>
            <span> <?= $preguntaInfo->getNombreEtiqueta() ?> </span>
        </section>
        <section>
            <?php if ($usuario): ?>
                <form action="../controller/respuesta/crearRespuesta.php" method="post">
                    <h2>Coloca una respuesta para ayudar a resolver la pregunta</h2>
                    <textarea name="contenido" id="" required></textarea>
                    <input type="hidden" name="usuario_id" value="<?= $usuario->getId() ?>">
                    <input type="hidden" name="pregunta_id" value="<?= $id ?>">
                    <button type="submit">Responder</button>
                </form>
            <?php else: ?>
                <h2>Para poder comentar debes de iniciar sesión</h2>
            <?php endif; ?>
            <div class="comentarios">
                <?php if (empty($respuestas)): ?>
                    <p>Sin respuestas</p>
                <?php else: ?>
                    <?php foreach ($respuestas as $respuesta): ?>
                        <div>
                            <span> <?= $respuesta->getNombre() ?> </span>
                            <p> <?= $respuesta->getContenido() ?> </p>
                            <span> <?= $respuesta->getCreatedAt() ?> </span>
                            <?php if ($usuario): ?>
                                <form action="../controller/reaccion/gestionarReaccion.php" method="post" style="display:inline;">
                                    <input type="hidden" name="respuesta_id" value="<?= $respuesta->getId() ?>">
                                    <input type="hidden" name="pregunta_id" value="<?= $id ?>">
                                    <input type="hidden" name="usuario_id" value="<?= $usuario->getId() ?>">
                                    <input type="hidden" name="tipo" value="like">
                                    <button type="submit">👍 Like <?= $respuesta->getLikes() ?></button>
                                </form>

                                <form action="../controller/reaccion/gestionarReaccion.php" method="post" style="display:inline;">
                                    <input type="hidden" name="respuesta_id" value="<?= $respuesta->getId() ?>">
                                    <input type="hidden" name="pregunta_id" value="<?= $id ?>">
                                    <input type="hidden" name="usuario_id" value="<?= $usuario->getId() ?>">
                                    <input type="hidden" name="tipo" value="dislike">
                                    <button type="submit">👎 Dislike <?= $respuesta->getDislike() ?></button>
                                </form>
                            <?php else: ?>
                                <p>Inicia sesión para reaccionar.</p>
                            <?php endif; ?>

                            <?php if ($usuario && $respuesta->getUsuarioId() == $usuario->getId()): ?>
                                <form action="../controller/respuesta/eliminarRespuesta.php" method="post">
                                    <input type="hidden" name="respuesta_id" value="<?= $respuesta->getId() ?>">
                                    <input type="hidden" name="pregunta_id" value="<?= $id ?>">
                                    <button type="submit">Eliminar</button>
                                </form>
                                <button onclick="abrirDialogEditar(<?= $respuesta->getId() ?>, '<?= htmlspecialchars($respuesta->getContenido(), ENT_QUOTES) ?>')">
                                    Editar
                                </button>

                                <dialog id="editar-dialog-<?= $respuesta->getId() ?>">
                                    <form method="post" action="../controller/respuesta/editarRespuesta.php">
                                        <h3>Editar comentario</h3>
                                        <textarea name="contenido"><?= htmlspecialchars($respuesta->getContenido()) ?></textarea>
                                        <input type="hidden" name="respuesta_id" value="<?= $respuesta->getId() ?>">
                                        <input type="hidden" name="pregunta_id" value="<?= $id ?>">
                                        <button type="submit">Guardar</button>
                                        <button type="button" onclick="cerrarDialogEditar(<?= $respuesta->getId() ?>)">Cancelar</button>
                                    </form>
                                </dialog>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>
<script>
    function abrirDialogEditar(id, contenido) {
        const dialog = document.getElementById('editar-dialog-' + id);
        dialog.showModal();
    }

    function cerrarDialogEditar(id) {
        const dialog = document.getElementById('editar-dialog-' + id);
        dialog.close();
    }
</script>

</html>

<?php if (isset($_SESSION['error'])): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "<?= $_SESSION['error'] ?>",
        });
    </script>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['ok'])): ?>
    <script>
        Swal.fire({
            title: "<?= $_SESSION['ok'] ?>",
            icon: "success",
            draggable: true
        });
    </script>
    <?php unset($_SESSION['ok']); ?>
<?php endif; ?>