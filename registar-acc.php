<?php
include("conexion.php");
    if($conex){

        echo "conexion de base de datos correcta";
    } else{
        echo "hubo un fallo en la conexion de base de datos";
    }

if (isset($_POST['enviar'])){
    if (strlen($_POST['categoria'])>= 1 &&
        strlen($_POST['tipo'])>= 1 &&
        strlen($_POST['precio'])>= 1 &&
            strlen($_POST['descripcion'])>= 1);{
        
            $cat = trim($_POST['categoria']);
            $tipo = trim($_POST['tipo']);
            $precio = trim($_POST['precio']);
            $descripcion = trim($_POST['descripcion']);
        
            $consulta= "INSERT INTO `accesorios`(`Cat_P`, `tipo`, `Precio`, `descripcion`) VALUES ('$cat','$tipo','$precio','$descripcion')";
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
