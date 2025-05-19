<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Questopia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../resource/css/sign.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="register-container">
        <div class="logo">
            <img src="../resource/img/favicon.ico" alt="Questopia">
        </div>
        
        <h1>Crear una nueva cuenta</h1>
        
        <form class="register-form" action="../controller/usuario/singup.php" method="post">
            <div class="form-group">
                <label for="nombre1">Primer nombre *</label>
                <div class="input-wrapper">
                    <input type="text" id="nombre1" name="nombre1" placeholder="Ej: Juan" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nombre2">Segundo nombre</label>
                <div class="input-wrapper">
                    <input type="text" id="nombre2" name="nombre2" placeholder="Ej: Carlos">
                </div>
            </div>
            
            <div class="form-group">
                <label for="apellido1">Primer apellido *</label>
                <div class="input-wrapper">
                    <input type="text" id="apellido1" name="apellido1" placeholder="Ej: Pérez" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="apellido2">Segundo apellido *</label>
                <div class="input-wrapper">
                    <input type="text" id="apellido2" name="apellido2" placeholder="Ej: González" required>
                </div>
            </div>
            
            <div class="form-group full-width">
                <label for="correo">Correo electrónico *</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--color-gray);"></i>
                    <input type="email" id="correo" name="correo" placeholder="tucorreo@ejemplo.com" required style="padding-left: 40px;">
                </div>
            </div>
            
            <div class="form-group full-width">
                <label for="pass">Contraseña *</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--color-gray);"></i>
                    <input type="password" id="pass" name="pass" placeholder="Crea una contraseña segura" required style="padding-left: 40px;">
                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                </div>
            </div>
            
            <div class="form-group full-width">
                <button type="submit" class="submit-btn">Registrarse</button>
            </div>
        </form>
        
        <div class="login-link">
            ¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>
        </div>
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
        
        // Validación de campos requeridos
        document.querySelector('form').addEventListener('submit', function(e) {
            const requiredFields = document.querySelectorAll('input[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = 'red';
                    isValid = false;
                } else {
                    field.style.borderColor = '#ddd';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Por favor completa todos los campos obligatorios (*)",
                });
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