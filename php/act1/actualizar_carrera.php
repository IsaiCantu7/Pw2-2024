<?php
// incluir el archivo de conexión a la base de datos
include 'db.php';

// Verificar si se ha enviado el formulario
if(isset($_POST['cambio_carrera'])) {
    // Obtener los datos del formulario
    $id_carrera = $_POST['id_carrera'];
    $nombre_carrera = $_POST['nombre_carrera'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    // Preparar la consulta SQL para actualizar la carrera
    $sql_actualizar = "UPDATE carreras SET nombre_carrera='$nombre_carrera', descripcion='$descripcion', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin' WHERE id=$id_carrera";

    // Ejecutar la consulta SQL
    if ($conn->query($sql_actualizar) === TRUE) {
        echo "Carrera actualizada correctamente.";
    } else {
        echo "Error al actualizar la carrera: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si el formulario no se envió correctamente, redirigir al listado de carreras
    header("Location: listado_carreras.php");
    exit();
}
?>
