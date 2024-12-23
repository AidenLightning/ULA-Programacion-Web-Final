<?php
// Configuración de conexión
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "programacionweb";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los datos
$sql = "SELECT id, nombre, email FROM usuarios";
$resultado = $conexion->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar datos</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header style= "justify-content: space-around;">
        <h1 style= "padding-bottom: 15px;">Usuarios Registrados</h1>
    </header>
    <main style= "justify-content: space-around;" >
        <?php
        if ($resultado->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                    </tr>";
            // Mostrar los datos en la tabla
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>" . $fila["id"] . "</td>
                        <td>" . $fila["nombre"] . "</td>
                        <td>" . $fila["email"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay datos registrados.</p>";
        }
        // Cerrar conexión
        $conexion->close();
        ?>
    </main>
    <div class="call" style="text-align: center; font-size: 25px;"><a href="../index.html">Volver a la página principal</a></div> 
</body>
</html>
