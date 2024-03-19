<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM alumnos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Alumno</h2>
        <form action="crud.php" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="form-group">
                <label for="matricula">Matrícula:</label>
                <input type="text" class="form-control" name="matricula" value="<?= $row['matricula'] ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?= $row['nombre'] ?>" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" name="edad" value="<?= $row['edad'] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="id_carrera">Carrera:</label>
                <select class="form-control" name="id_carrera" required>
                    <?php
                    $sql_carrera = "SELECT * FROM carrera";
                    $result_carrera = $conn->query($sql_carrera);
                    while($row_carrera = $result_carrera->fetch_assoc()): ?>
                        <option value="<?= $row_carrera['id_carrera'] ?>" <?= ($row_carrera['id_carrera'] == $row['id_carrera']) ? 'selected' : '' ?>>
                            <?= $row_carrera['nombre'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="cambio_alumno">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
