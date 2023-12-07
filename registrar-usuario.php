<?php

include("conexion.php");
    if($conex){

        echo "conexion de base de datos correcta";
    } else{
        echo "hubo un fallo en la conexion de base de datos";
    }
if (isset($_POST['register'])){

    
    if (strlen($_POST['name'])>= 1 &&
        strlen($_POST['correo'])>= 1 &&
        strlen($_POST['contrasena'])>= 1);{
        
            $name = trim($_POST['name']);
            $email = trim($_POST['correo']);
            $password = trim($_POST['contrasena']);
        
            $consulta = "INSERT INTO registro(nombre,correo,contrasena) VALUES ('$name','$email','$password')";
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