<html>
<head>
<meta charset="UTF-8">
<title> &#x1F3AE;"ADMINISTRADOR | Juegos "</title> 
<title>Registrar</title>
<link rel="stylesheet" href="estilos.css">
</head>

<body>
<form action="login_registrar.php" method="POST">
<h2>Crear una cuenta</h2>
<input type="text" placeholder="&#x270d; Nombres" name="nombresUsu" required pattern="[a-zñA-Z]+">
<input type="text" placeholder="&#x270d; Apellidos" name="apePaternoUsu" required pattern="[a-zñA-Z]+">
<input type="text" placeholder="&#x270d; Apellidos" name="apeMaternoAlum" required pattern="[a-zñA-Z]+">
<input type="submit" value="Registrar" name="btnregistrar">

<br>
<a href="index.php" style="float:right">Regresar</a>

</form>
</body>
</html>