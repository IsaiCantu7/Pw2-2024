<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar_servicio"])) {
    $id_servicio_eliminar = $_POST["eliminar_servicio"];
    
    $sql = "DELETE FROM servicios WHERE id = $id_servicio_eliminar";
    
    if ($conn->query($sql) === TRUE) {
        echo "El servicio se ha eliminado correctamente.";
    } else {
        echo "Error al eliminar el servicio.";
    }
}

$sql = "SELECT id, fecha_ingreso, servicio, total_pagar FROM servicios ORDER BY fecha_ingreso DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Servicios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Historial de Servicios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha de Ingreso</th>
                    <th>Servicio</th>
                    <th>Total a Pagar</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Mostrar los servicios en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["fecha_ingreso"] . "</td>";
                        echo "<td>" . $row["servicio"] . "</td>";
                        echo "<td>" . $row["total_pagar"] . "</td>";
                        echo "<td>";
                        // Formulario para enviar la solicitud de eliminación del servicio
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='eliminar_servicio' value='" . $row["id"] . "'>";
                        echo "<button type='submit' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este servicio?\")'>Eliminar</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron servicios.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
