<html>
    <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

<?php
$conn = require_once 'conexion.php';

// Procesar el formulario
if (isset($_POST["submit"])) {
    $rut = $_POST["rut"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $correo_electronico = $_POST["correo_electronico"];
    $telefono = $_POST["telefono"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO clientes (rut, nombre, apellido, direccion, correo_electronico, telefono) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $rut, $nombre, $apellido, $direccion, $correo_electronico, $telefono);
    $stmt->execute();

    // Mostrar un mensaje de confirmación y redirigir al index.php
    echo "Cliente creado con éxito!";
    header("Location: index.php");
    exit();
} 
else {
    // Mostrar el formulario
    ?>
    <div id="crear-cliente">
        <h1>Crear cliente</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="rut">RUT:</label>
            <input type="text" id="rut" name="rut"><br><br>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"><br><br>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido"><br><br>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion"><br><br>
            <label for="correo_electronico">Correo electrónico:</label>
            <input type="email" id="correo_electronico" name="correo_electronico"><br><br>
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono"><br><br>
            <input type="submit" name="submit" value="Crear cliente">
        </form>
        <form action="index.php">
            <input type="submit" value="Ver listado de clientes">
        </form>
    </div>
    <?php
}
?>
</html>