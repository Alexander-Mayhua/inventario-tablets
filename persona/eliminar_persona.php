<?php
session_start();
include '../conexion/conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM personas WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "persona eliminado con éxito";
    header('Location: persona.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
