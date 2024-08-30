<?php
// Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redireccionar a otra página después de destruir la sesión
header("Location: ../index.php");
exit();
?>
