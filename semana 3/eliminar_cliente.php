<?php
$conn = require_once 'conexion.php';

// Recuperar el ID del cliente de la URL
$id_cliente = $_GET["id_cliente"];

// Eliminar el cliente de la base de datos de forma segura
$sql = "DELETE FROM clientes WHERE id_cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_cliente);
$stmt->execute();

// Mostrar un mensaje de confirmación
if ($stmt->affected_rows > 0) {
    echo "El cliente ha sido eliminado correctamente.";
} else {
    echo "No se pudo eliminar el cliente.";
}

// Redirigir al index.php
header("Location: index.php");
exit();

// Cerrar la conexión
$conn->close();
?>