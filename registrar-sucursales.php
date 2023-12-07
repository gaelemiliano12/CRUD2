<?php
include("conexion.php");
    if ($conex){


    }else {

        echo "algo salio mal";
         }

            if (isset($_POST['register'])){
                if (strlen($_POST['nombre']) >= 1 &&
                    strlen($_POST['direccion']) >= 1 &&
                    strlen($_POST['telefono']) >= 1 &&
                    strlen($_POST['email']) >= 1 ){
                        $name = trim ($_POST['nombre']);
                        $direccion = trim ($_POST['direccion']);
                        $telefono = trim ($_POST['telefono']);
                        $email = trim ($_POST['email']);
                        $consulta = "INSERT INTO altas_sucursales(nombre, direccion, telefono, email) VALUES ('$name','$direccion','$telefono','$email')";
                        $resultado = mysqli_query($conex,$consulta);
                            if ($resultado){
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Se ha agregado nueva sucursal correctamente, Felicidades!!!!

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