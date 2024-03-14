<?php
include 'db.php';

$sql = "SELECT id, nombre, costo FROM modulo_servicios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Servicios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Catálogo de Servicios</h2>
        <ul class="list-group">
            <?php
            if ($result->num_rows > 0) {
                // Mostrar los servicios disponibles en una lista
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='list-group-item'>" . $row["nombre"] . " - $" . $row["costo"] . " <a href='confirmar_servicio.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm ml-2'>Seleccionar</a> <a href='eliminar.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm ml-2'>Eliminar</a></li>";
                }
            } else {
                echo "<li class='list-group-item'>No hay servicios disponibles</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
