<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Estudiantes</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 30px;
            animation: fadeInDown 1s;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.03);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            color: #0d47a1;
        }

        a {
            text-decoration: none;
            color: #0d6efd;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card col-md-4 mx-auto animate__animated animate__fadeInDown">
            <h2>Registro de Estudiantes</h2>
            <form action="insertar.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo:</label>
                    <input type="email" name="correo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" required pattern="[0-9]{10}" maxlength="10">
                </div>

                <div class="mb-3">
                    <label class="form-label">Carrera:</label>
                    <input type="text" name="carrera" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Registrar</button>
            </form>

            <div class="text-center mt-3">
                <a href="ver_estudiantes.php">Ver estudiantes registrados →</a>
            </div>
        </div>
    </div>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const registro = urlParams.get('registro');

    if (registro === 'exito') {
        Swal.fire({
            icon: 'success',
            title: 'Registro exitoso',
            text: 'El estudiante fue registrado correctamente',
            confirmButtonColor: '#007bff'
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    } else if (registro === 'duplicado') {
        Swal.fire({
            icon: 'warning',
            title: 'Correo o teléfono duplicado',
            text: 'El correo o número telefónico ya están registrados.',
            confirmButtonColor: '#ffc107'
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    } else if (registro === 'error') {
        Swal.fire({
            icon: 'error',
            title: 'Error al registrar',
            text: 'Hubo un problema al registrar el estudiante',
            confirmButtonColor: '#dc3545'
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }
</script>

</body>
</html>
