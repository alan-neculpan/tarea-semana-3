<html>
    <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

<?php
$conn = require_once 'conexion.php';

// Recuperar el ID del cliente de la URL
$id_cliente = $_GET["id_cliente"];

// Consultar la base de datos para obtener la información del cliente
$sql = "SELECT * FROM clientes WHERE id_cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_cliente);
$stmt->execute();
$result = $stmt->get_result();

// Mostrar la información del cliente
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <div id="editar-cliente">
        <h1>Editar cliente</h1>
        <form action='actualizar_cliente.php' method='post'>
            <input type='hidden' id="id_cliente" name='id_cliente' value='<?php echo $row["id_cliente"]; ?>'>
            <label for="nombre">Nombre:</label> <input type='text' id="nombre" name='nombre' value='<?php echo $row["nombre"]; ?>'>
            <label for="apellido">Apellido:</label> <input type='text' id="apellido" name='apellido' value='<?php echo $row["apellido"]; ?>'>
            <label for="rut">RUT:</label> <input type='text' id="rut" name='rut' value='<?php echo $row["rut"]; ?>'>
            <label for="direccion">Dirección:</label> <input type='text' id="direccion" name='direccion' value='<?php echo $row["direccion"]; ?>'>
            <label for="correo_electronico">Correo electrónico:</label> <input type='email' id="correo_electronico" name='correo_electronico' value='<?php echo $row["correo_electronico"]; ?>'>
            <label for="telefono">Teléfono:</label> <input type='text' id="telefono" name='telefono' value='<?php echo $row["telefono"]; ?>'>
            <input type='submit' value='Actualizar'>
        </form>
        <form action='index.php'>
            <input type='submit' value='Cancelar'>
        </form>
    </div>
    <?php
} else {
    echo "No se encontró el cliente.";
}

// Cerrar la conexión
$conn->close();
?>
</html>