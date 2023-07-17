<html>
<a href="registrar.php"style="position: absolute; top: 10px; left: 1100px;">Iniciar sesion</a>

<head>
<meta charset="UTF-8">
<title>&#x1F3AE; "ADMINISTRADOR | Juegos "</title> 
<link rel="stylesheet" href="estilos.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<form action="login_registrar.php" method="POST">
<h2>Iniciar sesión</h2>
<input type="text" placeholder="&#11093; Nombres" name="nombresUsu"required  pattern="[a-zÑñA-Z]+" >
<input type="text" placeholder="&#11093; Apellidos" name="apePaternoUsu" required  pattern="[a-zÑA-Z]+">
<input type="text" placeholder="&#11093; Apellidosm" name="apeMaternoAlum" required  pattern="[a-zÑñA-Z]+">
<input type="submit" value="Ingresar" name="btningresar">

<br>
<a href="registrar.php" style="float:right">Crear una cuenta</a>

</form>
</body>
</html>