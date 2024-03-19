<?php
include 'db.php';

if(isset($_GET['id_alumno'])) {
    $id_alumno = $_GET['id_alumno'];
    
    // Consultar el alumno con el ID proporcionado
    $sql_alumno = "SELECT * FROM alumnos WHERE id = $id_alumno";
    $result_alumno = $conn->query($sql_alumno);
    
    // Verificar si la consulta fue exitosa y hay datos encontrados
    if($result_alumno && $result_alumno->num_rows > 0) {
        $alumno = $result_alumno->fetch_assoc();
    } else {
        // Manejar el caso en que no se encuentre el alumno con el ID dado
        echo "El alumno no se encontró.";
        exit();
    }
} else {
    echo "El parámetro id_alumno no se ha pasado correctamente.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Alumno</h2>
        <form action="actualizar_alumno.php" method="post">
            <input type="hidden" name="id_alumno" value="<?= $id_alumno ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?= $alumno['nombre'] ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" name="apellido" value="<?= $alumno['apellido'] ?>" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" name="edad" value="<?= $alumno['edad'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="editar_alumno">Guardar Cambios</button>
        </form>
    </div>
</body>

</html>
