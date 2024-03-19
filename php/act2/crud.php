<?php
include 'db.php';

// Función para agregar un nuevo vehículo
function agregarVehiculo($numero_serie, $marca, $submarca, $modelo, $anio, $tipo, $color, $capacidad, $procedencia) {
    global $conn;
    
    $sql = "INSERT INTO vehiculos (numero_serie, marca, submarca, modelo, año, tipo, color, capacidad, procedencia) VALUES ('$numero_serie', '$marca', '$submarca', '$modelo', '$anio', '$tipo', '$color', '$capacidad', '$procedencia')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Función para editar los detalles de un vehículo
function editarVehiculo($id, $numero_serie, $marca, $submarca, $modelo, $anio, $tipo, $color, $capacidad, $procedencia) {
    global $conn;
    
    $sql = "UPDATE vehiculos SET numero_serie='$numero_serie', marca='$marca', submarca='$submarca', modelo='$modelo', año='$anio', tipo='$tipo', color='$color', capacidad='$capacidad', procedencia='$procedencia' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Función para eliminar un vehículo
function eliminarVehiculo($id) {
    global $conn;
    
    $sql = "DELETE FROM vehiculos WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Verificar si se ha enviado el formulario de alta de vehículo
if (isset($_POST['alta_vehiculo'])) {
    // Obtener datos del formulario
    $numero_serie = $_POST['numero_serie'];
    $marca = $_POST['marca'];
    $submarca = $_POST['submarca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $tipo = $_POST['tipo'];
    $color = $_POST['color'];
    $capacidad = $_POST['capacidad'];
    $procedencia = $_POST['procedencia'];

    // Agregar el vehículo a la base de datos
    if (agregarVehiculo($numero_serie, $marca, $submarca, $modelo, $anio, $tipo, $color, $capacidad, $procedencia)) {
        // Redirigir al usuario al listado de vehículos
        header("Location: crud.php");
        exit(); 
    } else {
        echo "Error al agregar el vehículo.";
    }
}

// Verificar si se ha enviado el formulario de edición de vehículo
if (isset($_POST['editar_vehiculo'])) {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $numero_serie = $_POST['numero_serie'];
    $marca = $_POST['marca'];
    $submarca = $_POST['submarca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $tipo = $_POST['tipo'];
    $color = $_POST['color'];
    $capacidad = $_POST['capacidad'];
    $procedencia = $_POST['procedencia'];

    // Editar los detalles del vehículo en la base de datos
    if (editarVehiculo($id, $numero_serie, $marca, $submarca, $modelo, $anio, $tipo, $color, $capacidad, $procedencia)) {
        // Redirigir al usuario al listado de vehículos
        header("Location: crud.php");
        exit(); 
    } else {
        echo "Error al editar el vehículo.";
    }
}

// Verificar si se ha enviado el formulario de eliminación de vehículo
if (isset($_POST['eliminar_vehiculo'])) {
    // Obtener el ID del vehículo a eliminar
    $id = $_POST['id'];

    // Eliminar el vehículo de la base de datos
    if (eliminarVehiculo($id)) {
        // Redirigir al usuario al listado de vehículos
        header("Location: crud.php");
        exit(); 
    } else {
        echo "Error al eliminar el vehículo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Vehículos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>CRUD de Vehículos</h2>
        
        <!-- Formulario para agregar vehículo -->
        <div class="card mb-4">
            <div class="card-header">
                Agregar Vehículo
            </div>
            <div class="card-body">
                <form action="crud.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="numero_serie">Número de Serie:</label>
                            <input type="text" class="form-control" name="numero_serie" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="marca">Marca:</label>
                            <input type="text" class="form-control" name="marca" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="submarca">Submarca:</label>
                            <input type="text" class="form-control" name="submarca" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="modelo">Modelo:</label>
                            <input type="text" class="form-control" name="modelo" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="anio">Año:</label>
                            <input type="text" class="form-control" name="anio" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tipo">Tipo:</label>
                            <input type="text" class="form-control" name="tipo" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="color">Color:</label>
                            <input type="text" class="form-control" name="color" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="capacidad">Capacidad:</label>
                            <input type="text" class="form-control" name="capacidad" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="procedencia">Procedencia:</label>
                            <input type="text" class="form-control" name="procedencia" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="alta_vehiculo">Agregar Vehículo</button>
                </form>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                Listado de Vehículos
            </div>
            <div class="card-body">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
