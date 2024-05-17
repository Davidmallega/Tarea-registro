<?php
include 'conexion.php'; // incluimos la conexion de la base de datos

// Procesar datos del formulario
if (isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    // Validar el nombre de usuario y la contraseña
    if (!preg_match("/^[A-Z]{8}$/", $nombre)) {
        header("Location: registro.php?error=El usuario debe tener exactamente 8 letras mayúsculas");
        exit();
    }

    if (!preg_match("/^[a-z]{6}$/", $password)) {
        header("Location: registro.php?error=La contraseña debe tener exactamente 6 letras minúsculas");
        exit();
    }

    // Verificar si el usuario ya existe en la base de datos
    $sql_verificacion = "SELECT * FROM usuarios WHERE nombre='$nombre' AND password='$password'";
    $result = $conn->query($sql_verificacion);
    if ($result->num_rows > 0) {
        // Si ya existe un usuario con el mismo nombre y contraseña, mostrar un mensaje de error
        include 'usuario_ya_existe.php';
        exit();
    }

    // Insertar datos en la tabla 'usuarios'
    $sql = "INSERT INTO usuarios (nombre, password) VALUES ('$nombre', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        include 'usuario_correcto.php';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

