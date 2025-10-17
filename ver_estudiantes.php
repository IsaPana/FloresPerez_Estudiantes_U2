<?php
include "conexion.php";
$resultado = $conn->query("SELECT * FROM estudiantes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes Registrados</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            padding: 50px;
        }

        .table-container {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #0d47a1;
            font-weight: 600;
            margin-bottom: 25px;
        }

        th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }

        #buscador {
            width: 100%;
            max-width: 350px;
            margin: 0 auto 25px auto;
            display: block;
            padding: 10px 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.3s;
        }

        #buscador:focus {
            border-color: #007bff;
            box-shadow: 0 0 6px rgba(0,123,255,0.3);
        }

        .pagination-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .pagination-buttons button {
            margin: 0 5px;
            padding: 8px 18px;
            border: none;
            border-radius: 8px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .pagination-buttons button:hover {
            background-color: #0056b3;
        }

        .volver {
            text-align: center;
            margin-top: 25px;
        }

        .volver a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .volver a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container table-container">
    <h2>Estudiantes Registrados</h2>

    <!--Input de búsqueda -->
    <input type="text" id="buscador" placeholder="Buscar estudiante...">

    <div class="table-responsive">
        <table class="table table-hover align-middle" id="tablaEstudiantes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Carrera</th>
                    <th>Fecha de ingreso</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $fila['id'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['correo'] ?></td>
                        <td><?= $fila['telefono'] ?></td>
                        <td><?= $fila['carrera'] ?></td>
                        <td><?= $fila['fecha_ingreso'] ?></td>
                        <td><?= $fila['activo'] ? 'Sí' : 'No' ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!--Botones de paginación -->
    <div class="pagination-buttons">
        <button id="prevBtn">← Anterior</button>
        <button id="nextBtn">Siguiente →</button>
    </div>

    <div class="volver">
        <a href="index.php">← Volver al formulario</a>
    </div>
</div>

<!--cript de búsqueda + paginación -->
<script>
    const buscador = document.getElementById('buscador');
    const filas = Array.from(document.querySelectorAll('#tablaEstudiantes tbody tr'));
    const filasPorPagina = 10;
    let paginaActual = 1;
    let filasFiltradas = [...filas]; // Copia inicial

    function mostrarPagina(pagina) {
        const inicio = (pagina - 1) * filasPorPagina;
        const fin = inicio + filasPorPagina;

        filas.forEach(fila => fila.style.display = 'none');
        filasFiltradas.slice(inicio, fin).forEach(fila => fila.style.display = '');

        document.getElementById('prevBtn').disabled = pagina === 1;
        document.getElementById('nextBtn').disabled = fin >= filasFiltradas.length;
    }

    function filtrarFilas() {
        const texto = buscador.value.toLowerCase();
        filasFiltradas = filas.filter(fila =>
            fila.textContent.toLowerCase().includes(texto)
        );
        paginaActual = 1;
        mostrarPagina(paginaActual);
    }

    document.getElementById('prevBtn').addEventListener('click', () => {
        if (paginaActual > 1) {
            paginaActual--;
            mostrarPagina(paginaActual);
        }
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
        if (paginaActual * filasPorPagina < filasFiltradas.length) {
            paginaActual++;
            mostrarPagina(paginaActual);
        }
    });

    buscador.addEventListener('keyup', filtrarFilas);

    // Mostrar la primera página al cargar
    mostrarPagina(paginaActual);
</script>

</body>
</html>
