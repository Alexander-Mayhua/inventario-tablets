<?php
session_start();
include '../conexion/conexion.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $fecha_compra = $_POST['fecha_compra'];
    $estado = $_POST['estado'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $sql = "UPDATE tablets SET codigo = '$codigo', marca = '$marca', modelo = '$modelo', fecha_compra = '$fecha_compra' , estado = '$estado', precio = '$precio', cantidad = '$cantidad' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "tabletas actualizado con éxito";
        header('Location: tabletas.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener la tableta para editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM tablets WHERE id = $id");
    $tableta = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tableta</title>
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
            <h2 class="mb-4 text-primary">Editar Tableta</h2>
            
            <form method="POST" action="../tabletas/editar_tableta.php?id=<?php echo $id; ?>" id="editForm" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" value="<?php echo $tableta['codigo']; ?>" required>
                        <div class="invalid-feedback">Por favor ingrese el código.</div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" id="marca" name="marca" class="form-control" value="<?php echo $tableta['marca']; ?>" required>
                        <div class="invalid-feedback">Por favor ingrese la marca.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" id="modelo" name="modelo" class="form-control" value="<?php echo $tableta['modelo']; ?>" required>
                        <div class="invalid-feedback">Por favor ingrese el modelo.</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="fecha_compra" class="form-label">Fecha de compra</label>
                        <input type="date" id="fecha_compra" name="fecha_compra" class="form-control" value="<?php echo $tableta['fecha_compra']; ?>" required>
                        <div class="invalid-feedback">Por favor seleccione la fecha de compra.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" name="estado" class="form-select" required>
                        <option value="bueno" <?php echo ($tableta['estado'] == 'bueno') ? 'selected' : ''; ?>>bueno</option>
                        <option value="dañado" <?php echo ($tableta['estado'] == 'dañado') ? 'selected' : ''; ?>>dañado</option>
                    </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" id="precio" name="precio" class="form-control" value="<?php echo $tableta['precio']; ?>" required min="0">
                        <div class="invalid-feedback">Por favor ingrese un precio válido.</div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" id="cantidad" name="cantidad" class="form-control" value="<?php echo $tableta['cantidad']; ?>" required min="0">
                        <div class="invalid-feedback">Por favor ingrese una cantidad válida.</div>
                    </div>
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
