<?php
include("conexion.php");
    if ($conex){

    }else {

        echo "algo salio mal";
         }
         if (isset($_POST['register'])) {
            if (strlen($_POST['nombre_usuario']) >= 1 &&
                strlen($_POST['equipo']) >= 1 &&
                strlen($_POST['fecha_inicio']) >= 1 &&
                strlen($_POST['hora_inicio']) >= 1 &&
                strlen($_POST['fecha_finalizacion']) >= 1 &&
                strlen($_POST['hora_finalizacion']) >= 1) {
            $usuario = $_POST['nombre_usuario'];
            $equipo = $_POST['equipo'];            
            $fechaInicio = $_POST['fecha_inicio'];
            $hora_inicio = $_POST['hora_inicio'];
            $fechaFin = $_POST['fecha_finalizacion'];
            $hora_fin= $_POST['hora_finalizacion'];

                    $consulta = "INSERT INTO reservas(nombre_usuario, equipo, fecha_inicio, hora_inicio, fecha_finalizacion, hora_finalizacion) VALUES ('$usuario','$equipo','$fechaInicio','$hora_inicio','$fechaFin','$hora_fin')";
                    $resultado = mysqli_query($conex, $consulta);
                    if ($resultado) {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           Se ha registrado la Reserva, Felicidades!!!!
                  
                           </div>
                  
                        <?php
                    } else {
                        echo '<h3 class="bad">UPS ha ocurrido un error!</h3>';
                    }
                } else {
                    echo '<h3 class="bad">Por favor, complete los campos!</h3>';
                }

                    $conex->close();
            }
?>


