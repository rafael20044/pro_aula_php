<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Questopia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../resource/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <img src="../resource/img/favicon.ico" alt="Questopia">
        </div>
        
        <h1>Iniciar sesión</h1>
        
        <form method="post" action="../controller/usuario/login.php">
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="correo" name="correo" placeholder="tucorreo@ejemplo.com" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="pass" name="pass" placeholder="Ingresa tu contraseña" required>
                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                </div>
            </div>
            
            <button type="submit" class="submit-btn">Iniciar sesión</button>
            
            <div class="signup-link">
                ¿No tienes cuenta? <a href="singup.php">Regístrate aquí</a>
            </div>
        </form>
    </div>

    <script>
        // Mostrar/ocultar contraseña
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#pass');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
        
        // Manejo de errores desde PHP
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');
            
            if (error) {
                alert(error);
            }
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