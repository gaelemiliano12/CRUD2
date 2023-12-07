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

    // Eliminar el registro de la tabla 'pagos' en base al ID proporcionado
    $sql = "DELETE FROM pagos WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Registro eliminado correctamente.
        </div>
        <?php

        // Redireccionar a la página tabla-reporte.php después de eliminar
        header("Location: tabla-pagos.php");
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

// Consultar los registros de la tabla 'pagos'
$sql = "SELECT id, nombre, monto, tipo_pago FROM pagos";
$result = $conn->query($sql);
?>
