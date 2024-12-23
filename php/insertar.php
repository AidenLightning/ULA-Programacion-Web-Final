<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Final</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    
<?php
// Datos de conexión
$servidor = "localhost"; 
$usuario = "root"; // usuario de MySQL
$contraseña = ""; // contraseña de MySQL
$baseDeDatos = "programacionweb"; // Nombre de base de datos

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contraseña, $baseDeDatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];

// Sanitizar datos para prevenir inyección SQL
$nombre = $conn->real_escape_string($nombre);
$email = $conn->real_escape_string($email);

// Insertar datos en la tabla
$sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "<p class='success-message'>Registro exitoso. <br><br> <a href='../index.html'>Volver a la página principal</a></p>";
} else {
    echo "<p class='error-message'>Error al registrar: " . $conn->error . "</p>";
}

// Cerrar conexión
$conn->close();
?>

</body>
</html>