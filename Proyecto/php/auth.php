<?php


?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de autenticación</title>
    <link rel="stylesheet" href="../css/styleslogin.css">
</head>
<body>
    <form action="validar.php" method="POST">
        <label for="nombre_usuario">Nombre de usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required>
        <br>
        <label for="clave_acceso">Contraseña:</label>
        <input type="password" id="clave_acceso" name="clave_acceso" required>
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
