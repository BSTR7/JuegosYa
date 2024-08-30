<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesreg.css">
    <title>Document</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form method="POST" action="registro.php">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" required><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>