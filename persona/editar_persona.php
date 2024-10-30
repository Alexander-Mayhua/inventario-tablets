<?php
session_start();
include '../conexion/conexion.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $tipo_persona = $_POST['tipo_persona'];
    $contacto = $_POST['contacto'];
    

    $sql = "UPDATE personas SET nombre = '$nombre', apellido = '$apellido', dni = '$dni', tipo_persona = '$tipo_persona' , contacto = '$contacto' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "persona actualizado con éxito";
        header('Location: persona.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener la persona para editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM personas WHERE id = $id");
    $persona = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .is-invalid {
            border-color: #dc3545;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="mb-4 text-primary">Editar Persona</h2>
            
            <form method="POST" action="../persona/editar_persona.php?id=<?php echo $id; ?>" id="editForm" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $persona['nombre']; ?>" required>
                        <div class="invalid-feedback">Por favor ingrese el nombre.</div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $persona['apellido']; ?>" required>
                        <div class="invalid-feedback">Por favor ingrese la apellido.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="number" id="dni" name="dni" class="form-control" value="<?php echo $persona['dni']; ?>" required>
                        <div class="invalid-feedback">Por favor ingrese el dni.</div>
                    </div>


                <div class="row">
                    <div class="col-md-4 mb-3">
                    <label for="tipo_persona" class="form-label">tipo_persona</label>
                    <select id="tipo_persona" name="tipo_persona" class="form-select" required>
                        <option value="Estudiante" <?php echo ($persona['tipo_persona'] == 'Estudiante') ? 'selected' : ''; ?>>Estudiante</option>
                        <option value="profesor" <?php echo ($persona['tipo_persona'] == 'profesor') ? 'selected' : ''; ?>>Profesor</option>
                    </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="contacto" class="form-label">Contacto</label>
                        <input type="text" step="0.01" id="contacto" name="contacto" class="form-control" value="<?php echo $persona['contacto']; ?>" required min="0">
                        <div class="invalid-feedback">Por favor ingrese un contacto.</div>
                    </div>


                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validación del formulario
        (function () {
            'use strict'
            const form = document.getElementById('editForm');
            
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                // Validaciones personalizadas
                const precio = document.getElementById('precio').value;
                const cantidad = document.getElementById('cantidad').value;

                if (parseFloat(precio) < 0) {
                    event.preventDefault();
                    document.getElementById('precio').classList.add('is-invalid');
                }

                if (parseInt(cantidad) < 0) {
                    event.preventDefault();
                    document.getElementById('cantidad').classList.add('is-invalid');
                }

                form.classList.add('was-validated');
            }, false);

            // Formatear precio a dos decimales cuando pierde el foco
            document.getElementById('precio').addEventListener('blur', function(e) {
                if(this.value) {
                    this.value = parseFloat(this.value).toFixed(2);
                }
            });

            // Prevenir valores negativos en cantidad
            document.getElementById('cantidad').addEventListener('input', function(e) {
                if(this.value < 0) {
                    this.value = 0;
                }
            });
        })();
    </script>
</body>
</html>
