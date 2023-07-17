<!DOCTYPE html>
<html>
<head>
    <title>ESCOGE UN NIVEL</title>
</head>
<style>
    /* Estilos CSS para los elementos de la página */
    title {
        color: rgb(71, 9, 12);
        font-size: 45px;
    }

    button {
        display: inline-block;
        position: relative; /* Agregar posición relativa */
        width: 200px;
        background-color: rgb(127, 206, 25);
        border-radius: 20px;
        padding: 40px 43px;
        margin: 20px 13px;
        color: #320841;
        text-decoration: none;
        font-size: 30px;
        font-family: Arial, sans-serif;
        font-weight: bold;
        text-transform: uppercase;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 350px; /* Aumentar la altura del botón */
        text-align: center; /* Alinear el texto en el centro del botón */
    }

    .button-text {
    position: absolute;
    top: -45px; /* Ajustar la posición vertical del texto */
    left: 50%;
    transform: translateX(-50%); /* Centrar horizontalmente */
    font-size: 20px; /* Ajustar el tamaño del texto */
    color: #320841;
    font-weight: bold;
}

    body {
        background-image: url("Imagenes/fondoninos.png");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    button:hover {
        background-color: transparent;
        border: 2px solid blue;
        color: blue;
    }

    /* Establecer imagen de fondo para el botón "Atrás" */
    .boton-atras {
        background-image: url('../imagenes/retroceder.png');
        width: 100px; /* Ajustar el ancho del botón */
        height: 100px; /* Ajustar la altura del botón */
        padding: 0; /* Eliminar el padding */
        margin: 10px; /* Ajustar el margin */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        float: left; /* Mover el botón a la izquierda */
    }

    /* Establecer imagen de fondo para el botón "Nivel Fácil" */
    .nivel-facil {
        background-image: url('../imagenes/nivelfacil.png');
    }

    /* Establecer imagen de fondo para el botón "Nivel Normal" */
    .nivel-normal {
        background-image: url('../imagenes/nivelnormal.png');
    }

    /* Establecer imagen de fondo para el botón "Nivel Difícil" */
    .nivel-dificil {
        background-image: url('../imagenes/niveldificil.png');
    }

    /* Establecer para los botones adicionales */
    .boton-adicional {
        width: 150px; /* Ajustar el ancho del botón adicional */
        height: 50px; /* Ajustar la altura del botón adicional */
        padding: 10px 20px; /* Ajustar el padding del botón adicional */
        margin: 3px 40px; /* Ajustar el margin del botón adicional */
        background-color: burlywood;
    }
    
    .botones-container1 {
        text-align: center; /* Centrar los botones adicionales horizontalmente */
    }
    button.botones-container1:hover {
        background-color: transparent;
        border: 2px solid blue;
        color: blue;
    }

    h1 {
        text-align: center;
    }
</style>
<body>
    <h1>BIENVENIDO AL JUEGO DE PALABRAS</h1>
    <center>
        <br>
        <button class="nivel-facil">
            <span class="button-text">Nivel Fácil</span>
        </button>
        <button class="nivel-normal">
            <span class="button-text">Nivel Normal</span>
        </button>
        <button class="nivel-dificil">
            <span class="button-text">Nivel Difícil</span>
        </button>
    </center>
    <div class="botones-container1">
        <button onclick="location.href='../nivelBasicopalabra/pelota.php'" class="boton-adicional">PLAY</button>
        <button onclick="location.href='../nivelnormalpalabra/campana.php'" class="boton-adicional">PLAY</button>
        <button onclick="location.href='../nivelDificilP/juego.php'" class="boton-adicional">PLAY</button>
    </div>
    <div class="botones-container">
        <button onclick="location.href='ModoJuego.php'" class="boton-atras"></button>
    </div>
</body>
</html>
