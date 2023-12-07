<?php

include("conexion.php");
    if($conex){

        echo "conexion de base de datos correcta";
    } else{
        echo "hubo un fallo en la conexion de base de datos";
    }
if (isset($_POST['register'])){

    
    if (strlen($_POST['name'])>= 1 &&
        strlen($_POST['tipo'])>= 1 );{
        
            $name = trim($_POST['name']);
            $tipo = trim($_POST['tipo']);

        
            $consulta = "INSERT INTO examen(nombre,tipo) VALUES ('$name','$tipo')";
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