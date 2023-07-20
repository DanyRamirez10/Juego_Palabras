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
<input type="text" placeholder="&#x270d; Nombre" name="nom" required pattern="[a-zÑñA-Z]+">
<input type="email" placeholder="&#x270d; Correo" name="ema" required>
<input type="password" placeholder="&#x270d; Contraseña" name="pass" required>
<input type="submit" value="Registrar" name="btnregistrar">

<br>
<a href="index.php" style="float:right">Regresar</a>

</form>
</body>
</html>