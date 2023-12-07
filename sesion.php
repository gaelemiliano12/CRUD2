<!doctype html>
<html lang="es">    
    <head>       
        <meta charset="utf-8">        
        <title> Iniciar Sesión </title>            
        <head>
            <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
             <meta name="description" content="Start your development with Ollie landing page.">
             <meta name="author" content="Devcrud">

            <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

            <link rel="stylesheet" href="assets/css/ollie.css">
            <link rel="shortcut icon"href="assets/imgs/brand.svg">
    
    <body>


   <header class="header header-mini"> 
    <div class="header-title">Iniciar Sesión</div> 
    <nav aria-label="breadcrumb">
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Incia Sesion para que puedas comprar</a></li>
       </ol>
    </nav>
 </header> 

        <?php
            include("conexion.php");
            include("validar.php");
        ?>

 <form id="inicio-sesion" method="post">
    <div class="container">
        <div class="row mt-5" id="contenedor">
                    <h6 class="section-secondary-title">Bienvenido</h6>   


                    <table class="table">
                        <thead>
                           <tr>
                              <th scope="col"> <div class="py-5"></div><input type="text" class="form-control" name="correo" placeholder="Correo" required>  <div class="py-5"></div></th>
                              <th scope="col"> <div class="py-5"></div><input type="password" class="form-control" placeholder="Contraseña" name="contrasena" required>  <div class="py-5"></div></th>
                              <th scope="col"> <div class="py-5"></div><div class="form-group"></div>
                              <input class="btn btn-primary" type="submit" name="iniciar">
                            </div>  <div class="py-5"></div></th>
                           </tr>
                        </thead>
                     </table>




    </div>
                </div>
                <div class="inferior">

                    <div class="pie-form">
                        <a class="nav-link btn btn-primary" href="login.php">¿No tienes Cuenta? Registrate</a>
                    </div>
                    <div class="pie-form">
                        <a class="nav-link btn btn-primary" href="index.php">Volver</a>
                    </div>
            </div>
        </div> 
</div> 

</form>


        
    </body>
</html>