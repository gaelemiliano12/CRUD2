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
    $id = $nombre = $email = $mensaje = "";

    // Verificar si se ha enviado el formulario de edición
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $mensaje = $_POST["mensaje"];

        // Actualizar los datos en la tabla
        $sql = "UPDATE `valoraciones` SET `nombre`='$nombre', `email`='$email', `mensaje`='$mensaje' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Se ha actualizado la reseña exitosamente, Felicidades!!!!
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
            $sql = "SELECT * FROM valoraciones WHERE id='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $nombre = $row["nombre"];
                $email = $row["email"];
                $mensaje = $row["mensaje"];
            } else {
                echo "No se encontró la valoración con el ID proporcionado.";
                $conn->close();
                exit();
            }
        } else {
            echo "ID de valoración no proporcionado.";
            exit();
        }
    }

    $conn->close();
    ?>

    <div class="container">
        <h6 class="xs-font mb-0"></h6>
        <h3 class="section-title mb-5">Comentarios y Valoraciones.</h3>

        <div class="row align-items-center justify-content-between">
            <div class="col-md-8 col-lg-7">
                <form class="contact-form" method="post">
                    <!-- Campo de entrada oculto para el ID -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="form-row">
                        <div class="col form-group">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="col form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control" name="mensaje" placeholder="Tu Mensaje"><?php echo $mensaje; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="send" value="Send Message">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="pie-form">
            <a class="nav-link btn btn-primary" href="tabla-resenas.php">Finalizar.</a>
        </div> 
    </div>

</body>
</html>
