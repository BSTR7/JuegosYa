<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juegosya";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $plataforma = $_POST["plataforma"];

    // Directorio de destino para la imagen
    $directorioDestino = "../imagenproducto/";

    // Nombre de archivo único para evitar conflictos
    $nombreArchivo = uniqid() . "_" . $_FILES["imagen"]["name"];

    // Ruta completa del archivo en el servidor
    $rutaArchivo = $directorioDestino . $nombreArchivo;

    $rutasql = "imagenproducto/" . $nombreArchivo;

    // Verificar si se pudo mover el archivo al directorio de destino
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaArchivo)) {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen, stock, plataforma) VALUES ('$nombre', '$descripcion', '$precio', '$rutasql', '$stock', '$plataforma')";

        if ($conn->query($sql) === TRUE) {
            echo "Producto creado exitosamente. La imagen se ha subido correctamente.";
        } else {
            echo "Error al crear el producto: " . $conn->error;
        }
    } else {
        // Mostrar un mensaje de error si no se pudo subir la imagen
        echo "Error al subir la imagen.";
    }
}

// Cerrar la conexión
$conn->close();
?>
