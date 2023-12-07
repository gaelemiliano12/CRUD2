<?php
include("conexion.php");
    if ($conex){

    }else {

        echo "algo salio mal";
         }

            if (isset($_POST['Registrar'])){
                if (strlen($_POST['nombre']) >= 1 &&
                    strlen($_POST['monto']) >= 1 &&
                    strlen($_POST['tipo_pago']) >= 1){
                        $name = trim ($_POST['nombre']);
                        $monto = trim ($_POST['monto']);
                        $tipo = trim ($_POST['tipo_pago']);
                        $consulta = "INSERT INTO pagos(nombre, monto, tipo_pago) VALUES ('$name','$monto','$tipo')";
                        $resultado = mysqli_query($conex,$consulta);
                            if ($resultado){
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                   Se ha Registrado tu Pago Exitosamente, Felicidades!!!!
                          
                                   </div>
                          
                                <?php      
                                } else {
                                    ?>
                                    <h3 class="bad">UPS ha ocurrido un error!</h3>
                                    <?php
                                    }
            } else {
                    ?>
                    <h3 class="bad">Por favor, complete los campos!</h3>
                    <?php
                }
    }
?>