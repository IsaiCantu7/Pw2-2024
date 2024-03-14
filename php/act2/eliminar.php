<?php
include 'db.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_servicio = $_GET['id'];

    // Realizar la eliminación del servicio
    $sql_delete = "DELETE FROM modulo_servicios WHERE id = $id_servicio";

    if($conn->query($sql_delete) === TRUE) {
        // Redireccionar de vuelta al catálogo de servicios después de eliminar
        header("Location: catalogo_servicio.php");
        exit();
    } else {
        // Si ocurre un error al eliminar, mostrar un mensaje de error
        echo "Error al eliminar el servicio: " . $conn->error;
        exit();
    }
} else {
    echo "ID de servicio inválido.";
    exit();
}
?>
