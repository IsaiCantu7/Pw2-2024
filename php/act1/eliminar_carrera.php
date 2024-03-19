<?php
include 'db.php';

if(isset($_GET['id_carrera'])) {
    $id_carrera = $_GET['id_carrera'];
    
    // Preparar la consulta SQL para eliminar la carrera
    $sql_eliminar = "DELETE FROM carreras WHERE id=$id_carrera";
    
    // Ejecutar la consulta SQL
    if ($conn->query($sql_eliminar) === TRUE) {
        echo "Carrera eliminada correctamente.";
    } else {
        echo "Error al eliminar la carrera: " . $conn->error;
    }

    $conn->close();
} else {
    // Manejar el caso en que no se pasó el parámetro 'id_carrera' en la URL
    echo "El parámetro id_carrera no se ha pasado correctamente.";
    exit();
}
?>
