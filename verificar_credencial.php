<?php
session_start();
include 'conexion.php';

// Procesar datos del formulario
if (isset($_POST['login'])) {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    // Verificar las credenciales en la base de datos
    $sql = "SELECT * FROM usuarios WHERE nombre='$nombre' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuario autenticado correctamente
        $_SESSION['nombre'] = $nombre; // Almacena el nombre de usuario en la sesión
        header("Location: form_cliente.php"); // Redirige a la página autenticada
        exit();
    } else {
        // Credenciales inválidas, redirige de nuevo a la página de inicio de sesión con un mensaje de error
        $error = ".............Credenciales Incorrectas.........";
        header("Location: index.php?error=" . urlencode($error));
        exit();
    }
}
?>
