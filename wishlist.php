<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Wishlist</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    
    <!-- owl carousel -->
    
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
	<link rel="stylesheet" href="assets/css/ollie.css">
  <link rel="stylesheet" href="assets/css/wishlist.css">
  <link rel="shortcut icon"href="assets/imgs/brand.svg">
</head>
<body>



<header class="header header-mini"> 
    <div class="header-title">Wishlist</div> 
    <nav aria-label="breadcrumb">
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">echa un vistasos a tus articulos favoritos</a></li>
       </ol>
    </nav>
 </header>
<body>
 
  
  <form action="#" method="post">
    
              <div class="item">
              <label for="item">Item:</label>
                <input type="text" id="item" name="item" placeholder="Ingrese un articulo">
              </div>
    

                <div class="priority">
                <label for="priority">Prioridad:</label>
                    <select id="priority" name="priority">
                      <option value="alta">Alta</option>
                      <option value="media">Media</option>
                      <option value="baja">Baja</option>
                    </select>
                </div>
 
      <div class="boton">
      <input type="submit" value="Agregar" name="agregar" >
      </div>
    
  </form>
  <?php
  include("registrar-wishlist.php");
  ?>
</body>
</html>