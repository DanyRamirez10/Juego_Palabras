<?php 
session_start();
include("../index.php");
$usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    
	<meta charset="UTF-8">
	<title> "ADMINISTRADOR | Juegos "</title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos.css">
	

</head>  
<body>
    <form class="formulario"> 
    <h1>BIENVENIDOS AL MODO DE JUEGO</h1>
     <div class="contenedor">
     <input type="submit" value="PALABRAS" name="btningresar">

         <h2>
            
         </h2> 
         <input type="submit" value="ORACIONES" name="btningresar">
     </div>
    </form>
</body>
</html>