<?php
include 'db.php';

if(isset($_POST['id_servicio']) && is_numeric($_POST['id_servicio'])) {
    $id_servicio = $_POST['id_servicio'];
    
    $sql_select = "SELECT nombre, costo FROM modulo_servicios WHERE id = $id_servicio";
    $result_select = $conn->query($sql_select);
    
    // Verificar si se encontró el servicio
    if($result_select->num_rows > 0) {
        // Obtener los detalles del servicio
        $servicio = $result_select->fetch_assoc();
        $nombre_servicio = $servicio['nombre'];
        $costo_servicio = $servicio['costo'];
        
        // Insertar el servicio confirmado en el historial
        $sql_insert = "INSERT INTO historial_servicios (nombre_servicio, costo_servicio) VALUES ('$nombre_servicio', $costo_servicio)";
        if($conn->query($sql_insert) === TRUE) {
            // Redireccionar al usuario de vuelta al catálogo de servicios
            header("Location: catalogo_servicio.php");
            exit();
        } else {
            // Si ocurrió un error al insertar en el historial, mostrar un mensaje de error
            echo "Error al insertar en el historial: " . $conn->error;
            exit();
        }
    } else {
        // Si el servicio no se encontró, mostrar un mensaje de error
        echo "<p>El servicio confirmado no se encontró.</p>";
    }
} else {
    echo "<p>ID de servicio inválido.</p>";
}
?>
