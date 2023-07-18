<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Juego de palabras</title>
    <style>
        body {
            width: 960px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }
        
        #pantalla{
            border: groove 8px gold;
            background: lightgreen;   
        }
        #boton {
            background-color: red;
            color: white;
            font-size: 20px;
            text-align: center;
            font-weight: bolder;
            padding: 3px;
            border: solid 2px black;
            font-family: 'Lumen-Full';
            src: url('../Lumen-Full.ttf') format('truetype'); /* Ajusta la ruta y el formato del archivo de la fuente */
        }

        #boton:hover {
            /* Estilo que se activa al pasar el puntero sobre el botón */
            background-color: lightcoral;
            font-size: 22px;
            border: groove 4px red;
        }
        
        #redireccionar {
            text-align: center;
            font-weight: bolder;
            padding: 0px;
            border: solid 2px black;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-image: url('../imagenes/adelante.png');
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            width: 100px; /* Ajustar el ancho del botón */
            height: 100px; /* Ajustar la altura del botón */
        }

        #redireccionar:hover {
            background-color: blue;
            font-size: 22px;
            border: groove 4px blue;
        }
        #volver {
            background-color: blue;
            padding: 0px;
            border: solid 2px black;
            position: fixed;
            bottom: 20px;
            left: 20px; /* Ajusta la posición izquierda según tus necesidades */
            background-image: url('../imagenes/atrasdific.png');
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            width: 90px; /* Ajustar el ancho del botón */
            height: 90px; /* Ajustar la altura del botón */
        }

        #volver:hover {
            background-color: blue;
            font-size: 22px;
            border: groove 4px blue;
        }
        /*funcion globos*/
        @keyframes balloonRain {
        0% {
          transform: translate(-50%, -100%) rotate(0deg);
        }
        100% {
          transform: translate(-50%, 100vh) rotate(360deg);
        }
      }

        .balloon-container {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .balloon {
      width: 50px;
      height: 70px;
      background-image: url('../imagenes/globo.png'); /* Ruta de la imagen del globo */
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      animation: balloonRain 10s linear infinite;
    }/*funcion globos*/
        #menuButton {
            position: fixed;
            top: 40px; /* Ajusta el valor para bajar más */
            left: 60px; /* Ajusta el valor para desplazar hacia la derecha */
            padding: 40px;
            background-color: #333;
            color: white;
            font-weight: bold;
            cursor: pointer;
            background-image: url('../imagenes/menuP.png'); /* Ruta de la imagen para el botón de menu principal */
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            font-size: 40px; /* Tamaño de fuente aumentado */
    }
    </style>
</head>

<body>
    <h1>-JUEGO DE PALABRAS-</h1>
    <button id="menuButton" onclick="goToMainMenu()"></button>
    <canvas id="pantalla" width="960px" height="450px">
        <!-- etiqueta del canvas con sus medidas en la pantalla -->
        Tu navegador no soporta Canvas.
    </canvas>

    <!-- El boton que nos sirve para recargar la pagina y asi generar una nueva palabra y volver a jugar -->
    <button id="boton" type="reset" onclick="javascript:window.location.reload();">Volver a Jugar</button>
    <!-- Botón adicional para redireccionar a otro archivo -->
    <button id="redireccionar" onclick="javascript:window.location.href = 'rio.php';" disabled></button>
    <button id="volver" onclick="javascript:window.location.href = 'juego.php';"></button>

    <!-- Audio de error -->
    <audio id="audioError" src="../sonidos/error2.mp3"></audio>

    <script>
        /* Variables */
        var ctx;
        var canvas;
        var palabra;
        var letras = "QERTYUIOPASDFGHJKLÑCVBNM";
        var colorTecla = "#585858";
        var colorMargen = "red";
        var inicioX = 200;
        var inicioY = 300;
        var lon = 35;
        var margen = 20;
        var pistaText = "";

        /* Arreglos */
        var teclas_array = new Array();
        var letras_array = new Array();
        var palabras_array = new Array();

        /* Variables de control */
        var aciertos = 0;
        var errores = 0;
        var maxErrores = 4; // Número máximo de errores permitidos

        /* Palabra e imagen fija */
        var imagen1 = new Image();
        imagen1.src = "../imagenes/gato.png";
        palabras_array.push("GATO");

        /* Objetos */
        function Tecla(x, y, ancho, alto, letra) {
            this.x = x;
            this.y = y;
            this.ancho = ancho;
            this.alto = alto;
            this.letra = letra;
            this.dibuja = dibujaTecla;
        }

        function Letra(x, y, ancho, alto, letra) {
            this.x = x;
            this.y = y;
            this.ancho = ancho;
            this.alto = alto;
            this.letra = letra;
            this.dibuja = dibujaCajaLetra;
            this.dibujaLetra = dibujaLetraLetra;
        }

        /* Funciones */

        /* Dibujar Teclas*/
        function dibujaTecla() {
            ctx.fillStyle = colorTecla;
            ctx.strokeStyle = colorMargen;
            ctx.fillRect(this.x, this.y, this.ancho, this.alto);
            ctx.strokeRect(this.x, this.y, this.ancho, this.alto);

            ctx.fillStyle = "white";
            ctx.font = "bold 20px courier";
            ctx.fillText(this.letra, this.x + this.ancho / 2 - 5, this.y + this.alto / 2 + 5);
        }

        /* Dibua la letra y su caja */
        function dibujaLetraLetra() {
            var w = this.ancho;
            var h = this.alto;
            ctx.fillStyle = "black";
            ctx.font = "bold 40px Courier";
            ctx.fillText(this.letra, this.x + w / 2 - 12, this.y + h / 2 + 14);
        }

        function dibujaCajaLetra() {
            ctx.fillStyle = "white";
            ctx.strokeStyle = "black";
            ctx.fillRect(this.x, this.y, this.ancho, this.alto);
            ctx.strokeRect(this.x, this.y, this.ancho, this.alto);
        }

        /* Distribuir nuestro teclado con sus letras respectivas al acomodo de nuestro array */
        function teclado() {
            var letrasAleatorias = letras.split('').sort(function () {
                return 0.5 - Math.random();
            });

            var ren = 0;
            var col = 0;
            var letra = "";
            var miLetra;
            var x = inicioX;
            var y = inicioY;
            for (var i = 0; i < letrasAleatorias.length; i++) {
                letra = letrasAleatorias[i];
                miLetra = new Tecla(x, y, lon, lon, letra);
                miLetra.dibuja();
                teclas_array.push(miLetra);
                x += lon + margen;
                col++;
                if (col == 10) {
                    col = 0;
                    ren++;
                    if (ren == 2) {
                        x = 280;
                    } else {
                        x = inicioX;
                    }
                }
                y = inicioY + ren * 50;
            }
        }

        /* aqui obtenemos nuestra palabra aleatoriamente y la dividimos en letras */
        function pintaPalabra() {
            palabra = palabras_array[0];

            var w = canvas.width;
            var len = palabra.length;
            var ren = 0;
            var col = 0;
            var y = 230;
            var lon = 50;
            var x = (w - (lon + margen) * len) / 2;
            for (var i = 0; i < palabra.length; i++) {
                letra = palabra.substr(i, 1);
                miLetra = new Letra(x, y, lon, lon, letra);
                miLetra.dibuja();
                letras_array.push(miLetra);
                x += lon +margen;
            }
        }

        /* dibujar cadalzo y partes del pj segun sea el caso */
        function horca(errores) {
            var imagen = new Image();
            imagen.src = "../imagenes/gato.png";
            imagen.onload = function () {
                ctx.drawImage(imagen, 390, 0, 230, 230);
            }
        }

        /* ajustar coordenadas */
        function ajusta(xx, yy) {
            var posCanvas = canvas.getBoundingClientRect();
            var x = xx - posCanvas.left;
            var y = yy - posCanvas.top;
            return { x: x, y: y }
        }

        /* Detecta tecla clickeada y la compara con las de la palabra ya elegida al azar */
        function selecciona(e) {
            var pos = ajusta(e.clientX, e.clientY);
            var x = pos.x;
            var y = pos.y;
            var tecla;
            var bandera = false;
            for (var i = 0; i < teclas_array.length; i++) {
                tecla = teclas_array[i];
                if (tecla.x > 0) {
                    if ((x > tecla.x) && (x < tecla.x + tecla.ancho) && (y > tecla.y) && (y < tecla.y + tecla.alto)) {
                        break;
                    }
                }
            }
            if (i < teclas_array.length) {
                for (var i = 0; i < palabra.length; i++) {
                    letra = palabra.substr(i, 1);
                    if (letra == tecla.letra) { /* comparamos y vemos si acerto la letra */
                        caja = letras_array[i];
                        caja.dibujaLetra();
                        aciertos++;
                        bandera = true;
                    }
                }
                if (bandera == false) { /* Si falla aumenta los errores y checa si perdio para mandar a la funcion gameover */
                    errores++;
                    horca(errores);
                    if (errores == maxErrores) {
                        playErrorAudio();
                        gameOver(errores);
                    }
                }
                /* Borra la tecla que se a presionado */
                ctx.clearRect(tecla.x - 1, tecla.y - 1, tecla.ancho + 2, tecla.alto + 2);
                tecla.x - 1;
                /* checa si se gano y manda a la funcion gameover */
                if (aciertos == palabra.length) {
                    gameOver(errores);
                }
            }
        }

        /* Borramos las teclas y la palabra con sus cajas y mandamos msj segun el caso si se gano o se perdio */
        function gameOver(errores) {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = "black";

            ctx.font = "bold 50px Courier";
            if (errores < maxErrores) {
                ctx.fillText("Muy bien, la palabra es: ", 110, 280);
            } else {
                ctx.fillText("Lo sentimos, la palabra era: ", 110, 280);
            }

            ctx.font = "bold 80px Courier";
            lon = (canvas.width - (palabra.length * 48)) / 2;
            ctx.fillText(palabra, lon, 380);
            horca(errores);

            if (aciertos == palabra.length) {
                // Aparece la lluvia de globos
                var balloonContainer = document.createElement('div');
                balloonContainer.classList.add('balloon-container');
                for (var i = 0; i < 30; i++) {
                    var balloon = document.createElement('div');
                    balloon.classList.add('balloon');
                    balloonContainer.appendChild(balloon);
                }
                document.body.appendChild(balloonContainer);
                // Restablecer el contenido del contenedor después de 3 segundos
                setTimeout(function() {
                    balloonContainer.remove();
                    // Habilitar el botón para redireccionar
                    document.getElementById("redireccionar").disabled = false;
                }, 4000);
            }
        }

        /* Reproduce el audio de error */
        function playErrorAudio() {
            var audioError = document.getElementById("audioError");
            audioError.play();
        }

        /* Detectar si se a cargado nuestro contexto en el canvas, iniciamos las funciones necesarias para jugar o se le manda msj de error segun sea el caso */
        window.onload = function () {
            canvas = document.getElementById("pantalla");
            if (canvas && canvas.getContext) {
                ctx = canvas.getContext("2d");
                if (ctx) {
                    teclado();
                    pintaPalabra();
                    horca(errores);
                    canvas.addEventListener("click", selecciona, false);
                } else {
                    alert("Error al cargar el contexto!");
                }
            }
        }

        function goToMainMenu() {
            window.location.href = '../pantallas/NivelesP.php'; // Reemplaza "NivelesP.php" con la ruta a tu menú principal
        }
    </script>
</body>
</html>
