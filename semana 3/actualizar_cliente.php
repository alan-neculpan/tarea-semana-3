<?php
$conn = require_once 'conexion.php';

// Verificar si el formulario se ha enviado correctamente
if (isset($_POST["submit"])) {
    // Recuperar los datos del formulario
    $id_cliente = $_POST["id_cliente"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $rut = $_POST["rut"];
    $direccion = $_POST["direccion"];
    $correo_electronico = $_POST["correo_electronico"];
    $telefono = $_POST["telefono"];

    // Actualizar la información del cliente en la base de datos
    $sql = "UPDATE clientes SET nombre = ?, apellido = ?, rut = ?, direccion = ?, correo_electronico = ?, telefono = ? WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nombre, $apellido, $rut, $direccion, $correo_electronico, $telefono, $id_cliente);
    $stmt->execute();

    // Redirigir al index.php
    header("Location: index.php");
    exit();
} 
else {
    // Mostrar un error o redirigir al index.php
    echo "Error: El formulario no se ha enviado correctamente.";
    header("Location: index.php");
    exit();
}
?>