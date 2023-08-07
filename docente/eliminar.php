<?php
 include("../conexion/conexion.php");
 session_start();
// Verificar si se ha enviado el parámetro "id" a través del enlace
if (isset($_GET['id'])) {
  // Obtener el ID del alumno desde el parámetro
  $idAlumno = $_GET['id'];
  // Preparar la consulta para eliminar el registro con el ID proporcionado
  $sql = "DELETE FROM usuario WHERE idAlum = $idAlumno";

  // Ejecutar la consulta
  if ($conn->query($sql) === TRUE) {
    // Redireccionar a la página de listado de alumnos después de eliminar el registro
    header("Location: estudiantes.php");
    exit();
  } else {
    echo "Error al eliminar el registro: " . $conn->error;
  }

  // Cerrar la conexión
  $conn->close();
}
?>
