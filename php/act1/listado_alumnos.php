<?php
include 'db.php';

// Consultar todos los alumnos
$sql = "SELECT * FROM alumnos";
$result = $conn->query($sql);

$alumnos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alumnos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Alumnos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Listado de Alumnos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnos as $alumno) : ?>
                    <tr>
                        <td><?= $alumno['id'] ?></td>
                        <td><?= $alumno['nombre'] ?></td>
                        <td><?= $alumno['apellido'] ?></td>
                        <td><?= $alumno['edad'] ?></td>
                        <td>
                            <!-- Botones para editar y eliminar -->
                            <a href="eliminar_alumno.php?id_alumno=<?= $alumno['id'] ?>" class="btn btn-danger">Eliminar</a>
                            <a href="editar_alumno.php?id_alumno=<?= $alumno['id'] ?>" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
