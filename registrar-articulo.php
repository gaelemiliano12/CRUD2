<!DOCTYPE html>
<html>
<head>
    <title>Stock - Lista de productos</title>
</head>
<body>
    <h1>Stock - Lista de productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Ubicación</th>
        </tr>
        <?php
        // Conexión a la base de datos
        $conexion = mysqli_connect("localhost", "nombre_usuario", "contraseña", "nombre_base_de_datos");

        // Verificar la conexión
        if (mysqli_connect_errno()) {
            echo "Fallo al conectar con la base de datos: " . mysqli_connect_error();
        }

        // Consulta SQL para obtener los datos del stock
        $consulta = "SELECT * FROM stock";
        $resultado = mysqli_query($conexion, $consulta);

        // Mostrar los datos en la tabla
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['producto'] . "</td>";
            echo "<td>" . $fila['cantidad'] . "</td>";
            echo "<td>" . $fila['ubicacion'] . "</td>";
            echo "</tr>";
        }

        // Cerrar la conexión
        mysqli_close($conexion);
        ?>
    </table>
</body>
</html>
