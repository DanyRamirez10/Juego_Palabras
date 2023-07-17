<?php

include("conexion/conexion.php");
session_start();

$nombres = $_POST["nombresUsu"];
$apellidos   = $_POST["apePaternoUsu"];
$apellidosm   = $_POST["apeMaternoAlum"];

if(isset($_POST["btningresar"]))
{
	$query =("SELECT COUNT(*) as contar FROM usuario WHERE nomAlum = '$nombres' AND appAlum='$apellidos'AND apmAlum='$apellidosm'");
	$consulta = mysqli_query($conn, $query);
	$array = mysqli_fetch_array($consulta);
	
	if($array['contar']>0)
	{
		$_SESSION['username'] = $nombresUsu;
		header('location: pantallas/ModoJuego.php');
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.php' </script>";
	}
}



//Registrar
if(empty($_POST["nombresUsu"])){
	echo "Ingrese el Nombre";
}elseif(empty($_POST["apePaternoUsu"])){
	echo "apeMaternoAlum";
}elseif(empty($_POST["apeMaternoAlum"])){
}elseif( 
        !empty($_POST["nombresUsu"]) &&
        !empty($_POST["apePaternoUsu"]) &&
        !empty($_POST["apeMaternoAlum"]) 
      
    ){
        
        $nom = $_POST["nombresUsu"];
        $app = $_POST["apePaternoUsu"];
        $apm = $_POST["apeMaternoAlum"];

        $sql = "SELECT * FROM usuario WHERE nomAlum  ='$nom' AND appAlum = '$app' AND apmAlum='$apm'";
        $consulta= $conn->query($sql);
        $uno_verificar=$consulta->num_rows;
            if($uno_verificar>0){  
				   echo "<script> alert('sus datos  ya esta registrado, intenta ingresar correctamente'); window.location='index.php' </script>";  
            }else{
			if(isset($_POST["btnregistrar"])){
	            $sqlgrabar = "INSERT INTO usuario(nomAlum,appAlum,apmAlum) values ('$nombres','$apellidos','$apellidosm')";
	
	                if(mysqli_query($conn,$sqlgrabar)){
		                echo "<script> alert('Usuario registrado con exito: $nombres'); window.location='index.php' </script>";
	                   }else 
	                   {
		               echo "Error: ".$sqlgrabar."<br>".mysql_error($conn);
	                }
            }
		}		
}
?>