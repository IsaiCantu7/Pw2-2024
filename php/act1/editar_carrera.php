<?php
// incluir el archivo de conexión a la base de datos
include 'db.php';

// Verificar si se ha pasado el parámetro 'id_carrera' en la URL
if(isset($_GET['id_carrera'])) {
    $id_carrera = $_GET['id_carrera'];
    
    // Consultar la carrera con el ID proporcionado
    $sql_carrera = "SELECT * FROM carreras WHERE id=$id_carrera";
    $result_carrera = $conn->query($sql_carrera);
    
    // Verificar si la consulta fue exitosa y hay datos encontrados
    if($result_carrera && $result_carrera->num_rows > 0) {
        $carrera = $result_carrera->fetch_assoc();
    } else {
        // Manejar el caso en que no se encuentre la carrera con el ID dado
        echo "La carrera no se encontró.";
        exit();
    }
} else {
    // Manejar el caso en que no se pasó el parámetro 'id_carrera' en la URL
    echo "El parámetro id_carrera no se ha pasado correctamente.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Carrera</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Carrera</h2>
        <form action="actualizar_carrera.php" method="post">
            <input type="hidden" name="id_carrera" value="<?php echo $id_carrera; ?>">
            <div class="form-group">
                <label for="nombre_carrera">Nombre de Carrera:</label>
                <input type="text" class="form-control" name="nombre_carrera" value="<?php echo $carrera['nombre_carrera']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" name="descripcion" rows="3"><?php echo $carrera['descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" class="form-control" name="fecha_inicio" value="<?php echo $carrera['fecha_inicio']; ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin:</label>
                <input type="date" class="form-control" name="fecha_fin" value="<?php echo $carrera['fecha_fin']; ?>" required>
            </div>
            <!-- Puedes agregar más campos para editar según tus necesidades -->
            <button type="submit" class="btn btn-primary" name="cambio_carrera">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
