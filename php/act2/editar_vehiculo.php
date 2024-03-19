<?php
include 'db.php';

if (isset($_POST['editar_vehiculo'])) {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $submarca = $_POST['submarca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $tipo = $_POST['tipo'];
    $color = $_POST['color'];
    $capacidad = $_POST['capacidad'];
    $procedencia = $_POST['procedencia'];

    $sql = "UPDATE vehiculos SET marca='$marca', submarca='$submarca', modelo='$modelo', año='$anio', tipo='$tipo', color='$color', capacidad='$capacidad', procedencia='$procedencia' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario al listado de vehículos
        header("Location: listado_vehiculo.php");
        exit(); 
    } else {
        echo "Error al actualizar el vehículo: " . $conn->error;
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
    <title>Editar Vehículo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Vehículo</h2>
        <form action="editar_vehiculo.php" method="post">
            <input type="hidden" name="id" value="<?php echo $vehiculo['id']; ?>">
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" value="<?php echo $vehiculo['marca']; ?>" required>
            </div>
            <div class="form-group">
                <label for="submarca">Submarca:</label>
                <input type="text" class="form-control" name="submarca" value="<?php echo $vehiculo['submarca']; ?>" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" value="<?php echo $vehiculo['modelo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="anio">Año:</label>
                <input type="text" class="form-control" name="anio" value="<?php echo $vehiculo['año']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" class="form-control" name="tipo" value="<?php echo $vehiculo['tipo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" name="color" value="<?php echo $vehiculo['color']; ?>" required>
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="text" class="form-control" name="capacidad" value="<?php echo $vehiculo['capacidad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="procedencia">Procedencia:</label>
                <input type="text" class="form-control" name="procedencia" value="<?php echo $vehiculo['procedencia']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="editar_vehiculo">Guardar cambios</button>
        </form>
    </div>
</body>
</html>
