<?php
include 'db.php';

// Consulta para obtener la lista de servicios
$sql = "SELECT id, nombre, costo FROM modulo_servicios";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Servicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Agregar Servicio</h2>
        <form action="guardar_servicio.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre del Servicio:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="costo">Costo del Servicio:</label>
                <input type="number" step="0.01" class="form-control" name="costo" min="0" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Servicio</button>
        </form>
    </div>
</body>
</html>
