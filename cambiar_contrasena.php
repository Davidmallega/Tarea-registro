<?php
include 'conexion.php';

if(isset($_POST['cambiar_password'])) {
    $nombre = $_POST['nombre'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Verificar la antigua contraseña
    $sql_verificacion = "SELECT * FROM usuarios WHERE nombre='$nombre' AND password='$old_password'";
    $result = $conn->query($sql_verificacion);
    if ($result->num_rows === 0) {
        // Si la contraseña antigua no coincide, mostrar un mensaje de error
        header("Location: cambiar_contrasena.php?error=La contraseña antigua es incorrecta");
        exit();
    }

    // Actualizar la contraseña en la base de datos
    $sql = "UPDATE usuarios SET password='$new_password' WHERE nombre='$nombre'";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a una página de confirmación o mostrar un mensaje de éxito
        header("Location: cambio_correcto.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


