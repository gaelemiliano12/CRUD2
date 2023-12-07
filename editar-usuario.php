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
$id = $nombre_actual = $correo_actual = $contrasena_actual = "";

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Actualizar los datos en la tabla
    $sql = "UPDATE registro SET nombre='$nombre', correo='$correo', contrasena='$contrasena' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
      ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
         Se ha actualizado el registro exitosamente. ¡Felicidades!
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
        $sql = "SELECT * FROM registro WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $nombre_actual = $row["nombre"];
            $correo_actual = $row["correo"];
            $contrasena_actual = $row["contrasena"];
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
  <form id="edit-user-form" method="post">

    <div class="container">
      <div class="row mt-5" id="contenedor">
        <h6 class="section-secondary-title">EDITAR USUARIO</h6>   

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">
                <div class="py-5"></div>
                <input type="text" placeholder="Nombre" name="nombre" value="<?php echo $nombre_actual; ?>" required>
                <div class="py-5"></div>
              </th>

              <th scope="col">
                <div class="py-5"></div>
                <input type="email" placeholder="Correo" name="correo" value="<?php echo $correo_actual; ?>" required>
                <div class="py-5"></div>
              </th>

              <th scope="col">
                <div class="py-5"></div>
                <input type="password" placeholder="Contraseña" name="contrasena" value="<?php echo $contrasena_actual; ?>" required>
                <div class="py-5"></div>
              </th>

              <th scope="col">
                <div class="py-5"></div>
                <div class="form-group"></div>
                <input class="btn btn-primary" type="submit" value="Guardar cambios" href="tabla-usuarios.php">
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
        <a class="nav-link btn btn-primary" href="tabla-usuarios.php">Finalizar.</a>
    </div> 
</div>

</body>
</html>
