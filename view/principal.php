<?php
require '../model/entity/Usuario.php';
require_once __DIR__ . '../../controller/pregunta/BuscarPreguntaDECtr.php';
require_once __DIR__ . '../../controller/etiqueta/VerEtiquetas.php';
session_start();
$usuario = null;
if (isset($_SESSION['usuario'])) {
    /** @var Usuario $usuario */
    $usuario = $_SESSION['usuario'];
}

if ($usuario) {
    $preguntas = BuscarPreguntaDECtr::buscar($usuario->getId());
}
$etiquetas = VerEtiquetas::verEtiquetas();
$preguntaEditar = [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questopia - Red Social Educativa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../resource/css/principal.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <a href="preguntas.php" class="logo">
            <img src="../resource/img/favicon.ico" alt="Questopia">
            Questopia
        </a>

        <form class="buscador" method="get" action="../controller/pregunta/buscarPreguntas.php">
            <input type="text" name="busqueda" placeholder="Buscar pregunta">
            <button type="submit">
                <img src="../resource/img/lupa.png" alt="Buscar">
            </button>
        </form>


        <div class="user-actions">
            <?php if ($usuario): ?>
                <span>Hola, <?= $usuario->getNombre1() ?></span>
                <form action="../controller/usuario/salir.php" method="post">
                    <button type="submit" name="cerrar_sesion">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </button>
                </form>
            <?php else: ?>
                <a href="login.php" class="login"><i class="fas fa-sign-in-alt"></i> Login</a>
                <a href="singup.php" class="signup"><i class="fas fa-user-plus"></i> Registro</a>
            <?php endif; ?>
        </div>
    </header>

    <nav>
        <a href="principal.php"><i class="fas fa-home"></i> Inicio</a>
        <a href="preguntas.php"><i class="fas fa-question-circle"></i> Preguntas</a>
        <a href="nosotros.php"><i class="fas fa-users"></i> Nosotros</a>
    </nav>

    <main>
        <?php if ($usuario): ?>
            <section class="profile-header">
                <h1><?= $usuario->getNombre1() . ' ' . $usuario->getNombre2() . ' ' . $usuario->getApellido1() . ' ' . $usuario->getApellido2() ?></h1>
                <span>Miembro desde: <?= $usuario->getCreateAt() ?></span>

                <button type="button" onclick="document.getElementById('dialogoEditarPerfil').showModal()">Editar perfil</button>

                <form action="../controller/usuario/eliminarUsuario.php" method="post">
                    <button type="submit" name="id" value="<?= $usuario->getId() ?>">Eliminar cuenta</button>
                </form>
            </section>

            <dialog id="dialogoEditarPerfil">
                <form method="post" action="../controller/usuario/editarPerfil.php">
                    <h2>Editar perfil</h2>

                    <label for="nombre1">Primer nombre:</label>
                    <input type="text" id="nombre1" name="nombre1" value="<?= htmlspecialchars($usuario->getNombre1()) ?>" required>

                    <label for="nombre2">Segundo nombre:</label>
                    <input type="text" id="nombre2" name="nombre2" value="<?= htmlspecialchars($usuario->getNombre2()) ?>">

                    <label for="apellido1">Primer apellido:</label>
                    <input type="text" id="apellido1" name="apellido1" value="<?= htmlspecialchars($usuario->getApellido1()) ?>" required>

                    <label for="apellido2">Segundo apellido:</label>
                    <input type="text" id="apellido2" name="apellido2" value="<?= htmlspecialchars($usuario->getApellido2()) ?>">

                    <label for="email">Correo:</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario->getEmail()) ?>">

                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password">

                    <div class="dialogo-botones">
                        <button type="button" onclick="document.getElementById('dialogoEditarPerfil').close()">Cancelar</button>
                        <button type="submit" name="id" value="<?= $usuario->getId() ?>">Guardar cambios</button>
                    </div>
                </form>
            </dialog>


            <section class="questions-section">
                <h2><i class="fas fa-question"></i> Mis Preguntas</h2>

                <?php if (!empty($preguntas)): ?>
                    <?php foreach ($preguntas as $pregunta): ?>
                        <article>
                            <a href="pregunta.php?id=<?= $pregunta->getPreguntaId() ?>">
                                <p> <?= $pregunta->getTitulo() ?> </p>
                                <p><?= $pregunta->getContenido() ?></p>
                                <span>Fecha de publicacion: <?= $pregunta->getCreatedAt() ?></span>
                                <span>Estado: <?= $pregunta->getEstado() ?></span>
                                <span>Etiqueta: <?= $pregunta->getNombreEtiqueta() ?></span>
                                <span>Comentarios: <?= $pregunta->getNumeroComentarios() ?></span>
                            </a>
                            <form action="../controller/pregunta/eliminarPreguntaCtrl.php" method="post">
                                <button type="submit" name="eliminar" value="<?= $pregunta->getPreguntaId() ?>">Eliminar</button>
                            </form>
                            <form action="../controller/pregunta/resolverPreguntaCtrl.php" method="post">
                                <button type="submit" name="resuelta" value="<?= $pregunta->getPreguntaId() ?>">Marcar como resuelta</button>
                            </form>
                            <button class="editar-btn"
                                data-id="<?= $pregunta->getPreguntaId() ?>"
                                data-titulo="<?= htmlspecialchars($pregunta->getTitulo(), ENT_QUOTES) ?>"
                                data-contenido="<?= htmlspecialchars($pregunta->getContenido(), ENT_QUOTES) ?>"
                                data-etiqueta="<?= $pregunta->getEtiquetaId() ?>">
                                Editar
                            </button>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="question-card">
                        <p>Aún no has publicado ninguna pregunta.</p>
                    </div>
                <?php endif; ?>
            </section>

            <button class="floating-btn" id="abrirDialogo">+</button>

            <dialog id="dialogoPregunta">
                <form method="post" action="../controller/pregunta/crearPregunta.php">
                    <h2>Crear nueva pregunta</h2>

                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Ej: ¿Cómo resolver ecuaciones cuadráticas?" required>

                    <label for="contenido">Contenido:</label>
                    <textarea name="contenido" id="contenido" rows="4" placeholder="Describe tu pregunta con detalle..." required></textarea>

                    <label for="etiqueta">Etiqueta:</label>
                    <select name="etiqueta" id="etiqueta-select" required onchange="mostrarCampoNuevaEtiqueta(this.value)">
                        <?php foreach ($etiquetas as $etiqueta): ?>
                            <option value="<?= $etiqueta->getId() ?>"><?= $etiqueta->getNombre() ?></option>
                        <?php endforeach; ?>
                        <option value="nueva">+ Crear nueva etiqueta</option>
                    </select>

                    <!-- Campo oculto para nueva etiqueta -->
                    <div id="campo-nueva-etiqueta" style="display: none;">
                        <label for="nueva_etiqueta">Nueva etiqueta:</label>
                        <input type="text" name="nueva_etiqueta" id="nueva_etiqueta" placeholder="Ej: Trigonometría">
                    </div>

                    <div class="dialogo-botones">
                        <button type="button" id="cerrarDialogo">Cancelar</button>
                        <button type="submit">Publicar</button>
                    </div>
                </form>
            </dialog>

            <dialog id="dialogoPreguntaEditar">
                <form method="post" action="../controller/pregunta/editarPreguntaCtrl.php">
                    <h2><i class="fas fa-question-circle"></i> Editar Pregunta</h2>

                    <!-- Campo oculto para saber qué pregunta se está editando -->
                    <input type="hidden" name="pregunta_id" id="pregunta_id_editar">

                    <label for="titulo_editar">Título:</label>
                    <input type="text" name="titulo" id="titulo_editar" required placeholder="¿Cuál es tu pregunta?">

                    <label for="contenido_editar">Contenido:</label>
                    <textarea name="contenido" id="contenido_editar" required placeholder="Describe tu pregunta con detalle..."></textarea>

                    <label for="etiqueta_editar">Etiqueta:</label>
                    <select name="etiqueta" id="etiqueta_editar" required>
                        <?php foreach ($etiquetas as $etiqueta): ?>
                            <option value="<?= $etiqueta->getId() ?>"><?= $etiqueta->getNombre() ?></option>
                        <?php endforeach; ?>
                    </select>

                    <div class="dialog-actions">
                        <button type="button" id="cerrarDialogoE">Cancelar</button>
                        <button type="submit">Editar</button>
                    </div>
                </form>
            </dialog>

        <?php else: ?>
            <div class="login-message">
                <h2><i class="fas fa-exclamation-circle"></i> Debes iniciar sesión</h2>
                <p>Para ver esta sección, por favor <a href="login.php">inicia sesión</a> o <a href="singup.php">regístrate</a>.</p>
            </div>
        <?php endif; ?>
    </main>
</body>
<script>
    const boton = document.getElementById('abrirDialogo');
    const dialogo = document.getElementById('dialogoPregunta');
    const cerrar = document.getElementById('cerrarDialogo');

    if (boton && dialogo && cerrar) {
        boton.addEventListener('click', (e) => {
            e.preventDefault();
            dialogo.showModal();
        });

        cerrar.addEventListener('click', () => {
            dialogo.close();
        });
    }
</script>
<script>
    document.querySelectorAll('.editar-btn').forEach(boton => {
        boton.addEventListener('click', () => {
            document.getElementById('pregunta_id_editar').value = boton.dataset.id;
            document.getElementById('titulo_editar').value = boton.dataset.titulo;
            document.getElementById('contenido_editar').value = boton.dataset.contenido;
            document.getElementById('etiqueta_editar').value = boton.dataset.etiqueta;

            document.getElementById('dialogoPreguntaEditar').showModal();
        });
    });

    document.getElementById('cerrarDialogoE').addEventListener('click', () => {
        document.getElementById('dialogoPreguntaEditar').close();
    });
</script>
<script>
    function mostrarCampoNuevaEtiqueta(valor) {
        const campo = document.getElementById('campo-nueva-etiqueta');
        campo.style.display = (valor === 'nueva') ? 'block' : 'none';
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