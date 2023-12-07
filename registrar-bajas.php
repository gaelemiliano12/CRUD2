<?php
include("conexion.php");
    if($conex){

        echo "conexion de base de datos correcta";
    } else{
        echo "hubo un fallo en la conexion de base de datos";
    }

if (isset($_POST['eliminar'])){
    if (strlen($_POST['id'])>= 1 &&
        strlen($_POST['nombre'])>= 1 &&
        strlen($_POST['email'])>= 1 &&
            strlen($_POST['motivo_baja'])>= 1);{
        
            $id = trim($_POST['id']);
            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);
            $Motivo_baja = trim($_POST['motivo_baja']);
        
            $consulta= "INSERT INTO `bajas`(`id`, `nombre`, `email`, `Motivo_baja`) VALUES ('$id','$nombre','$email','$Motivo_baja')";
            $resultado = mysqli_query($conex,$consulta);
            
            if ($resultado){
                ?>
                <h3 class="ok">Te has inscrito conrrectamente!!</h3>
                <?php
            } else{
                ?>
                <h3 class="bad">UPS ha ocurrido un error!!</h3>
                <?php
            }   
    }
}
?>
<