<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Tabla de Pagos</title>

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
        <div class="header-title">Editar Pago</div> 
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Edite los campos que desea.</a></li>
            </ol>
        </nav>
    </header> 

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
    $id = $nombre = $monto = $tipo = "";

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $monto = $_POST["monto"];
        $tipo = $_POST["tipo_pago"];

        // Actualizar los datos en la tabla
        $sql = "UPDATE pagos SET nombre='$nombre', monto='$monto', tipo_pago='$tipo' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Se ha actualizado el pago exitosamente, ¡Felicidades!
            </div>
            <?php
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    } else {
        // Si no se ha enviado el formulario, obtén el ID del pago a editar y muestra el formulario de edición
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            // Obtener los datos actuales del pago
            $sql = "SELECT * FROM pagos WHERE id='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $nombre = $row["nombre"];
                $monto = $row["monto"];
                $tipo = $row["tipo_pago"];
            } else {
                echo "No se encontró el pago con el ID proporcionado.";
                $conn->close();
                exit();
            }
        } else {
            echo "ID de pago no proporcionado.";
            exit();
        }
    }

    $conn->close();
    ?>

    <div class="container">
    <form id="edit-payment-form" method="post">
        <div class="container">
            <div class="row mt-5" id="contenedor">
                <h6 class="section-secondary-title">EDITAR PAGO</h6>   

                <!-- Campo de entrada oculto para el ID -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="py-5"></div>
                                <label for="nombre">Nombre:</label>
                                <!-- Asignar el valor del nombre de la base de datos al campo de entrada -->
                                <input type="text" class="form-control" name="nombre" required value="<?php echo $nombre; ?>">
                                <div class="py-5"></div>
                            </th>

                            <th scope="col">
                                <div class="py-5"></div>
                                <label for="monto">Monto:</label>
                                <!-- Asignar el valor del monto de la base de datos al campo de entrada -->
                                <input type="text" class="form-control" name="monto" required value="<?php echo $monto; ?>">
                                <div class="py-5"></div>
                            </th>

                            <th scope="col">
                                <div class="py-5">
                                    <label for="tipo_pago">Tipo de Pago:</label>
                                    <!-- Asignar el valor del tipo de pago de la base de datos al campo de selección -->
                                    <select name="tipo_pago" required>
                                        <option value="efectivo" <?php if ($tipo == 'efectivo') echo 'selected'; ?>>Efectivo</option>
                                        <option value="tarjeta" <?php if ($tipo == 'tarjeta') echo 'selected'; ?>>Tarjeta</option>
                                        <option value="transaccion" <?php if ($tipo == 'transaccion') echo 'selected'; ?>>Transacción</option>
                                    </select>
                                </div>
                            </th>

                            <th scope="col">
                                <div class="py-5"></div>
                                <div class="form-group"></div>
                                <input class="btn btn-primary" type="submit" value="Guardar cambios" href="tabla-pagos.php">
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
            <a class="nav-link btn btn-primary" href="tabla-pagos.php">Finalizar.</a>
        </div> 
    </div>

</body>
</html>
