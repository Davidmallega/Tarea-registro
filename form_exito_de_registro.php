<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Empresa de Automóviles</title>
    <link rel="stylesheet" href="estilos2.css">
    <link rel="stylesheet" href="fondo2.css">
    <style>
        .success-message {
            text-align: center;
            color: green;
        }
        .container ul {
            margin: 0 auto; /* Centra la lista horizontalmente */
            width: 50%; 
        .container h3 {
            text-align: center; /* Centra el texto horizontalmente */
        }
    </style>
</head>
<body>
<body>
        <a href="reportes.php">
            <img src="img/icono_u.svg" alt="error img" style="cursor: pointer;">
        </a>
    <h2><?php echo $nombreUsuario; ?></h2>
    <div class="container">
                <?php if (!empty($message)) : ?>
            <div class="success-message"><?php echo $message; ?></div>
        <?php endif; ?>
        <h3>Datos:</h3>
        <ul>
            <?php foreach ($datos_guardados as $dato) : ?>
                <li><?php echo $dato; ?></li>
            <?php endforeach; ?>
        </ul>
        
    </div>
</body>
</html>
