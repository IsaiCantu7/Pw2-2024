<?php
include 'db.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_servicio = $_GET['id'];
    
    // Realizar una consulta para obtener los detalles del servicio seleccionado
    $sql_select = "SELECT nombre, costo FROM modulo_servicios WHERE id = $id_servicio";
    $result_select = $conn->query($sql_select);
    
    // Se verifica  si se encontró el servicio
    if($result_select->num_rows > 0) {
        // Obtener los detalles del servicio
        $servicio = $result_select->fetch_assoc();
        $nombre_servicio = $servicio['nombre'];
        $costo_servicio = $servicio['costo'];
        
        // Mostrar los detalles del servicio 
        echo "<h2>Confirmar Selección de Servicio</h2>";
        echo "<p>Nombre del Servicio: $nombre_servicio</p>";
        echo "<p>Costo del Servicio: $" . number_format($costo_servicio, 2) . "</p>";
        echo "<p>¿Estás seguro de seleccionar este servicio?</p>";
        echo "<form action='procesar_confirmacion.php' method='post'>";
        echo "<input type='hidden' name='id_servicio' value='$id_servicio'>";
        echo "<button type='submit' class='btn btn-primary'>Confirmar</button>";
        echo "<a href='catalogo_servicio.php' class='btn btn-secondary'>Cancelar</a>";
        echo "</form>";
    } else {
        // Si el servicio no se encontró, mostrar un mensaje de error
        echo "<p>El servicio seleccionado no se encontró.</p>";
    }
} else {
    echo "<p>ID de servicio inválido.</p>";
}
?>
