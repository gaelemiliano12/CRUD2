<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Registra Usiarios</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    
    <!-- owl carousel -->
    
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
	<link rel="stylesheet" href="assets/css/ollie.css">
   <link rel="shortcut icon"href="assets/imgs/brand.svg">
</head>
<body>



<header class="header header-mini"> 
    <div class="header-title">Registrate</div> 
    <nav aria-label="breadcrumb">
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Registrate en nuestra página.</a></li>
       </ol>
    </nav>
 </header> 

 <?php
  include("registrar-user.php");
  ?>

  <div class="container">
      <form id="registration-form" method="post">

        <div class="container">
        <div class="row mt-5" id="contenedor">
                    <h6 class="section-secondary-title">REGISTRAR</h6>   


                    <table class="table">
                        <thead>
                           <tr>
                              <th scope="col"> <div class="py-5"></div><input type="text" class="form-control" placeholder="Nombre" name="name" required><div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div><input type="email" class="form-control" placeholder="Correo" name="correo" required><div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div><input type="password" class="form-control" placeholder="Contraseña" name="contrasena" required>  <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div><div class="form-group"></div>
                              <input class="btn btn-primary" type="submit" name="register">
                            </div>  <div class="py-5"></div></th>
                           </tr>
                        </thead>
                     </table>




    </div>

    </div>     
      
</form>
<div class="py-5">
</body>
<div class="pie-form">
<a class="nav-link btn btn-primary" href="tabla-usuarios.php">Eliminar o Editar</a>

</div> 

<div class="pie-form">
  <a class="nav-link btn btn-primary" href="sesion.php">Volver</a>
 </div>
</html>
