<?php
include 'db.php';

// Verificar si se ha pasado el parámetro 'id_alumno' en la URL
if(isset($_GET['id_alumno'])) {
    $id_alumno = $_GET['id_alumno'];
    
    $sql_eliminar = "DELETE FROM alumnos WHERE id = $id_alumno";
    
    // Ejecutar la consulta SQL
    if ($conn->query($sql_eliminar) === TRUE) {
        echo "Alumno eliminado correctamente.";
    } else {
        echo "Error al eliminar al alumno: " . $conn->error;
    }

    $conn->close();
} else {
    echo "El parámetro id_alumno no se ha pasado correctamente.";
    exit();
}
?>
