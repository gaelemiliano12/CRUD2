<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "digitalnexus";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

// Eliminar el usuario de la base de datos (también puedes agregar aquí la lógica de seguridad, como comprobar si el usuario tiene permisos para eliminar)
$sql = "DELETE FROM reporte_alquiler WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
       Registro eliminado correctamente.

       </div>

    <?php

    // Redireccionar a la página tabla-reporte.php después de eliminar
    header("Location: tabla-reporte.php");
    exit(); // Asegurar que el código no siga ejecutándose después de la redirección
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

$conn->close();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "digitalnexus";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$sql = "SELECT id, fecha_inicio, fecha_finalizacion FROM reporte_alquiler";
$result = $conn->query($sql);
?>



