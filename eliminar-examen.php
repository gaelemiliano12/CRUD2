<?php
if (isset($_GET["idc"])) {
    $idc = $_GET["idc"];

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
    $sql = "DELETE FROM examen WHERE idc='$idc'";

    if ($conn->query($sql) === TRUE) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
           Registro eliminado correctamente.
  
           </div>
  
        <?php

        // Redireccionar a la página tabla-reporte.php después de eliminar
        header("Location: consulta-examen.php");
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

$sql = "SELECT idc, nombre, tipo FROM examen";
$result = $conn->query($sql);
?>

<!-- El resto del código HTML sigue igual... -->
