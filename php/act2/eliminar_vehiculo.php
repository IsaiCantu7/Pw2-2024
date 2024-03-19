<?php
include 'db.php';

if (isset($_POST['eliminar_vehiculo'])) {
    // Obtener el ID del vehículo a eliminar
    $id = $_POST['id'];

    // Consulta SQL para eliminar el vehículo
    $sql = "DELETE FROM vehiculos WHERE id=$id";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario al listado de vehículos
        header("Location: listado_vehiculo.php");
        exit(); 
    } else {
        echo "Error al eliminar el vehículo: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obtener los datos del vehículo
    $sql = "SELECT * FROM vehiculos WHERE id=$id";
    $result = $conn->query($sql);

    // Verificar si se encontró el vehículo
    if ($result->num_rows == 1) {
        // Obtener los datos del vehículo
        $vehiculo = $result->fetch_assoc();
    } else {
        echo "No se encontró el vehículo.";
        exit(); 
    }
} else {
    echo "ID de vehículo no especificado.";
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Vehículo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Eliminar Vehículo</h2>
        <p>¿Estás seguro de que deseas eliminar el vehículo?</p>
        <p>Número de Serie: <?php echo $vehiculo['numero_serie']; ?></p>
        <form action="eliminar_vehiculo.php" method="post">
            <input type="hidden" name="id" value="<?php echo $vehiculo['id']; ?>">
            <button type="submit" class="btn btn-danger" name="eliminar_vehiculo">Eliminar</button>
            <a href="listado_vehiculo.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
