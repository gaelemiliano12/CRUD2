<?php
// Verificar si se reciben los datos del formulario
if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_finalizacion'])) {

    // Incluir el archivo de conexión
    include("conexion.php");

    // Verificar si la conexión se realizó correctamente
    if (!$conex) {
        die("Algo salió mal al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Obtener las fechas del formulario y escaparlas para evitar ataques de inyección SQL
    $fechaInicio = mysqli_real_escape_string($conex, $_POST['fecha_inicio']);
    $fechaFin = mysqli_real_escape_string($conex, $_POST['fecha_finalizacion']);

    // Crear la consulta SQL para insertar los datos
    $sql = "INSERT INTO reporte_alquiler (fecha_inicio, fecha_finalizacion) VALUES ('$fechaInicio', '$fechaFin')";

    if ($conex->query($sql) === TRUE) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Tu reporte se ha generado correctamente. ¡Felicidades!
        </div>
        <?php
    } else {
        echo "Error al guardar los datos: " . $conex->error;
    }

    // Cerrar la conexión a la base de datos
    $conex->close();

} else {
    echo "";
}
?>



