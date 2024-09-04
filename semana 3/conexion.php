<?php
// Datos de la base de datos
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_de_datos = 'firma_abogados_db';

// Crear la conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Retornar la conexión
return $conn;
?>