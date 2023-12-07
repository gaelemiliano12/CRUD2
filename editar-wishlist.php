<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Wishlist</title>

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
    <div class="header-title">Editar tus articulos</div> 
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
$idw = $item_actual = $prioridad_actual = "";

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idw = $_POST["idw"];
    $item = $_POST["item"];
    $prioridad = $_POST["prioridad"];


    // Actualizar los datos en la tabla
    $sql = "UPDATE wishlist SET item='$item', prioridad='$prioridad'  WHERE idw='$idw'";

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
    if (isset($_GET["idw"])) {
        $idw = $_GET["idw"];

        // Obtener los datos actuales del usuario
        $sql = "SELECT * FROM wishlist WHERE idw='$idw'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $item_actual = $row["item"];
            $prioridad_actual = $row["prioridad"];

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
      <div class="row mt-5" $idw="contenedor">
        <h6 class="section-secondary-title">EDITAR USUARIO</h6>   

        <input type="hidden" name="idw" value="<?php echo $idw; ?>">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">
                <div class="py-5"></div>
                <input type="text" placeholder="item" name="item" value="<?php echo $item_actual; ?>" required>
                <div class="py-5"></div>
              </th>
              
              <th scope="col">
                <div class="py-5"></div>
                <input type="text" placeholder="prioridad" name="prioridad" value="<?php echo $prioridad_actual; ?>" required>
                <div class="py-5"></div>
              </th>

              <th scope="col">
                <div class="py-5"></div>
                <div class="form-group"></div>
                <input class="btn btn-primary" type="submit" value="Guardar cambios" href="tabla-wishlist.php">
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
        <a class="nav-link btn btn-primary" href="tabla-wishlist.php">Finalizar.</a>
    </div> 
</div>

</body>
</html>
