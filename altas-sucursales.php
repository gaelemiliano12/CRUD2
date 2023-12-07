<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Registrar Sucursales</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    
    <!-- owl carousel -->
    
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
	<link rel="stylesheet" href="assets/css/ollie.css">
</head>
<body>



<header class="header header-mini"> 
    <div class="header-title">Registrar Sucursales</div> 
    <nav aria-label="breadcrumb">
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Registra las Sucursales.</a></li>
       </ol>
    </nav>
 </header>

 <?php
  include("registrar-sucursales.php");
  ?>

<body>

<div class="container">
      <form method="post">

        <div class="container">
        <div class="row mt-5" id="contenedor">
                    <h6 class="section-secondary-title">REGISTRAR</h6>  

                    <table class="table">
                        <thead>
                           <tr>

                              <th scope="col"> <div class="py-5"></div>
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" required>
                              <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div>
                                <label for="direccion">Dirección:</label>
                                <input type="text" class="form-control" name="direccion" required>
                              <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div>
                                <label for="telefono">Teléfono:</label>
                                <input type="tel" class="form-control" name="telefono" pattern="[0-9]{10}" required>
                              <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div>
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" required>
                              <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div><div class="form-group"></div>
                              <input class="btn btn-primary" type="submit" name="register">
                            </div>  <div class="py-5"></div></th>
                           </tr>
                        </thead>
                     </table>   
                     
          </div>

         </div>

         <div class="py-5">
        <div class="pie-form">
          <a class="nav-link btn btn-primary" href="tabla-sucursales.php">Eliminar o Editar</a>
        </div> 

        <div class="pie-form">
          <a class="nav-link btn btn-primary" href="indexxss.php">Volver</a>
        </div>

</body>
</html>


