<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reportes.css">
    <link rel="stylesheet" href="fondo2.css">
</head>
<body>
<body>
    <div class="container">
    <img src="img/cars.svg" alt="errorimg">
    <?php
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "tallerMecanico");

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Generar reportes de clientes
    $sql_clientes = "SELECT id, nombre, apellido, identificacion, direccion, telefono, correo FROM Clientes ORDER BY id ASC";
    $resultado_clientes = $conexion->query($sql_clientes);

    // Mostrar reporte de clientes
    echo "<h2>Reporte de Clientes</h2>";
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Identificación</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
        </tr>";

    if ($resultado_clientes->num_rows > 0) {
        while($fila = $resultado_clientes->fetch_assoc()) {
            echo "<tr>
                <td>".$fila['id']."</td>
                <td>".$fila['nombre']."</td>
                <td>".$fila['apellido']."</td>
                <td>".$fila['identificacion']."</td>
                <td>".$fila['direccion']."</td>
                <td>".$fila['telefono']."</td>
                <td>".$fila['correo']."</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No hay registros de clientes</td></tr>";
    }
    echo "</table>";

    // Generar reportes de vehículos
    $sql_vehiculos = "SELECT id, id_cliente, patente, marca, modelo, año, transmision, fallas, tecnico_asignado FROM Vehiculos ORDER BY id ASC";
    $resultado_vehiculos = $conexion->query($sql_vehiculos);

    // Mostrar reporte de vehículos
    echo "<h2>Reporte de Vehículos</h2>";
    echo "<table border='1'>
        <tr>
            <th>ID Cliente</th>
            <th>Patente</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Transmisión</th>
            <th>Fallas</th>
            <th>Técnico Asignado</th>
        </tr>";

    if ($resultado_vehiculos->num_rows > 0) {
        while($fila = $resultado_vehiculos->fetch_assoc()) {
            echo "<tr>
                <td>".$fila['id_cliente']."</td>
                <td>".$fila['patente']."</td>
                <td>".$fila['marca']."</td>
                <td>".$fila['modelo']."</td>
                <td>".$fila['año']."</td>
                <td>".$fila['transmision']."</td>
                <td>".$fila['fallas']."</td>
                <td>".$fila['tecnico_asignado']."</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No hay registros de vehículos</td></tr>";
    }
    echo "</table>";

    // Cerrar conexión
    $conexion->close();
    ?>
</div>

</body>
</html>
