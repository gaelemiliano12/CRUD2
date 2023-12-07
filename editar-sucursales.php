<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Editar Sucursales</title>

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
        <div class="header-title">Editar Sucursales</div> 
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Edite los campos que desea.</a></li>
            </ol>
        </nav>
    </header> 

    <?php
    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Obtener los valores enviados del formulario
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $direc = $_POST["direccion"];
        $tel = $_POST["telefono"];
        $correo = $_POST["email"];

        // Actualizar los datos en la tabla
        $sql = "UPDATE altas_sucursales SET nombre='$nombre',direccion='$direc',telefono='$tel',email='$correo' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Se ha actualizado el registro exitosamente, ¡Felicidades!
            </div>
            <?php
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }

        $conn->close();
    } else {
        // Si no se ha enviado el formulario, obtén el ID del usuario a editar y muestra el formulario de edición
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

            // Obtener los datos actuales del usuario
            $sql = "SELECT * FROM altas_sucursales WHERE id='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $nombre_actual = $row["nombre"];
                $direccion_actual = $row["direccion"];
                $telefono_actual = $row["telefono"];
                $correo_actual = $row["email"];
            } else {
                echo "No se encontró el usuario con el ID proporcionado.";
                $conn->close();
                exit();
            }

            $conn->close();
        } else {
            echo "ID de usuario no proporcionado.";
            exit();
        }
    }
    ?>

    <div class="container">
        <form method="post">

            <!-- Agregar campo oculto para el "id" -->
            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">

            <div class="row mt-5" id="contenedor">
                <h6 class="section-secondary-title">EDITAR SUCURSAL</h6>  

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="py-5"></div>
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" required value="<?php echo $nombre_actual; ?>">
                                <div class="py-5"></div>
                            </th>

                            <th scope="col">
                                <div class="py-5"></div>
                                <label for="direccion">Dirección:</label>
                                <input type="text" class="form-control" name="direccion" required value="<?php echo $direccion_actual; ?>">
                                <div class="py-5"></div>
                            </th>

                            <th scope="col">
                                <div class="py-5"></div>
                                <label for="telefono">Teléfono:</label>
                                <input type="tel" class="form-control" name="telefono" pattern="[0-9]{10}" required value="<?php echo $telefono_actual; ?>">
                                <div class="py-5"></div>
                            </th>

                            <th scope="col">
                                <div class="py-5"></div>
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" required value="<?php echo $correo_actual; ?>">
                                <div class="py-5"></div>
                            </th>

                            <th scope="col">
                                <div class="py-5"></div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="register" value="Guardar cambios">
                                </div>
                                <div class="py-5"></div>
                            </th>
                        </tr>
                    </thead>
                </table>   
            </div>
        </form>
    </div>

    <div class="py-5">
        <div class="pie-form">
            <a class="nav-link btn btn-primary" href="tabla-sucursales.php">Finalizar.</a>
        </div> 
    </div>
</body>
</html>
