<?php
include './conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    $rol = $_POST['rol'];

    $sql = "INSERT INTO Usuarios (nombre_usuario, contrasena, rol) VALUES (:nombre_usuario, :contrasena, :rol)";
  

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo instrumento agregado con éxito";
        header("Location: instrumento.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .registro-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }

        .form-control, .form-select {
            padding: 0.8rem;
            border-radius: 10px;
            border: 1px solid #dee2e6;
            margin-bottom: 1rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .btn-registrar {
            padding: 0.8rem 2rem;
            border-radius: 10px;
            background-color: #2980b9;
            border: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-registrar:hover {
            background-color: #3498db;
            transform: translateY(-2px);
        }

        .card-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .invalid-feedback {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="registro-container">
            <h3 class="card-title text-center mb-4">Registro de Usuario</h3>
            
            <form method="POST" action="registrar.php" class="needs-validation" novalidate>
                <!-- Nombre de Usuario -->
                <div class="mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" 
                           class="form-control" 
                           id="nombre_usuario" 
                           name="nombre_usuario" 
                           required
                           placeholder="Ingrese su nombre de usuario">
                    <div class="invalid-feedback">
                        Por favor ingrese un nombre de usuario.
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <input type="password" 
                               class="form-control" 
                               id="contrasena" 
                               name="contrasena" 
                               required
                               placeholder="Ingrese su contraseña">
                        <button class="btn btn-outline-secondary" 
                                type="button" 
                                id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una contraseña.
                    </div>
                </div>

                <!-- Rol -->
                <div class="mb-4">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select" 
                            id="rol" 
                            name="rol" 
                            required>
                        <option value="" selected disabled>Seleccione un rol</option>
                        <option value="Admin">Administrador</option>
                        <option value="profesor">Profesor</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor seleccione un rol.
                    </div>
                </div>

                <!-- Botón de Registro -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-registrar">
                        Registrar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validación del formulario
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        // Toggle para mostrar/ocultar contraseña
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#contrasena');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>