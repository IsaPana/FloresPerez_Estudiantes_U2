<?php
include "conexion.php";
$resultado = $conn->query("SELECT * FROM estudiantes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estudiantes Registrados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e8f1ff, #ffffff);
            padding: 50px;
        }

        .table-container {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0px 6px 18px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #003366;
            font-weight: 700;
            margin-bottom: 20px;
        }

        #botonesExportacion {
            text-align: center;
            margin-bottom: 25px;
        }

        th {
            background-color: #0d6efd;
            color: white !important;
            text-align: center;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }

        .dt-buttons .btn {
            border: none !important;
            border-radius: 8px !important;
            margin-right: 8px;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .buttons-copy { background-color: #0d6efd !important; color: white !important; }
        .buttons-excel { background-color: #198754 !important; color: white !important; }
        .buttons-pdf { background-color: #dc3545 !important; color: white !important; }
        .buttons-print { background-color: #6c757d !important; color: white !important; }

        .dt-buttons .btn:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .volver {
            text-align: center;
            margin-top: 25px;
        }

        .volver a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .volver a:hover {
            text-decoration: underline;
        }

        .dataTables_length select {
            border-radius: 8px;
        }

        .dataTables_filter input {
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container table-container">
    <h2>Estudiantes Registrados</h2>
    <div id="botonesExportacion"></div>

    <div class="table-responsive">
        <table id="tablaEstudiantes" class="table table-striped table-hover align-middle">
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

    <div class="volver">
        <a href="index.php">← Volver al formulario</a>
    </div>
</div>

<script>
$(document).ready(function() {
    var tabla = $('#tablaEstudiantes').DataTable({
        dom: '<"top"lBf>rt<"bottom"ip>', 
        buttons: [
            { extend: 'copyHtml5', text: 'Copiar', className: 'btn buttons-copy' },
            { extend: 'excelHtml5', text: 'Exportar a Excel', className: 'btn buttons-excel' },
            { extend: 'pdfHtml5', text: 'Exportar a PDF', className: 'btn buttons-pdf' },
            { extend: 'print', text: 'Imprimir', className: 'btn buttons-print' }
        ],
        order: [[0, "desc"]],
        pageLength: 10,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
        language: {
            decimal: "",
            emptyTable: "No hay información disponible",
            info: "Mostrando _START_ a _END_ de _TOTAL_ estudiantes",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            lengthMenu: "Mostrar _MENU_ registros",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No se encontraron coincidencias",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente →",
                previous: "← Anterior"
            }
        }
    });
    tabla.buttons().container().appendTo('#botonesExportacion');
});
</script>

</body>
</html>
