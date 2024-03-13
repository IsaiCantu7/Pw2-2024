<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Alta de Materia en Carrera</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Formulario de Alta de Materia en Carrera</h2>
        <!-- Formulario de alta de materia -->
        <form id="formulario_alta_materia" method="post">
            <div class="form-group">
                <label for="nombre">Nombre de la Materia:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <select class="form-control" name="carrera_id" id="carrera_id" required>
                    <option value="">Seleccionar Carrera</option>
                    <!-- Las opciones de carrera se cargarán dinámicamente aquí -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="alta_materia">Guardar</button>
        </form>
    </div>

    <!-- Script para cargar dinámicamente las opciones de carrera -->
    <script>
        // Función para cargar las opciones de carrera desde el servidor mediante AJAX
        function cargarCarreras() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var carreras = JSON.parse(this.responseText);
                    var select = document.getElementById("carrera_id");
                    select.innerHTML = ""; // Limpiar opciones existentes
                    select.innerHTML += "<option value=''>Seleccionar Carrera</option>"; // Agregar opción por defecto
                    for (var i = 0; i < carreras.length; i++) {
                        select.innerHTML += "<option value='" + carreras[i].id + "'>" + carreras[i].nombre_carrera + "</option>"; // Agregar opciones de carrera
                    }
                }
            };
            xhttp.open("GET", "obtener_carreras.php", true); // Ajusta la URL según la ruta de tu archivo PHP para obtener carreras
            xhttp.send();
        }

        // Llamar a la función para cargar las carreras cuando se cargue la página
        window.onload = cargarCarreras;
    </script>
</body>

</html>
