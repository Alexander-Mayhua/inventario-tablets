<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-top: 50px;
        }

        .login-form {
            padding: 3rem;
        }

        .login-image {
            background: linear-gradient(rgba(41, 128, 185, 0.8), rgba(52, 152, 219, 0.8)),
                        url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800');
            background-size: cover;
            background-position: center;
            min-height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 3rem;
        }

        .form-control {
            padding: 0.8rem 1.2rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .btn-login {
            padding: 0.8rem 1.2rem;
            border-radius: 10px;
            background-color: #2980b9;
            border: none;
            width: 100%;
            font-weight: 600;
        }

        .btn-login:hover {
            background-color: #3498db;
        }

        .social-login {
            margin-top: 2rem;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dee2e6;
            margin: 0 0.5rem;
            transition: all 0.3s;
        }

        .social-btn:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
        }

        .divider {
            margin: 2rem 0;
            position: relative;
        }

        .divider::before {
            content: "";
            position: absolute;
            width: 45%;
            height: 1px;
            background-color: #dee2e6;
            left: 0;
            top: 50%;
        }

        .divider::after {
            content: "";
            position: absolute;
            width: 45%;
            height: 1px;
            background-color: #dee2e6;
            right: 0;
            top: 50%;
        }
    </style>
</head>
<body>
<?php
include 'conexion/conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];
    $sql = "SELECT id FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        header("Location: index.php");
        exit();
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
    <div class="container">
        <div class="row login-container">
            <!-- Login Form -->
            <div class="col-md-6 login-form">
                <h2 class="mb-4">Bienvenido de nuevo</h2>
                <p class="text-muted mb-4">Por favor ingresa tus credenciales para acceder</p>

                <form method="POST" action="login.php">
                    <div class="mb-3">
                        <label for="nombre_usuario" class="form-label">Usuario</label>
                        <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" placeholder="usuario">
                    </div>
                    <div class="mb-4">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" id="contrasena"  name="contrasena" class="form-control" placeholder="Ingresa tu contraseña">
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>
                        <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login">Iniciar sesión</button>
                </form>

                <div class="divider">
                    <span class="px-2 bg-white text-muted">O continúa con</span>
                </div>

                <div class="social-login d-flex justify-content-center">
                    <a href="#" class="social-btn">
                        <i class="bi bi-google"></i>
                    </a>
                    <a href="#" class="social-btn">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="social-btn">
                        <i class="bi bi-twitter"></i>
                    </a>
                </div>

                <p class="text-center mt-4">
                    ¿No tienes una cuenta? <a href="registrar.php" class="text-decoration-none">Regístrate</a>
                </p>
            </div>

            <!-- Image Section -->
            <div class="col-md-6 login-image">
                <div class="text-center">
                    <h3 class="mb-4">Descubre más con nosotros</h3>
                    <p class="mb-0">Únete a nuestra comunidad y accede a contenido exclusivo</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>