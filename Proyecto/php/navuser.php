<?php
session_start(); // Iniciar la sesión

// Restablecer la sesión si la variable de sesión 'logged_in' no está definida
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false;
}

// Cerrar la sesión si se envió el formulario de "Cerrar sesión"
if (isset($_POST['logout'])) {
    session_destroy(); // Destruir la sesión
    header("Location: ../index.php"); // Redirigir al formulario de inicio de sesión
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesnav.css"> 
    <style>
<?php if ($_SESSION['logged_in']): ?>
#Login .lghas-submenu:hover .lgsubmenu {
    display: none;
}
<?php endif; ?>
</style>
</head>

<body>
<nav>
<div id="header">
        <div id="NavMenu">
            <ul>
                <li><a href="index.php"><img src="https://cdn-icons-png.flaticon.com/512/7133/7133312.png" alt="Inicio">Inicio</a></li>
                <li><a href="carrito.php"><img src="https://cdn-icons-png.flaticon.com/512/107/107831.png" alt="Carrito de compra">Carrito de compra</a></li>
                <li class="has-submenu">
                    <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/56/56763.png" alt="Categorías">Categorías</a>
                    <ul class="submenu">
                        <li><a href="categoria.php?categoria=pc"> <img src="https://cdn-icons-png.flaticon.com/512/771/771298.png" alt="">PC</a></li>
                        <li><a href="categoria.php?categoria=ps4"><img src="https://icons.veryicon.com/png/o/miscellaneous/ramen-iconset-linear-icon-set/playstation-6.png" alt="">PLAYSTATION</a></li>
                        <li><a href="categoria.php?categoria=xbox"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Xbox_one_logo.svg/1200px-Xbox_one_logo.svg.png" alt=""> XBOX</a></li>
                    </ul>
                </li>
            </ul>
            </div>
            <div id="Login">
    <ul>
        <li class="lghas-submenu">
            <?php
            if ($_SESSION['logged_in']) {
                echo '<a href="php/sdrop.php?logout"  >Cerrar Sesión</a>'; // Enlace para cerrar sesión si el usuario ha iniciado sesión
                echo '<ul class="lgsubmenu">'; // Sin la clase hide-submenu
            } else {
                echo '<a href="#"> <img class="imglog" src="https://svgsilh.com/png-512/153139.png" alt=""> Inicio Sesión</a>'; // Enlace para iniciar sesión si el usuario no ha iniciado sesión
                echo '<ul class="lgsubmenu hide-submenu">'; // Agrega la clase hide-submenu
            }
            ?>
                <li class="welcome"><img class="imglog" src="https://cdn-icons-png.flaticon.com/512/3898/3898678.png" alt=""> Bienvenido!</li>
                <li><a href="php/auth.php"><img class="imglog" src="https://cdn-icons-png.flaticon.com/512/58/58950.png" alt=""> Iniciar Sesión</a></li>
                <li><a href="php/auth.php"><img class="imglog" src="https://img.freepik.com/iconos-gratis/google_318-278809.jpg?w=2000" alt="">Iniciar con Google</a></li>
                <li class="register"> ¿No tienes una cuenta?</li>
                <li><a href="php/registro.php"><img class="imglog" src="https://img.freepik.com/iconos-gratis/curriculum-vitae_318-574466.jpg" alt=""> Registrarse</a></li>

            </li>

            </ul>
        </li>
    </ul>
</div>
</div>
</nav>
</body>
</html>
