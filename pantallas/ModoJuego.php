<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stilos.css">
    <style>
        /* Estilos CSS para los elementos de la página */
        .title-container {
            text-align: center;
            background-color: yellowgreen;
            padding: 10px;
            margin: 10px auto;
            border-radius: 10px;
            max-width: 450px;
        }
        
        h1 {
            font-size: 40px;
            color: rgb(71, 9, 12);
            margin-top: 0;
        }
        body {
            background-image: url('Imagenes/ninos.png');
            background-size: 60%;/* valor para reducir imagen*/
            background-repeat: no-repeat;
            background-position: center;
            
        }
    
        button {
            display: block;
            width: 300px;
            background-color: rgb(127, 206, 256);
            border-radius: 20px;
            padding: 30px 30px;
            margin: 40px 13px;
            color: #22083c;
            text-decoration: none;
            font-size: 70px; /* Tamaño de fuente */
            font-family: 'French Script MT'; /* Cambia por la fuente que desees utilizar */
            font-weight: bold; /* Texto en negrita */
            text-align: center; /* Centrar el texto */
            border: 4px solid #000; /* Añadir borde de 2px de ancho y color negro */
        
        }
    
        button:hover {
            background-color: transparent;
            border: 2px solid blue;
            color: blue;
        }
        .mute-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #3FF4E1 ;
            border: none;
            font-size: 50px;
            cursor: pointer;
        }
        .back-button {
            position: fixed;
            bottom: 70px;
            left: 20px;
            background-color: #FF5733;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-size: 40px;
        }
        .back-button:hover {
            background-color: #FF704D;
        }

    </style>
    <title>ESCOGE COMO JUGAR</title>
</head>
<body>

<div class="title-container">
    <h1>BIENVENIDO ESCOJE COMO JUGAR</h1>
</div>

<div id="contenedor">
    <center>
        <br>
        <button onclick="location.href='NivelesP.php'">Palabras</button>
    </center>  
</div>
<div id="contenedor">
    <center>
        <br>
        <button onclick="location.href='NivelesO.php'">Oraciones</button>
    </center>  
</div>
<a href="../loginAlumno.php" class="back-button">Atrás</a>
</body>
</html>

