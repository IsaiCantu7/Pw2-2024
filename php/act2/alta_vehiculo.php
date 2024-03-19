<?php
// Conexión a la base de datos
include 'db.php';

//agregar un nuevo vehículo
function agregarVehiculo($numero_serie, $marca, $submarca, $modelo, $anio, $tipo, $color, $capacidad, $procedencia) {
    global $conn;
    
    $sql = "INSERT INTO vehiculos (numero_serie, marca, submarca, modelo, año, tipo, color, capacidad, procedencia) VALUES ('$numero_serie', '$marca', '$submarca', '$modelo', '$anio', '$tipo', '$color', '$capacidad', '$procedencia')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['alta_vehiculo'])) {
    // Se obtienen los datos del formulario
    $numero_serie = $_POST['numero_serie'];
    $marca = $_POST['marca'];
    $submarca = $_POST['submarca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $tipo = $_POST['tipo'];
    $color = $_POST['color'];
    $capacidad = $_POST['capacidad'];
    $procedencia = $_POST['procedencia'];

    // Agrega el vehículo a la base de datos
    if (agregarVehiculo($numero_serie, $marca, $submarca, $modelo, $anio, $tipo, $color, $capacidad, $procedencia)) {
        header("Location: listado_vehiculo.php");
        exit(); 
    } else {
        echo "Error al agregar el vehículo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alta de vehículos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Alta de vehículos</h2>
        <form action="alta_vehiculo.php" method="post">
            <div class="form-group">
                <label for="numero_serie">Número de Serie:</label>
                <input type="text" class="form-control" name="numero_serie" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" required>
            </div>
            <div class="form-group">
                <label for="submarca">Submarca:</label>
                <input type="text" class="form-control" name="submarca" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" required>
            </div>
            <div class="form-group">
                <label for="anio">Año:</label>
                <input type="text" class="form-control" name="anio" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" class="form-control" name="tipo" required>
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" name="color" required>
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="text" class="form-control" name="capacidad" required>
            </div>
            <div class="form-group">
                <label for="procedencia">Procedencia:</label>
                <input type="text" class="form-control" name="procedencia" required>
            </div>
            <button type="submit" class="btn btn-primary" name="alta_vehiculo">Guardar vehículo</button>
        </form>
    </div>
</body>
</html>
