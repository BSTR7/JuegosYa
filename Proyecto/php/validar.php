<?php
session_start(); // Iniciar la sesión

// Establecer la conexión con la base de datos
function conectarBaseDeDatos() {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juegosya";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

return $conn;
}

function registrarUsuario() {
$conn = conectarBaseDeDatos();

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$sql = "INSERT INTO users (id, Usuario, passwrd, Nombre, Correo, tipodecuenta)
        VALUES (NULL, '$usuario', '$password', '$nombre', '$correo', '4')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error al registrar el usuario: " . $conn->error;
}

$conn->close();
}

function autenticarUsuario() {
$conn = conectarBaseDeDatos();

$nombre_usuario = $_POST['nombre_usuario'];
$clave_acceso = $_POST['clave_acceso'];

$sql = "SELECT * FROM users WHERE Usuario = '$nombre_usuario' AND passwrd = '$clave_acceso'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['logged_in'] = true;
    header("Location: ../index.php");
} else {
    $_SESSION['logged_in'] = false;
    header("Location: php/auth.php");
}

$conn->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['nombre']) && isset($_POST['correo'])) {
    registrarUsuario();
} elseif (isset($_POST['nombre_usuario']) && isset($_POST['clave_acceso'])) {
    autenticarUsuario();
}
}
?>
