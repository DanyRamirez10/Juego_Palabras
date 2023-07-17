<!DOCTYPE html>
<html>
<head>
  <style>
    /* Estilos CSS aquí */
    body {
      position: relative;
      min-height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url('../imagenes/fondoNormal.jpg'); /* Ruta de la imagen de fondo */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    #container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .clickableElement {
      width: 100px;
      height: 100px;
      background-color: blue;
      color: white;
      text-align: center;
      line-height: 100px;
      cursor: pointer;
      margin-right: 1px;
      font-style: italic;
      font-weight: bold;
      font-size: 66px;
      font-family: 'Vladimir Script';
    }

    #dropZone {
      display: flex;
      flex-direction: row;
      justify-content: flex-start;
      width: 200px;
      height: 100px;
      border: 4px solid rgb(230, 14, 14);
      margin-top: 20px;
      margin-bottom: 10px;
    }

    #container > div {
      display: flex;
      flex-direction: row;
    }

    #score {
      position: absolute;
      top: 20px;
      right: 20px;
      font-weight: bold;
      font-size: 24px;
    }

    #stars {
      position: absolute;
      top: 10%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 100px; /* Tamaño de las estrellas aumentado */
      color: yellow; /* Cambia el color de las estrellas a amarillo */
      animation: blink 1s infinite;
      display: none; /* Inicialmente ocultas */
    }

    @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
    }

    #successMessage,
    #errorMessage {
      margin-top: 10px;
      font-weight: bold;
      font-size: 18px;
      text-align: center;
    }

    #successMessage {
      color: green;
    }

    #errorMessage {
      color: red;
    }

    #redirectButton {
      position: fixed;
      bottom: 40px;
      right: 50px;
      padding: 40px;
      background-color: green;
      color: white;
      font-weight: bold;
      cursor: pointer;
      background-image: url('../imagenes/siguiente2.jpg'); /* Ruta de la imagen para el botón de redirigir */
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
    }

    #backButton {
      position: fixed;
      bottom: 40px;
      left: 40px;
      padding: 40px;
      background-color: red;
      color: white;
      font-weight: bold;
      cursor: pointer;
      background-image: url('../imagenes/retroceder.png'); /* Ruta de la imagen para el botón de retroceder */
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
    }
    #reloadButton {
     position: fixed;
      bottom: 40px;
      left: 130px;
      padding: 40px;
      background-color: red;
      color: white;
      font-weight: bold;
      cursor: pointer;
      background-image: url('../imagenes/borrar.png'); /* Ruta de la imagen para el botón de retroceder */
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
    }
    @keyframes rotate {
  0% { transform: translate(-50%, -50%) rotate(0deg); }
  100% { transform: translate(-50%, -50%) rotate(360deg); }
}

  </style>
</head>
<body>
  <div id="container">
    <!-- Contenido HTML aquí -->
    <img id="ballImage" src="../imagenes/cereza.png" alt="Imagen" width="300" height="200">
    <div id="dropZone"></div>
    <div>
      <div class="clickableElement" data-sound="sound4">Ce</div>
      <div class="clickableElement" data-sound="sound5">ta</div>
      <div class="clickableElement" data-sound="sound5">za</div>
      <div class="clickableElement" data-sound="sound6">re</div>


    </div>
    <div id="score">Puntaje: 0</div>
    <div id="stars"></div>
    <div id="successMessage"></div>
    <div id="errorMessage"></div>
    <button id="redirectButton" disabled></button>
    <button id="backButton" onclick="goBack()"></button>
    <button id="reloadButton" onclick="reloadPage()"></button>
  </div>

  <audio id="successAudio" src="../sonidos/felicidades.mp3" preload="auto"></audio>
  <audio id="errorAudio" src="../sonidos/ay-caramba.mp3" preload="auto"></audio>
  <audio id="ballAudio" src="../sonidos/casa.mp3" preload="auto"></audio>

  <script>
    var clickableElements = document.querySelectorAll('.clickableElement');
    var dropZone = document.getElementById('dropZone');

    var successAudio = document.getElementById('successAudio');
    var errorAudio = document.getElementById('errorAudio');
    var ballAudio = document.getElementById('ballAudio');

    var randomSyllables = ['Ce', 're','za','ta']; // Sílabas aleatorias
    var randomComponents = ['Componente1', 'Componente2','Componente3']; // Componentes aleatorios
    var droppedSyllables = []; // Sílabas que han sido soltadas en el dropZone
    var score = 0;
    var stars = '★★';

    function getRandomIndex(array) {
      return Math.floor(Math.random() * array.length);
    }

    clickableElements.forEach(function(element) {
      var randomIndex = getRandomIndex(randomSyllables);
      var syllable = randomSyllables[randomIndex];
      var component = randomComponents[randomIndex];

      element.textContent = syllable;
      element.setAttribute('data-component', component);

      randomSyllables.splice(randomIndex, 1);
      randomComponents.splice(randomIndex, 1);

      element.addEventListener('click', function(event) {
        var sound = element.getAttribute('data-sound');
        if (sound && window[sound]) {
          window[sound].play();
        }

        var clone = this.cloneNode(true);
        dropZone.appendChild(clone);
        clone.addEventListener('click', function(event) {
          if (!event.target.classList.contains('clickableElement')) {
            this.parentNode.removeChild(this);
          }
        });
        event.stopPropagation();
        element.removeEventListener('click', arguments.callee);
        element.parentNode.removeChild(element);
        checkWord();
      });
    });

    // Agrega el evento de clic a la imagen de la pelota para reproducir el sonido
    var ballImage = document.getElementById('ballImage');
    ballImage.addEventListener('click', function() {
      ballAudio.play();
    });

    function checkWord() {
      var currentSyllables = Array.from(dropZone.children).map(function(element) {
        return element.getAttribute('data-component');
      });

      if (currentSyllables.join('') === 'Componente1Componente2Componente3') {
        showSuccessMessage('¡Palabra correcta! Felicitaciones');
        successAudio.play();
        score += 2;
        updateScore();
        stars += '★';
        updateStars();
        document.getElementById('redirectButton').removeAttribute('disabled');
      } else if (currentSyllables.length >= 3) {
        showErrorMessage('Palabra incorrecta. No se formó la palabra correcta.');
        errorAudio.play();
      } else if (currentSyllables.length === 4) {
        showErrorMessage('Palabra incorrecta. No se formó la palabra correcta.');
        errorAudio.play();
      }
    }

  function showSuccessMessage(message) {
  var successMessageElement = document.getElementById('successMessage');
  successMessageElement.innerHTML = '<img src="../imagenes/feli.gif" alt="Imagen sin fondo" style="width: 100%; height: auto; animation: zoomAndBlink 1s infinite;">';
  successMessageElement.style.fontSize = '48px'; // Ajusta el tamaño de la fuente
  successMessageElement.style.position = 'fixed'; // Establece la posición fija
  successMessageElement.style.top = '50%'; // Alinea verticalmente al centro
  successMessageElement.style.left = '50%'; // Alinea horizontalmente al centro
  successMessageElement.style.transform = 'translate(-50%, -50%)'; // Centra correctamente

  // Mostrar estrellas durante 3 segundos
  var starsElement = document.getElementById('stars');
  starsElement.style.display = 'block';
  setTimeout(function() {
    successMessageElement.innerHTML = '';
    starsElement.style.display = 'none';
  }, 3000);
}
function showErrorMessage(message) {
  var errorMessageElement = document.getElementById('errorMessage');
  errorMessageElement.innerHTML = '<img src="../imagenes/over.png" alt="Carita llorando" width="300" height="300">';
  errorMessageElement.style.fontSize = '300px'; // Ajusta el tamaño de la fuente
  errorMessageElement.style.position = 'fixed'; // Establece la posición fija
  errorMessageElement.style.top = '50%'; // Alinea verticalmente al centro
  errorMessageElement.style.left = '50%'; // Alinea horizontalmente al centro
  errorMessageElement.style.transform = 'translate(-50%, -50%)'; // Centra correctamente
  errorMessageElement.style.animation = 'blink 1s infinite'; // Agrega la animación de parpadeo

  // Restablece el contenido del elemento después de 3 segundos
  setTimeout(function() {
    errorMessageElement.innerHTML = '';
  }, 3000);
}
    function updateScore() {
      var scoreElement = document.getElementById('score');
      scoreElement.textContent = 'Puntaje: ' + score;
    }

    function updateStars() {
      var starsElement = document.getElementById('stars');
      starsElement.textContent = '' + stars;
    }

    var redirectButton = document.getElementById('redirectButton');
    redirectButton.addEventListener('click', function() {
      window.location.href = 'bici.php'; // Reemplaza con la URL de redirección correcta
    });
    function goBack() {
        window.location.href = '../pantallas/nivelesP.php'; // Reemplaza con la URL para retroceder
    }
    function reloadPage() {
      location.reload();
    }
  </script>
</body>
</html>