<?php
include 'db.php';

// Consultar todas las carreras
$sql = "SELECT * FROM carreras";
$result = $conn->query($sql);

$carreras = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $carreras[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Carreras</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Listado de Carreras</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carreras as $carrera) : ?>
                    <tr>
                        <td><?= $carrera['id'] ?></td>
                        <td><?= $carrera['nombre_carrera'] ?></td>
                        <td><?= $carrera['descripcion'] ?></td>
                        <td><?= $carrera['fecha_inicio'] ?></td>
                        <td><?= $carrera['fecha_fin'] ?></td>
                        <td>
                            <a href="editar_carrera.php?id_carrera=<?= $carrera['id'] ?>" class="btn btn-primary">Editar</a>
                            <a href="eliminar_carrera.php?id_carrera=<?= $carrera['id'] ?>" class="btn btn-danger">Eliminar</a> <!-- Enlace para eliminar carrera -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
