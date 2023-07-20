<?php
session_start();
session_destroy();
header("Location: index.php"); // Cambia "index.php" por la página de inicio de sesión o la página de tu elección
exit;
?>