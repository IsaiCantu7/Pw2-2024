<?php
include 'db.php';

if(isset($_POST['id_servicio']) && is_numeric($_POST['id_servicio'])) {
    $id_servicio = $_POST['id_servicio'];

    $sql_delete = "DELETE FROM historial_servicios WHERE id = $id_servicio";

    if($conn->query($sql_delete) === TRUE) {
        // Redireccionar de vuelta al historial de servicios después de eliminar
        header("Location: historial_catalogo.php");
        exit();
    } else {
        // Si ocurre un error al eliminar, mostrar un mensaje de error
        echo "Error al eliminar el servicio del historial: " . $conn->error;
        exit();
    }
} else {
    echo "ID de servicio inválido.";
    exit();
}
?>
