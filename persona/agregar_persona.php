<?php
session_start();
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $tipo_persona = $_POST['tipo_persona'];
    $contacto = $_POST['contacto'];
    

    $sql = "INSERT INTO personas (nombre,apellido,dni,tipo_persona,contacto) VALUES ('$nombre','$apellido', '$dni','$tipo_persona','$contacto')";
    if ($conn->query($sql) === TRUE) {
        echo "Nueva persona agregado con éxito";
        header("Location: persona.php");
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
    <title>Agregar persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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

        .form-label {
            font-weight: 500;
            color: #2c3e50;
        }

        .form-control {
            padding: 0.8rem;
            border-radius: 10px;
            border: 1px solid #dee2e6;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .btn-agregar {
            padding: 0.8rem 2.5rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-agregar:hover {
            transform: translateY(-2px);
        }

        .form-header {
            border-bottom: 2px solid #e9ecef;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2 class="text-primary mb-0">
                    <i class="bi bi-tablet me-2"></i>
                    Agregar Persona
                </h2>
            </div>

            <form method="POST" action="../persona/agregar_persona.php" class="needs-validation" novalidate>
                <div class="row">
                    <!-- nombre -->
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">nombre</label>
                        <div class="input-icon">
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                            <i class="bi bi-upc-scan"></i>
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese el nomnbre.
                        </div>
                    </div>

                    <!-- Apellido -->
                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <div class="input-icon">
                            <input type="text" id="apellido" name="apellido" class="form-control" required>
                            <i class="bi bi-tag"></i>
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese el Apellido.
                        </div>
                    </div>

                    <!-- DNI -->
                    <div class="col-md-6 mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <div class="input-icon">
                            <input type="text" id="dni" name="dni" class="form-control" required>
                            <i class="bi bi-tablet"></i>
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese el DNI.
                        </div>
                    </div>
                     <!-- tipo persona -->
                     <div class="col-md-4 mb-3">
                        <label for="tipo_persona" class="form-label">tipo_persona</label>
                        <select class="form-select" id="tipo_persona" name="tipo_persona" required>
                            <option value="" selected disabled>Seleccione el tipo_persona</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="profesor">profesor</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor seleccione el tipo_persona.
                        </div>
                    </div>

                    <!-- contacto -->
                    <div class="col-md-6 mb-3">
                        <label for="contacto" class="form-label">contacto</label>
                        <div class="input-icon">
                            <input type="date" id="contacto" name="contacto" class="form-control" required>
                            
                        </div>
                        <div class="invalid-feedback">
                            Por favor seleccione el contacto.
                        </div>
                    </div>


                <!-- Botones -->
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="button" class="btn btn-secondary btn-agregar" onclick="history.back()">
                        <i class="bi bi-x-circle me-2"></i>
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary btn-agregar">
                        <i class="bi bi-plus-circle me-2"></i>
                        Agregar Persona
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
    </script>
</body>
</html>
