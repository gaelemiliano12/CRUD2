<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Registrar Reservas</title>

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
    <div class="header-title">Registrar Reservas</div> 
    <nav aria-label="breadcrumb">
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Registra las Reservas.</a></li>
       </ol>
    </nav>
 </header>
 
 <?php
  include("registrar-reservas.php");
  ?>

<div class="container">
      <form method="post">

        <div class="container">
        <div class="row mt-5" id="contenedor">
                    <h6 class="section-secondary-title">REGISTRAR</h6>  

                    <table class="table">
                        <thead>
                           <tr>
                              <th scope="col"> <div class="py-5"></div><label for="nombre">Nombre de usuario:</label>
                                <input type="text" class="form-control" name="nombre_usuario" required>
                              <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div>
                              <label for="equipo">Equipo:</label>
                                <select name="equipo" required>
                                  <option value="equipo1">Laptop Asus Zenbook 14 OLED</option>
                                  <option value="equipo2">PC para Gaming</option>
                                  <option value="equipo3">PC para Gaming Dedicada</option>
                                </select>
                              <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div>
                                <label for="fecha_inicio">Fecha de inicio:</label>
                                <input type="date" class="form-control" name="fecha_inicio" required>
                              <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div>
                                <label for="hora_inicio">Hora de inicio:</label>
                                <input type="time" class="form-control" name="hora_inicio" required>
                              <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div>
                                <label for="fecha_fin">Fecha de finalización:</label>
                                <input type="date" class="form-control" name="fecha_finalizacion" required>
                              <div class="py-5"></div></th>

                              <th scope="col"> <div class="py-5"></div>
                                <label for="hora_fin">Hora de finalización:</label>
                                <input type="time" class="form-control" name="hora_finalizacion" required>
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

  </form>
<div class="pie-form">
<a class="nav-link btn btn-primary" href="tabla-reservas.php">Eliminar o Editar</a>

</div> 

<div class="pie-form">
  <a class="nav-link btn btn-primary" href="Productos.html">Volver</a>
 </div>
</body>
</html>

