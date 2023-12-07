<!DOCTYPE html>
<html>
<head>
  <title>Formulario de Producto</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Formulario de Producto</h1>
    <form method="POST">

   


      <label for="categoria">Categoría del Producto:</label>
      <select name="categoria">
        <option value="desktop">Desktop</option>
        <option value="laptop">Laptop</option>
      </select>

      <label for="tipo">Tipo de Producto:</label>
      <select name="tipo">
        <option value="mouse">Mouse</option>
        <option value="keyboard">Keyboard</option>
        <option value="monitor">Monitor</option>
        <option value="speakers">Speakers</option>
        <option value="usb">USB</option>
      </select>

      <label for="precio">Precio:</label>
      <input type="text" name="precio" placeholder="Ingrese el precio del producto">

      <label for="descripcion">Descripción:</label>
      <textarea name="descripcion" placeholder="Ingrese una descripción del producto"></textarea>

      <input type="submit" name= "enviar" value="Enviar">
    </form>



  </div>
  <?php
  include("registar-acc.php");
  ?>
</body>
</html>
