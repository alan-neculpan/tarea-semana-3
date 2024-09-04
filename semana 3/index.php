<html>
    <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

<?php
$conn = require_once 'conexion.php';

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

// Mostrar la lista de clientes
if ($result->num_rows > 0) {
    echo "<h1>Lista de clientes</h1>";
    echo "<form action='crear_cliente.php'><input type='submit' value='Crear Cliente'></form>";
    echo "<table>";
    echo "<tr><th>RUT</th><th>Nombre</th><th>Apellido</th><th>Dirección</th><th>Correo electrónico</th><th>Teléfono</th><th>Acciones</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["rut"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellido"] . "</td>";
        echo "<td>" . $row["direccion"] . "</td>";
        echo "<td>" . $row["correo_electronico"] . "</td>";
        echo "<td>" . $row["telefono"] . "</td>";
        echo "<td>";
        echo "<a href='editar_cliente.php?id_cliente=" . $row["id_cliente"] . "'>Editar</a> | ";
        echo "<a href='eliminar_cliente.php?id_cliente=" . $row["id_cliente"] . "'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay clientes registrados.";
}

// Cerrar la conexión
$conn->close();
?>

</html>