<html>

<head>
<meta charset="UTF-8">
<title>&#x1F3AE; "ADMINISTRADOR | Juegos "</title> 
<link rel="stylesheet" href="estilos.css">
<link rel="stylesheet" type="text/css" href="estilos.css">
<style>
/* CSS for the "Back" button */
.button-back {
  background-color: #007bff; /* Replace this with your desired background color */
  color: #fff; /* Set text color to white or any contrasting color */
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  margin-top: 10px;
}

/* CSS for the "Crear una cuenta" button */
.button-create {
  background-color: #007bff; /* Replace this with your desired background color */
  color: #fff; /* Set text color to white or any contrasting color */
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  margin-top: 10px;
  float: right;
}
</style>
</head>
<body>
<form action="login_registrar.php" method="POST">
<h2>Iniciar sesión</h2>
<input type="text" placeholder="&#11093; Nombre" name="nombresUsu"required  pattern="[a-zÑñA-Z]+" >
<input type="text" placeholder="&#11093; Apellido Paterno" name="apePaternoUsu" required  pattern="[a-zÑñA-Z]+">
<input type="text" placeholder="&#11093; Apellidos Materno" name="apeMaternoAlum" required  pattern="[a-zÑñA-Z]+">
<input type="submit" value="Ingresar" name="btningresar">


<button class="button-back" onclick="goBack()">Atrás</button>
<a href="registrar.php" class="button-create">Crear una cuenta</a>
<script>
function goBack() {
  window.location.href = " index.php  ";
}
</script>
</form>
</body>
</html>








