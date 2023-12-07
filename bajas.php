<!DOCTYPE html>
<html>
<head>
    <title>Interfaz de Bajas</title>
</head>
<body>
    <h2>Interfaz de Bajas</h2>
    <form method="post">

    <?php
  include("registrar-bajas.php");
  ?>

        <label for="id">ID:</label>
        <input type="text" name="id" required>
        <br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <label for="motivo_baja">Motivo de Baja:</label>
        <textarea name="motivo_baja" rows="4" required></textarea>
        <br><br>
        <input type="submit"  name="eliminar" value="Eliminar">
    </form>
</body>
</html>