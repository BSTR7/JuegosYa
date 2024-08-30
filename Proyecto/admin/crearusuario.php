<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="../css/styleadduss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Manejar el evento click del botón "Guardar"
            $(".guardar-btn").on("click", function() {
                // Obtener los valores necesarios
                var id = $(this).data("id");
                var tipoCuenta = $(this).closest("tr").find(".tipo-cuenta-select").val();

                // Realizar la solicitud AJAX para actualizar la cuenta
                $.ajax({
                    url: "guardar_cuenta.php",
                    type: "POST",
                    data: { id: id, tipoCuenta: tipoCuenta },
                    dataType: "json",
                    success: function(response) {
                        // Mostrar mensaje de éxito o error
                        if (response.success) {
                            alert(response.message);
                        } else {
                            alert("Error: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error en la solicitud AJAX: " + error);
                    }
                });
            });
        });
    </script>
</head>
<body>
<div class="container">
    <form action="agregarcuenta.php" method="POST">
        <h1>Crear Cuenta</h1>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required>
        <br><br>

        <label for="tipocuenta">Tipo de cuenta:</label>
        <select name="tipocuenta" id="tipocuenta" required>
            <option value="1">Jefe</option>
            <option value="2">Admin</option>
            <option value="3">Trabajador</option>
            <option value="4">Cliente</option>
        </select>
        <br><br>

        <input type="submit" value="Crear Cuenta">
    </form>

    <table>
        <caption>Cuentas</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo de cuenta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Aquí se debe obtener los datos de las cuentas desde la base de datos y mostrarlos dinámicamente
            // Reemplaza los valores de ejemplo con tus propias consultas y datos de la base de datos
            $conexion = mysqli_connect("localhost", "root", "", "juegosya");

            // Verificar conexión
            if (mysqli_connect_errno()) {
                echo "Error al conectar con la base de datos: " . mysqli_connect_error();
                exit();
            }

            // Obtener las cuentas de la base de datos
            $query = "SELECT * FROM users";
            $result = mysqli_query($conexion, $query);

            // Mostrar las cuentas en la tabla
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['Usuario'] . "</td>";
                echo "<td>" . $row['Nombre'] . "</td>";
                echo "<td>" . $row['Correo'] . "</td>";
                echo "<td>";
                echo "<select class='tipo-cuenta-select'>";
                echo "<option value='1'" . ($row['tipodecuenta'] == 1 ? " selected" : "") . ">Jefe</option>";
                echo "<option value='2'" . ($row['tipodecuenta'] == 2 ? " selected" : "") . ">Admin</option>";
                echo "<option value='3'" . ($row['tipodecuenta'] == 3 ? " selected" : "") . ">Trabajador</option>";
                echo "<option value='4'" . ($row['tipodecuenta'] == 4 ? " selected" : "") . ">Cliente</option>";
                echo "</select>";
                echo "</td>";
                echo "<td><button class='guardar-btn' data-id='" . $row['id'] . "'>Guardar</button></td>";
                echo "</tr>";
            }

            // Liberar resultado y cerrar la conexión
            mysqli_free_result($result);
            mysqli_close($conexion);
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>