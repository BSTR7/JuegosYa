<?php

class Juego {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "juegosya";

    public function mostrarJuegosMasBaratos() {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        $sql = "SELECT nombre, precio, imagen, plataforma, descripcion FROM productos ORDER BY precio ASC LIMIT 5";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo "<div class='juegos--container'>";
            echo "<h2 class='title'>Juegos más baratos:</h2>";
            echo "<div class='juegos-container'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='juego'>";
                echo "<img src='" . $row["imagen"] . "' alt='" . $row["nombre"] . "'>";
                echo "<h3>" . $row["nombre"] . "</h3>";
                echo "<p>Plataforma: " . $this->getPlataforma($row["plataforma"]) . "</p>";
                echo "<p>Precio: $" . $row["precio"] . "</p>";
                echo "<p>" . $row["descripcion"] . "</p>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
        } else {
            echo "No se encontraron juegos.";
        }

        $conn->close();
    }

    private function getPlataforma($plataforma) {
        switch ($plataforma) {
            case 1:
                return "PC";
            case 2:
                return "PlayStation";
            case 3:
                return "Xbox";
            default:
                return "Desconocida";
        }
    }
}

$juego = new Juego();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tienda de Juegos</title>
<link rel="stylesheet" href="css/stylesnav.css">
<link rel="stylesheet" href="css/style.css">
<style>
.juegos--container {
  border-top: 1px solid;
  border-bottom: 1px solid; /* Agregar un borde inferior */
    border-image: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1), rgba(255, 255, 255, 0)) 1;
  margin-top: -70px;
  background-color: #01024F;

  }
.juegos-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  margin-top: 40px;
}

.juego {
  width: 200px;
  margin: 10px;
  padding: 10px;
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 5px;
  text-align: center;
  font-family: sans-serif;
}

.juego img {
  width: 100%;
  height: 250px;
  object-fit: cover;
  border-radius: 5px;
  
}

.juego h3 {
  margin-top: 10px;
}

.juego p {
  margin-top: 5px;
  font-size: 16px;
  color: black;
  text-align: justify;
}
</style>
</head>
<body>
<header>
    <?php include 'php/navuser.php'; ?>
</header>

<main>
    <section>
        <h1 class="title">Mejores Títulos 2023</h1>
        <div class="container__slider">
            <div class="container">
                <input type="radio" name="slider" id="item-1" checked>
                <input type="radio" name="slider" id="item-2">
                <input type="radio" name="slider" id="item-3">

                <div class="cards">
                    <label class="card" for="item-1" id="selector-1">
                        <img src="imagenes/StreetSlider.jfif">
                    </label>
                    <label class="card" for="item-2" id="selector-2">
                        <img src="imagenes/DiabloSlider.png">
                    </label>
                    <label class="card" for="item-3" id="selector-3">
                        <img src="imagenes/HogwartsSlider.png">
                    </label>
                </div>
            </div>
        </div>
    </section>

    <?php $juego->mostrarJuegosMasBaratos(); ?>

</main>

<footer>
    <p>&copy; 2023 Tienda de Juegos. Todos los derechos reservados.</p>
</footer>
<script src="js/script.js"></script>
</body>
</html>