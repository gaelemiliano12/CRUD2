<?php
include("conexion.php");
if ($conex) {
    echo "";
} else {
    echo "Fallo en la conexión de base de datos";
}

if (isset($_POST['send'])) {
    if (strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['mensaje']) >= 1) {
        $name = trim($_POST['nombre']);
        $correo = trim($_POST['email']);
        $mensaje = trim($_POST['mensaje']);
        $consulta = "INSERT INTO valoraciones(nombre, email, mensaje) VALUES ('$name','$correo','$mensaje')";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado) {
            ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         Muchas Gracias por tu reseña!!!!

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
