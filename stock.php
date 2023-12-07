<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>STOCK</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    
    <!-- owl carousel -->
    
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
	<link rel="stylesheet" href="assets/css/ollie.css">
    <link rel="shortcut icon"href="assets/imgs/brand.svg">
    <link rel="stylesheet" href="assets/css/stock.css">


</head>
<body>



<header class="header header-mini"> 
    <div class="header-title">STOCK DE PRODUCTOS</div> 
    <nav aria-label="breadcrumb">
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Registra un nuevo articulo</a></li>
       </ol>
    </nav>
 </header>

</head>
    <form method="post" action="guardar_stock.php">
        <div class="producto">
         <label for="producto">Producto:</label>
         <input type="text" name="producto" required><br>
        </div>
       
        <div class="cantidad">
         <label for="cantidad">Cantidad:</label>
         <input type="number" name="cantidad" required><br>
        </div>

        <div class="ubicaion">
         <label for="ubicacion">Ubicación:</label>
         <input type="text" name="ubicacion" required><br>
        </div>
        
        <div class="boton">
         <input type="submit" value="Guardar">
        </div>
        
    </form>
</body>
</html>


