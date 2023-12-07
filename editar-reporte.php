<?php
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

// Definir las variables con valores vacíos al principio
$id_reporte = $fecha_inicio = $fecha_finalizacion = "";

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_reporte = $_POST["id_reporte"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_finalizacion = $_POST["fecha_finalizacion"];

    // Actualizar los datos en la tabla
    $sql = "UPDATE reporte_alquiler SET fecha_inicio='$fecha_inicio', fecha_finalizacion='$fecha_finalizacion' WHERE id='$id_reporte'";

    if ($conn->query($sql) === TRUE) {
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            Se ha actualizado el reporte exitosamente, ¡Felicidades!
        </div>
        <?php
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
} else {
    // Si no se ha enviado el formulario, obtén el ID del reporte a editar y muestra el formulario de edición
    if (isset($_GET["id_reporte"])) {
        $id_reporte = $_GET["id_reporte"];

        // Obtener los datos actuales del reporte
        $sql = "SELECT * FROM reporte_alquiler WHERE id='$id_reporte'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $fecha_inicio = $row["fecha_inicio"];
            $fecha_finalizacion = $row["fecha_finalizacion"];
        } else {
            echo "No se encontró el reporte con el ID proporcionado.";
            $conn->close();
            exit();
        }
    } else {
        echo "ID de reporte no proporcionado.";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Editar Reporte</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
	<link rel="stylesheet" href="assets/css/ollie.css">
</head>
<body>
    <header class="header header-mini"> 
        <div class="header-title">Editar Reporte</div> 
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Edite los campos que desea.</a></li>
            </ol>
        </nav>
    </header> 

    <div class="container">
        <form id="edit-report-form" method="post">
            <div class="container">
                <div class="row mt-5" id="contenedor">
                    <h6 class="section-secondary-title">EDITAR REPORTE</h6>   

                    <input type="hidden" name="id_reporte" value="<?php echo $id_reporte; ?>">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="py-5"></div>
                                    <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>" required>
                                    <div class="py-5"></div>
                                </th>

                                <th scope="col">
                                    <div class="py-5"></div>
                                    <input type="date" name="fecha_finalizacion" value="<?php echo $fecha_finalizacion; ?>" required>
                                    <div class="py-5"></div>
                                </th>

                                <th scope="col">
                                    <div class="py-5"></div>
                                    <div class="form-group"></div>
                                    <input class="btn btn-primary" type="submit" value="Guardar cambios">
                                    </div>
                                    <div class="py-5"></div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </form>
    </div>

    <div class="py-5">
        <div class="pie-form">
            <a class="nav-link btn btn-primary" href="tabla-reporte.php">Volver</a>
        </div> 
    </div>

    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
    
    <!-- Owl carousel  -->
    <script src="assets/vendors/owl-carousel/js/owl.carousel.js"></script>

    <!-- Ollie js -->
    <script src="assets/js/Ollie.js"></script>
</body>
</html>
