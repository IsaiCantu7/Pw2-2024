<?php
// incluir el archivo de conexión a la base de datos
include 'db.php';

// Verificar si se ha enviado el formulario de alta de materia en carrera
if(isset($_POST['alta_carrera'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $carrera_id = $_POST['carrera'];

    // Preparar la consulta SQL para insertar la materia en la carrera
    $sql_insertar = "INSERT INTO materias_carrera (nombre, carrera_id) VALUES ('$nombre', $carrera_id)";

    // Ejecutar la consulta SQL
    if ($conn->query($sql_insertar) === TRUE) {
        echo "Materia agregada a la carrera correctamente.";
    } else {
        echo "Error al agregar la materia a la carrera: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si el formulario no se envió correctamente, redirigir al formulario de alta de materia en carrera
    header("Location: formulario_alta_materia_carrera.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Alta de Materias en Carreras</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Alta de Materias en Carreras</h2>
        <form action="alta_carrera.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre de la Materia:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <select class="form-control" name="carrera" required>
                    <option value="">Seleccionar Carrera</option>
                    <option value="1">Carrera 1</option>
                    <option value="2">Carrera 2</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="alta_carrera">Guardar</button>
        </form>
    </div>
</body>

</html>
