<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Tabla de Usuarios</title>

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
        <div class="header-title">Editar Usuario</div> 
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
    $id = $nombre = $equipo = $fecha_in = $hora_in = $fecha_fin = $hora_fin = "";

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre_usuario"];
        $equipo = $_POST["equipo"];
        $fecha_in = $_POST["fecha_inicio"];
        $hora_in = $_POST["hora_inicio"];
        $fecha_fin = $_POST["fecha_finalizacion"];
        $hora_fin = $_POST["hora_finalizacion"];

        // Actualizar los datos en la tabla
        $sql = "UPDATE reservas SET nombre_usuario='$nombre', equipo='$equipo', fecha_inicio='$fecha_in', hora_inicio='$hora_in', fecha_finalizacion='$fecha_fin', hora_finalizacion='$hora_fin' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Se ha actualizado el registro exitosamente, Felicidades!!!!
            </div>
            <?php
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    } else {
        // Si no se ha enviado el formulario, obtén el ID del usuario a editar y muestra el formulario de edición
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            // Obtener los datos actuales del usuario
            $sql = "SELECT * FROM reservas WHERE id='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $nombre_actual = $row["nombre_usuario"];
                $equipo_actual = $row["equipo"];
                $fecha_in_actual = $row["fecha_inicio"];
                $hora_in_actual = $row["hora_inicio"];
                $fecha_fin_actual = $row["fecha_finalizacion"];
                $hora_fin_actual = $row["hora_finalizacion"];
            } else {
                echo "No se encontró el usuario con el ID proporcionado.";
                $conn->close();
                exit();
            }
        } else {
            echo "ID de usuario no proporcionado.";
            exit();
        }
    }

    $conn->close();
    ?>

    <div class="container">
        <form method="post">
            <div class="container">
                <div class="row mt-5" id="contenedor">
                    <h6 class="section-secondary-title">REGISTRAR</h6>  

                    <!-- Campo de entrada oculto para el ID -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="py-5"></div>
                                    <label for="nombre">Nombre de usuario:</label>
                                    <input type="text" class="form-control" name="nombre_usuario" required value="<?php echo $nombre_actual; ?>">
                                    <div class="py-5"></div>
                                </th>

                                <th scope="col">
                                    <div class="py-5"></div>
                                    <label for="equipo">Equipo:</label>
                                    <select name="equipo" required>
                                        <option value="equipo1" <?php if ($equipo_actual == 'equipo1') echo 'selected'; ?>>Equipo 1</option>
                                        <option value="equipo2" <?php if ($equipo_actual == 'equipo2') echo 'selected'; ?>>Equipo 2</option>
                                        <option value="equipo3" <?php if ($equipo_actual == 'equipo3') echo 'selected'; ?>>Equipo 3</option>
                                    </select>
                                    <div class="py-5"></div>
                                </th>

                                <th scope="col">
                                    <div class="py-5"></div>
                                    <label for="fecha_inicio">Fecha de inicio:</label>
                                    <input type="date" class="form-control" name="fecha_inicio" required value="<?php echo $fecha_in_actual; ?>">
                                    <div class="py-5"></div>
                                </th>

                                <th scope="col">
                                    <div class="py-5"></div>
                                    <label for="hora_inicio">Hora de inicio:</label>
                                    <input type="time" class="form-control" name="hora_inicio" required value="<?php echo $hora_in_actual; ?>">
                                    <div class="py-5"></div>
                                </th>

                                <th scope="col">
                                    <div class="py-5"></div>
                                    <label for="fecha_finalizacion">Fecha de finalización:</label>
                                    <input type="date" class="form-control" name="fecha_finalizacion" required value="<?php echo $fecha_fin_actual; ?>">
                                    <div class="py-5"></div>
                                </th>

                                <th scope="col">
                                    <div class="py-5"></div>
                                    <label for="hora_finalizacion">Hora de finalización:</label>
                                    <input type="time" class="form-control" name="hora_finalizacion" required value="<?php echo $hora_fin_actual; ?>">
                                    <div class="py-5"></div>
                                </th>

                                <th scope="col">
                                    <div class="py-5"></div>
                                    <div class="form-group"></div>
                                    <input class="btn btn-primary" type="submit" name="register" value="Guardar cambios">
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
            <a class="nav-link btn btn-primary" href="tabla-reservas.php">Finalizar.</a>
        </div> 
    </div>

</body>
</html>
