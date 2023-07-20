<?php

include("../conexion/conexion.php");
session_start();

$email = $_POST["ema"];
$password   = $_POST["pass"];
if(isset($_POST["btningresar"]))
{
	$query =("SELECT COUNT(*) as contar FROM docente WHERE emaUsu= '$email' AND contraseña='$password'");
	$consulta = mysqli_query($conn, $query);
	$array = mysqli_fetch_array($consulta);
	
	if($array['contar']>0)
	{
		$_SESSION['username'] = $nombresUsu;
		header('location: estudiantes.php');
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.php' </script>";
	}
}



//Registrar
if(empty($_POST["nom"])){
	echo "Ingrese el Nombre";
}elseif(empty($_POST["ema"])){
	echo "Ingrese su correo electronico";
}elseif(empty($_POST["pass"])){
}elseif( 
        !empty($_POST["nom"]) &&
        !empty($_POST["ema"]) &&
        !empty($_POST["pass"]) 
      
    ){
        
        $nom = $_POST["nom"];
        $email = $_POST["ema"];
        $password = $_POST["pass"];

        $sql = "SELECT * FROM docente WHERE emaUsu = '$email'";
        $consulta= $conn->query($sql);
        $uno_verificar=$consulta->num_rows;
            if($uno_verificar>0){  
				   echo "<script> alert('el correo electronico ya existe, intente ingresar nuevo correo'); window.location='index.php' </script>";  
            }else{
			if(isset($_POST["btnregistrar"])){
	            $sqlgrabar = "INSERT INTO docente(nomUsu,emaUsu,contraseña) values ('$nom','$email','$password')";
	
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