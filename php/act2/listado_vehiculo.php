<?php
include 'db.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Vehículos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Listado de Vehículos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Número de Serie</th>
                    <th>Marca</th>
                    <th>Submarca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Tipo</th>
                    <th>Color</th>
                    <th>Capacidad</th>
                    <th>Procedencia</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los vehículos
                $sql = "SELECT id, numero_serie, marca, submarca, modelo, año, tipo, color, capacidad, procedencia FROM vehiculos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los vehículos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["numero_serie"] . "</td>";
                        echo "<td>" . $row["marca"] . "</td>";
                        echo "<td>" . $row["submarca"] . "</td>";
                        echo "<td>" . $row["modelo"] . "</td>";
                        echo "<td>" . $row["año"] . "</td>";
                        echo "<td>" . $row["tipo"] . "</td>";
                        echo "<td>" . $row["color"] . "</td>";
                        echo "<td>" . $row["capacidad"] . "</td>";
                        echo "<td>" . $row["procedencia"] . "</td>";
                        // Botones de editar y eliminar
                        echo "<td>";
                        echo "<a href='editar_vehiculo.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm mr-2'>Editar</a>";
                        echo "<a href='eliminar_vehiculo.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No se encontraron vehículos.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
