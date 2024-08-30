<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Productos</title>
    <link rel="stylesheet" href="../css/stylesaddprod.css">
</head>
<body>
    <form action="guardarproducto.php" method="POST" enctype="multipart/form-data">
        <h1>Añadir Productos</h1>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
        <br><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required>
        <br><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required>
        <br><br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" required>
        <br><br>

        <label for="plataforma">Plataforma:</label>
        <select name="plataforma" id="plataforma" required>
            <option value="1">PC</option>
            <option value="2">PlayStation</option>
            <option value="3">Xbox</option>
        </select>
        <br><br>

        <input type="submit" value="Crear Producto">
    </form>
</body>
</html>
