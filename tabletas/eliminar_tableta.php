<?php
session_start();
include '../conexion/conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM tablets WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "tabletas eliminado con éxito";
    header('Location: tabletas.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
