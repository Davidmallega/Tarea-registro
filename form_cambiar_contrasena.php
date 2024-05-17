<?php
include 'cambiar_contrasena.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilos3.css">
    <link rel="stylesheet" href="fondo2.css">
</head>
<body>
    <form method="post" autocomplete="off">
    <h2 class="center-text">Cambiar Contraseña</h2>
        <div class="input-group">
            <div class="input-container">
                <input type="text" name="nombre" placeholder="Usuario" 
                required pattern="[A-Z]{8}" maxlength="8" 
                title="El usuario debe tener exactamente 8 letras mayúsculas" 
                oninput="this.value = this.value.toUpperCase();">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-container">
                <input type="password" name="old_password" placeholder="Contraseña Antigua" required pattern="[a-z]{6}" 
                maxlength="6" title="La contraseña debe tener exactamente 6 letras minúsculas">
                <i class="fa-solid fa-eye-slash toggle-password" data-target="old_password"></i>
                <input type="password" name="new_password" placeholder="Nueva Contraseña" required pattern="[a-z]{6}" 
                maxlength="6" title="La contraseña debe tener exactamente 6 letras minúsculas">
                <i class="fa-solid fa-eye-slash toggle-password" data-target="new_password"></i>
            </div>
            <input type="submit" name="cambiar_password" class="btn" value="                Cambiar Contraseña             ">
        </div>
        <div class="error-message">
            <?php if(isset($_GET['error'])) {
                echo $_GET['error'];
            } ?>
        </div>
    </form>
    <script>
        const togglePasswordIcons = document.querySelectorAll('.toggle-password');

        togglePasswordIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.querySelector(`[name="${targetId}"]`);

                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>
