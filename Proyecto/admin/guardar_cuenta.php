<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por la formulario
    $id = $_POST['id'];
    $tipoCuenta = $_POST['tipoCuenta'];

    // Realizar las operaciones necesarias para actualizar el tipo de cuenta en la base de datos
    // Reemplaza los valores de ejemplo con tus propias consultas y datos de la base de datos

    $conexion = mysqli_connect("localhost", "root", "", "juegosya");

    // Verificar conexión
    if (mysqli_connect_errno()) {
        $response = array(
            'success' => false,
            'message' => 'Error al conectar con la base de datos: ' . mysqli_connect_error()
        );
    } else {
        // Actualizar el tipo de cuenta en la base de datos
        $query = "UPDATE users SET tipodecuenta = '$tipoCuenta' WHERE id = '$id'";
        if (mysqli_query($conexion, $query)) {
            $response = array(
                'success' => true,
                'message' => 'Tipo de cuenta actualizado con éxito'
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Error al actualizar el tipo de cuenta: ' . mysqli_error($conexion)
            );
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    }

    // Enviar la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array(
        'success' => false,
        'message' => 'Error: Método de solicitud incorrecto.'
    );

    // Enviar la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>