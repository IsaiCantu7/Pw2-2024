<?php
// incluir el archivo de conexión a la base de datos
include 'db.php';

// Verificar si se ha enviado el formulario de actualización de alumno
if(isset($_POST['editar_alumno'])) {
    // Obtener los datos del formulario
    $id_alumno = $_POST['id_alumno'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];

    // Preparar la consulta SQL para actualizar el alumno
    $sql_actualizar = "UPDATE alumnos SET nombre='$nombre', apellido='$apellido', edad=$edad WHERE id=$id_alumno";

    // Ejecutar la consulta SQL
    if ($conn->query($sql_actualizar) === TRUE) {
        echo "Alumno actualizado correctamente.";
    } else {
        echo "Error al actualizar al alumno: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    header("Location: editar_alumno.php");
    exit();
}
?>
