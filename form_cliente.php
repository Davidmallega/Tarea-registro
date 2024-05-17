<?php include 'session_start.php'?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Empresa de Automóviles</title>
    <link rel="stylesheet" href="estilos2.css">
    <link rel="stylesheet" href="fondo2.css">
</head>
<body>
    <h2> </h2> <!-- espacio -->
<body>
    <a href="reportes.php">
    <img src="img/icono_u.svg" alt="error img" style="cursor: pointer;">
    </a>
    <h2>Bienvenido:<?php echo $nombreUsuario; ?></h2>

    <div class="container">
    <img src="img/logomediano.png" alt="Logo de la empresa">
            <h2>Formulario de Registro de Cliente</h2>
            
        <form action="proceso_datos.php" method="post" autocomplete="on"> 
        
            <div class="input-group">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
            </div>
            <div class="input-group">
                <input type="text" name="identificacion" placeholder="Identificación" required>
                <input type="tel" name="telefono" placeholder="Teléfono" 
                required pattern="569[0-9]{8}" 
                title="Debe comenzar con 569 y tener 11 dígitos en total" 
                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);">
            </div>
            <div class="input-group">
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <input type="text" name="direccion" placeholder="Dirección" 
                required pattern=".*[0-9]+.*" title="Debe contener al menos un número">
            </div>
            <h2>Vehículo</h2>
            <div class="input-group">
            <input type="text" name="patente" placeholder="Patente" required 
                    pattern="[A-Z]{4}\d{2}" 
                    title="Debe tener 4 letras MAYUSCULAS seguidas de 2 números (por ejemplo, ABCD12)">
                <input type="text" name="marca" placeholder="Marca" required>
            </div>
            <div class="input-group">
                <input type="text" name="modelo" placeholder="Modelo" required>
                <input type="number" name="año" placeholder="Año" required oninput="javascript: if 
                (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                maxlength="4">
            </div>
            <div class="input-group">
                <label for="transmision">Transmisión:</label>
            <div class="checkbox-group">
            <input type="radio" id="automatica" name="transmision" value="automatica" required>
                    <label for="automatica">Automática</label>
                    <input type="radio" id="manual" name="transmision" value="manual" required>
                    <label for="manual">Manual</label>
    </div>
</div>
            <div class="input-group">
            <textarea name="fallas" placeholder="Fallas"></textarea>
            <input type="text" name="tecnico" placeholder="Tecnico Asigando" required>
            </div>
            <input type="submit" class="btn" value="Registrar Cliente y Vehículo" />
            
        </form>
    </div>
</body>
</html>
