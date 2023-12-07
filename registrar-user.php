<?php
include("conexion.php");
if ($conex) {
    echo "";
} else {
    echo "Fallo en la conexión de base de datos";
}

if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['contrasena']) >= 1) {
        $name = trim($_POST['name']);
        $correo = trim($_POST['correo']);
        $contrasena = trim($_POST['contrasena']);
        $consulta = "INSERT INTO registro (nombre, correo, contrasena) VALUES ('$name', '$correo', '$contrasena')";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         Te haz Registrado Exitosamente, Felicidades!!!!

         </div>

      <?php
        } else {
            ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         A simple danger alert—check it out!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>

      <?php
        }
    } else {
        echo '<h3 class="bad">Por favor, complete los campos!</h3>';
    }
}
?>
