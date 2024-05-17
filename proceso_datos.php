<?php
include 'session_start.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre'])) {
    // Si no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: index.php");
    exit();
}

// Inicializar la variable de mensaje
$message = "";

// Inicializar la variable de datos guardados correctamente
$datos_guardados = [];

// Verifica si se enviaron datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos 
    $conn = new mysqli('localhost', 'root', '', 'tallermecanico');

    // Verifica si hay algún error en la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Prepara y ejecuta la consulta SQL para insertar los datos del cliente en la tabla correspondiente
    $stmt = $conn->prepare("INSERT INTO Clientes (nombre, apellido, identificacion, telefono, correo, direccion) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $apellido, $identificacion, $telefono, $correo, $direccion);

    // Obtiene los valores del formulario
    $nombre = ucfirst($_POST['nombre']);
    $apellido = ucfirst($_POST['apellido']);
    $identificacion = $_POST['identificacion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];

    // Ejecuta la consulta
    if (!$stmt->execute()) {
        die("Error al registrar cliente en la base de datos: " . $stmt->error);
    }

    // Obtiene el ID del cliente insertado
    $id_cliente = $conn->insert_id;

    // Prepara y ejecuta la consulta SQL para insertar los datos del vehículo en la tabla correspondiente
    $stmt = $conn->prepare("INSERT INTO Vehiculos (id_cliente, patente, marca, modelo, año, transmision, fallas, tecnico_asignado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssisss", $id_cliente, $patente, $marca, $modelo, $año, $transmision, $fallas, $tecnico_asignado);

    // Obtiene los valores del formulario
    $patente = $_POST['patente'];
    $marca = ucfirst($_POST['marca']);
    $modelo = $_POST['modelo'];
    $año = $_POST['año'];
    $transmision = isset($_POST['transmision']) ? $_POST['transmision'] : null;
    $fallas = $_POST['fallas'];
    $tecnico_asignado = ucfirst($_POST['tecnico']);

    // Ejecuta la consulta
    if (!$stmt->execute()) {
        die("Error al registrar vehículo en la base de datos: " . $stmt->error);
    }

    // Cierra la conexión a la base de datos
    $stmt->close();
    $conn->close();

    // Establece el mensaje de éxito
    $message = "Los datos se guardaron correctamente.";

    // Agrega los datos guardados correctamente a la lista
    $datos_guardados[] = "Nombre: $nombre"; 
    $datos_guardados[] = "Apellido: $apellido";
    $datos_guardados[] = "Identificación: $identificacion";
    $datos_guardados[] = "Teléfono: $telefono";
    $datos_guardados[] = "Correo electrónico: $correo";
    $datos_guardados[] = "Dirección: $direccion";
    $datos_guardados[] = "Patente: $patente";
    $datos_guardados[] = "Marca: $marca";
    $datos_guardados[] = "Modelo: $modelo";
    $datos_guardados[] = "Año: $año";
    $datos_guardados[] = "Transmisión: $transmision";
    $datos_guardados[] = "Fallas: $fallas";
    $datos_guardados[] = "Técnico asignado: $tecnico_asignado";
}
include 'form_exito_de_registro.php';

?>
