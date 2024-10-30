<?php
session_start();
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $fecha_compra = $_POST['fecha_compra'];
    $estado = $_POST['estado'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO tablets (codigo,marca,modelo,fecha_compra,estado,precio,cantidad) VALUES ('$codigo','$marca', '$modelo','$fecha_compra','$estado', '$precio','$cantidad')";
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo instrumento agregado con éxito";
        header("Location: tabletas.php");
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
    <title>Agregar Tableta</title>
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
                    Agregar Tableta
                </h2>
            </div>

            <form method="POST" action="../tabletas/agregar_tableta.php" class="needs-validation" novalidate>
                <div class="row">
                    <!-- Código -->
                    <div class="col-md-6 mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <div class="input-icon">
                            <input type="text" id="codigo" name="codigo" class="form-control" required>
                            <i class="bi bi-upc-scan"></i>
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese el código.
                        </div>
                    </div>

                    <!-- Marca -->
                    <div class="col-md-6 mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <div class="input-icon">
                            <input type="text" id="marca" name="marca" class="form-control" required>
                            <i class="bi bi-tag"></i>
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese la marca.
                        </div>
                    </div>

                    <!-- Modelo -->
                    <div class="col-md-6 mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <div class="input-icon">
                            <input type="text" id="modelo" name="modelo" class="form-control" required>
                            <i class="bi bi-tablet"></i>
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese el modelo.
                        </div>
                    </div>

                    <!-- Fecha de Compra -->
                    <div class="col-md-6 mb-3">
                        <label for="fecha_compra" class="form-label">Fecha de Compra</label>
                        <div class="input-icon">
                            <input type="date" id="fecha_compra" name="fecha_compra" class="form-control" required>
                            
                        </div>
                        <div class="invalid-feedback">
                            Por favor seleccione la fecha de compra.
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="col-md-4 mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="" selected disabled>Seleccione el estado</option>
                            <option value="Nuevo">bueno</option>
                            <option value="Usado">dañado</option>
                            
                        </select>
                        <div class="invalid-feedback">
                            Por favor seleccione el estado.
                        </div>
                    </div>

                    <!-- Precio -->
                    <div class="col-md-4 mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" id="precio" name="precio" class="form-control" required>
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese el precio.
                        </div>
                    </div>

                    <!-- Cantidad -->
                    <div class="col-md-4 mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <div class="input-icon">
                            <input type="number" id="cantidad" name="cantidad" class="form-control" required min="1">
                            <i class="bi bi-box"></i>
                        </div>
                        <div class="invalid-feedback">
                            Por favor ingrese la cantidad.
                        </div>
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
                        Agregar Tableta
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