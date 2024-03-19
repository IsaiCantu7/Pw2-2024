<?php
include 'db.php';

$sql = "SELECT id, nombre_servicio, costo_servicio FROM historial_servicios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Servicios en el Catálogo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Historial de Servicios en el Catálogo</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Servicio</th>
                    <th>Costo del Servicio</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Mostrar los servicios agregados en el historial
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nombre_servicio"] . "</td>";
                        echo "<td>$" . $row["costo_servicio"] . "</td>";
                        echo "<td><form action='eliminar_saltaervicio.php' method='post'><input type='hidden' name='id_servicio' value='" . $row["id"] . "'><button type='submit' class='btn btn-danger'>Eliminar</button></form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay servicios agregados en el historial.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
