<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

echo "Bienvenido, " . $_SESSION['usuario'] . " (Rol: " . $_SESSION['rol'] . ")";
?>
