<?php
include("conexion/conexion.php");
session_start();

// Obtén el puntaje enviado desde el cliente
$score = $_POST['score'];

// Obtén el ID del usuario actualmente autenticado


// Preparar la consulta SQL para insertar el puntaje en la tabla correspondiente
$sql = "INSERT INTO docente (contraseña) VALUES ($score)";

if ($conn->query($sql) === TRUE) {
    // El puntaje se insertó correctamente en la base de datos
    echo "Puntaje guardado en la base de datos.";
} else {
    // Ocurrió un error al insertar el puntaje en la base de datos
    echo "Error al guardar el puntaje: " . $conn->error;
}
?>
