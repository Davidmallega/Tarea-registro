<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="fondo2.css">
</head>
<body>
<div class="logo-container">
    <h2> </h2>
    <img src="img/logoredondo.png" alt="Logo de la empresa">
</div>
    <form method="post" autocomplete="off">
        <img src="img/icono_u.svg" alt="errorimg">
        <div class="input-group">
            <div class="input-container">
                <input type="text" name="nombre" placeholder="Usuario" 
                required pattern="[A-Z]{8}" maxlength="8" 
                title="El usuario debe tener exactamente 8 letras mayúsculas" 
                oninput="this.value = this.value.toUpperCase();">
                <i class="fa-solid fa-user"></i>
            </div>
                <div class="input-container">
                    <input id="passwordInput" type="password" name="password" placeholder="Contraseña" 
                    required pattern="[a-z]{6}" maxlength="6" title="La contraseña debe tener exactamente 6 letras minúsculas"
                    oninput="this.value = this.value.toLowerCase();">
                    <i id="togglePassword" class="fa-solid fa-eye-slash toggle-password"></i>
                </div>
            <input name="register" type="submit" class="btn" value="     Registrar    " formaction="registro.php"/>
            <input name="login" type="submit" class="btn login-btn" value="Iniciar sesión" formaction="verificar_credencial.php"/>
        </div>
        
        <div class="error-message">
            <?php if(isset($_GET['error'])) {
                echo $_GET['error'];
            } ?>
        </div>     
        <a href="form_cambiar_contrasena.php" class="cambiarpass">Cambiar Contraseña</a>
    </form>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>
</html>

