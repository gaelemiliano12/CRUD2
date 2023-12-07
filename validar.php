<?php
// Primero, establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "digitalnexus";

// Crea la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verifica si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (!empty($_POST["iniciar"])) {
    if (empty($_POST["correo"]) || empty($_POST["contrasena"])) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           LLENA TODOS LOS CAMPOS!!
        </div>
        <?php
    } else {
        $correo = $_POST["correo"];
        $contra = $_POST["contrasena"];
        // Usa sentencias preparadas para evitar ataques de inyección SQL
        $stmt = $conexion->prepare("SELECT * FROM registro WHERE correo=? AND contrasena=?");
        $stmt->bind_param("ss", $correo, $contra);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            header("location:indexxss.php");
            exit; // Es buena práctica agregar exit; después de redireccionar con header()
        } else {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ACCESO DENEGADO!!!
            </div>
            <?php
        }
    }
    // Cierra la conexión
    $conexion->close();
}
?>
