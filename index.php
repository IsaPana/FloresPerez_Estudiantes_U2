<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Estudiantes</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registro de Estudiantes</h2>
        <form action="insertar.php" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Correo:</label>
            <input type="email" name="correo" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" required pattern="[0-9]{10}" maxlength="10">

            <label>Carrera:</label>
            <input type="text" name="carrera">

            <input type="submit" value="Registrar">
        </form>
        <div style="text-align: center; margin-top: 15px;">
    <a href="ver_estudiantes.php" style="text-decoration: none; color: #007bff; font-weight: bold;">
        Ver estudiantes registrados →
    </a>
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
            text: 'El correo o número telefónico ya están registrados. Intenta con otros datos.',
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
