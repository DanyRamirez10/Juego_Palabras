<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      align-items: center;
      height: 100vh;
      margin: 0;
      overflow: hidden;
      background-image: url("../imagenesO/fondoOra.jpg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .container {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-bottom: -330px;
      position: relative;
    }

    .dropZone {
      border: 5px solid black;
      background-color: white;
      width: 450px;
      height: 40px;
      padding: 20px;
      border-radius: 0;
      margin-bottom: 380px;
      position: relative;
    }

    .keyboard-container {
      position: relative;
      top: -100px; /* Ajusta esta propiedad según tu necesidad */
    }

    .keyboard {
      display: inline-block;
      border: 2px solid gray;
      padding: 30px;
      margin: 5px;
      cursor: pointer;
      font-family: 'Lumen', sans-serif;
    }

    .keyboard-1 {
      background-color: lightblue;
      font-size: 58px;
      font-weight: bold;
      font-family: 'Lumen-Full', sans-serif; /* Agrega la fuente Lumen-Full */
      width: 170px; /* Ajusta el valor según lo que necesites */
      height: 70px; /* Ajusta el valor según lo que necesites */
      padding: 10px; /* Ajusta el valor según lo que necesites */
      text-align: center;
    }

    .keyboard-2 {
      background-color: lightgreen;
      font-size: 58px;
      font-weight: bold;
      font-family: 'Lumen-Full', sans-serif; /* Agrega la fuente Lumen-Full */
      width: 170px; /* Ajusta el valor según lo que necesites */
      height: 70px; /* Ajusta el valor según lo que necesites */
      padding: 10px; /* Ajusta el valor según lo que necesites */
      text-align: center;
    }

    .keyboard-3 {
      background-color: lightyellow;
      font-size: 58px;
      font-weight: bold;
      font-family: 'Lumen-Full', sans-serif; /* Agrega la fuente Lumen-Full */
      width: 170px; /* Ajusta el valor según lo que necesites */
      height: 70px; /* Ajusta el valor según lo que necesites */
      padding: 10px; /* Ajusta el valor según lo que necesites */
      text-align: center;
    }

    .keyboard-4 {
      background-color: lightpink;
      font-size: 58px;
      font-weight: bold;
      font-family: 'Lumen-Full', sans-serif; /* Agrega la fuente Lumen-Full */
      width: 170px; /* Ajusta el valor según lo que necesites */
      height: 70px; /* Ajusta el valor según lo que necesites */
      padding: 10px; /* Ajusta el valor según lo que necesites */
      text-align: center;
    }

        @font-face {
          font-family: 'Lumen-Full';
          src: url('../Lumen-Full.ttf') format('truetype');
        }
        .dropZone .syllable {
          display: inline-block;
          border: none;
          padding: 0;
          margin: 10px;
          font-size: 50px;/*tamano de las letras*/
          font-weight: bold;
          font-family: 'Lumen-Full', sans-serif;
        }
    .syllables {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }


    .message-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50px;
    }

    .message {
      font-size: 20px;
      font-weight: bold;
      text-align: center;
      padding: 10px;
      margin-top: 10px;
      width: 300px;
      background-color: #eee;
      border: 2px solid #555;
      border-radius: 5px;
    }

    img {
      width: 20%;
      height: 30%;
      margin-top: 50px;
    }

    .button-container {
      position: fixed;
      bottom: 2%;
      left: 2%;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      margin-top: 90px;
    }

    .button-container img {
      width: 8vw;
      height: auto;
      margin-top: 10px;
      cursor: pointer;
    }

    .next-button {
      position: fixed;
      bottom: 2%;
      right: 2%;
    }

    .refresh-button {
      position: fixed;
      bottom: 2%;
      left: 2%;
    }

    .button-top-left {
      position: fixed;
      top: 2%;
      left: 2%;
      z-index: 9999;
      margin-top: 20px; /* Ajusta este valor según tu necesidad */
    }

    .button-top-left img {
      width: 8vw;
      height: auto;
      margin-top: 10px;
      cursor: pointer;
      background-color: white
    }

    .button-top-right {
      position: fixed;
      top: 2%;
      right: 2%;
      z-index: 9999;
    }

    .button-top-right img {
      width: 8vw;
      height: auto;
      margin-top: 3px;
      cursor: pointer;
    }

    .score {
      font-size: 18px;
      font-weight: bold;
      margin-top: 10px;
    }

    .audio-button {
      width: 70px;
      height: 70px;
      margin-top: 30px;
      cursor: pointer;
      background-color: #ddd;
      border: none;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .popup-container {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      animation-name: zoom;
      animation-duration: 3s;
      animation-timing-function: linear;
      animation-iteration-count: infinite;
    }

    @keyframes zoom {
      0% {
        transform: translate(-50%, -50%) scale(1);
      }
      50% {
        transform: translate(-50%, -50%) scale(1.2);
      }
      100% {
        transform: translate(-50%, -50%) scale(1);
      }
    }

    .popup-image {
      width: 90%;
      height: auto;
    }

    .audio-off {
      background-color: #ddd;
    }

    .audio-on {
      background-color: #ff7f50;
    }

    .audio-button img {
      width: 90%;
      height: 90%;
    }

    .header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 10px;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      z-index: 999;
    }

    @media screen and (max-width: 600px) {
      .header {
        font-size: 16px;
      }

      .container {
        margin-bottom: -230px;
      }

      .dropZone {
        margin-bottom: 280px;
      }

      .keyboard-container {
        top: 310px;
      }

      .keyboards {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
    }



  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var dropZone = document.querySelector(".dropZone");
      var keyboards = document.querySelectorAll(".keyboard");
      var syllablesContainer = document.createElement("div");
      syllablesContainer.classList.add("syllables");

      // Obtén la referencia a la imagen y al audio
      var imagenNinos = document.getElementById("imagen-ninos");
      var audioImagen = document.getElementById("audio-imagen");
      // Generar una lista de palabras y mezclarla
      var words = ["La", "brocha", "es", "roja."];
      var shuffledWords = shuffleArray(words);

      imagenNinos.addEventListener("click", function() {
        // Reproduce el audio al hacer clic en la imagen
        audioImagen.play();
       });
      // Mezclar el orden de los teclados
      var shuffledKeyboards = Array.from(keyboards).sort(function() {
        return 0.5 - Math.random();
      });

      var expectedWordCount = shuffledKeyboards.length;
      var isCorrect = false;
      var score = 0;
      var canContinue = false; // Variable para controlar si se permite pasar al siguiente nivel

      shuffledKeyboards.forEach(function(keyboard, index) {
        keyboard.textContent = shuffledWords[index];
        keyboard.addEventListener("click", function() {
          var letter = keyboard.textContent;
          var syllableElement = document.createElement("span");
          syllableElement.classList.add("syllable");
          syllableElement.textContent = letter;
          syllablesContainer.appendChild(syllableElement);
          dropZone.appendChild(syllablesContainer);
          keyboard.style.display = "none";
          
          checkEnteredWords();
        });
      });

      function checkEnteredWords() {
        var syllables = Array.from(dropZone.querySelectorAll(".syllable"));
        var enteredWordCount = syllables.length;

        if (enteredWordCount === expectedWordCount) {
          var enteredWord = syllables.map(function(syllable) {
            return syllable.textContent;
          }).join(" ");
          var correctWord = "La brocha es roja."; // Palabra correcta

          if (enteredWord === correctWord) {
            playAudio("audio-congratulations");
            isCorrect = true;
            canContinue = true; // Se permite pasar al siguiente nivel
            showPopupWithImage("../imagenes/balloon-3.gif"); // Muestra la ventana emergente con globitos
          } else {
            playAudio("audio-error");
            isCorrect = false;
            canContinue = false; // No se permite pasar al siguiente nivel
            showPopupWithImage("../imagenes/over.png"); // Muestra la ventana emergente con la imagen de error
          }
        }
        
        if (isCorrect) {
          score += 1; // Incrementa el puntaje por cada tecla ingresada correctamente
        }

        // Mostrar el puntaje en la consola
        console.log("Puntaje: " + score);

        // Mostrar el puntaje en la interfaz
        var scoreElement = document.querySelector(".score");
        if (scoreElement) {
          scoreElement.textContent = "Puntaje: " + score;
        }

        // Controlar la habilitación del botón de siguiente
        var nextButton = document.querySelector(".next-button");
        if (nextButton) {
          nextButton.disabled = !canContinue; // Deshabilita el botón si no se permite pasar al siguiente nivel
        }
      }

      function playAudio(elementId) {
        var audioElement = document.getElementById(elementId);
        audioElement.play();
      }

      function toggleAudio() {
        var audioButton = document.getElementById("audio-button");
        var audioElement = document.getElementById("audio-congratulations");
        var audioElement2 = document.getElementById("audio-second");
        var audioElement3 = document.getElementById("audio-new"); // Nuevo elemento de audio

       

        // Control del nuevo audio
        if (audioElement3.paused) {
          audioElement3.play();
          audioButton.classList.remove("audio-off");
          audioButton.classList.add("audio-on");
        } else {
          audioElement3.pause();
          audioElement3.currentTime = 0; // Reinicia el audio al principio
          audioButton.classList.remove("audio-on");
          audioButton.classList.add("audio-off");
        }
      }

      function shuffleArray(array) {
        var currentIndex = array.length, temporaryValue, randomIndex;

        // Mientras queden elementos para mezclar
        while (0 !== currentIndex) {

          // Seleccionar un elemento sin mezclar restante
          randomIndex = Math.floor(Math.random() * currentIndex);
          currentIndex -= 1;

          // Intercambiarlo con el elemento actual
          temporaryValue = array[currentIndex];
          array[currentIndex] = array[randomIndex];
          array[randomIndex] = temporaryValue;
        }

        return array;
      }
      
      var nextButton = document.createElement("img");
      nextButton.src = "../imagenes/adelante.png";
      nextButton.alt = "Siguiente archivo";
      nextButton.classList.add("next-button"); // Agrega la clase "next-button"
      nextButton.addEventListener("click", function() {
        if (canContinue) {
          window.location.href = "nivelO2.php";
        }
      });
      
      var backButton = document.createElement("img");
      backButton.src = "../imagenes/retroceder.png";
      backButton.alt = "Retroceder";
      backButton.style.width = "8vw";
      backButton.style.height = "auto";
      backButton.style.marginTop = "10px";
      backButton.style.cursor = "pointer";
      backButton.addEventListener("click", function() {
        window.history.back(); // Retrocede en la historia del navegador
      });
      
      var additionalButton = document.createElement("img");
      additionalButton.src = "../imagenes/borrar.png";
      additionalButton.alt = "Botón adicional";
      additionalButton.style.width = "8vw";
      additionalButton.style.height = "auto";
      additionalButton.style.marginTop = "10px";
      additionalButton.style.cursor = "pointer";
      additionalButton.addEventListener("click", function() {
        window.location.reload(); // Recarga la página actual
      });
      
      var buttonContainer = document.querySelector(".button-container");
      buttonContainer.appendChild(backButton);
      buttonContainer.appendChild(additionalButton);
      buttonContainer.appendChild(nextButton);

      var audioButton = document.createElement("button");
      audioButton.id = "audio-button";
      audioButton.classList.add("audio-button", "audio-off"); // Agrega la clase "audio-off" para el botón desactivado
      audioButton.addEventListener("click", toggleAudio);

      var audioIcon = document.createElement("img");
      audioIcon.src = "../imagenes/musica.webp";

      audioButton.appendChild(audioIcon);
      
      var audioButtonContainer = document.querySelector(".button-top-right");
      audioButtonContainer.appendChild(audioButton);
      
      // Mostrar el puntaje inicial en la interfaz
      var scoreElement = document.createElement("div");
      scoreElement.textContent = "Puntaje: " + score;
      scoreElement.classList.add("score");
      buttonContainer.appendChild(scoreElement);

      // Controlar la habilitación del botón de siguiente al cargar la página
      nextButton.disabled = !canContinue; // Deshabilita el botón si no se permite pasar al siguiente nivel
    });
    
    function showPopupWithImage(imageUrl) {
      var popupContainer = document.createElement("div");
      popupContainer.classList.add("popup-container");

      var popupImage = document.createElement("img");
      popupImage.src = imageUrl;
      popupImage.classList.add("popup-image");

      popupContainer.appendChild(popupImage);
      document.body.appendChild(popupContainer);

      setTimeout(function() {
        document.body.removeChild(popupContainer);
      }, 3000); // Cierra la ventana emergente después de 3 segundos
    }
  </script>
</head>
<body>
  <div class="header">Modo de juego oraciones (NIVEL 3)</div>

  <img id="imagen-ninos" src="../imagenesO/brocha.webp" alt="Niños">
  <!--reproduccion de audio al hacer clic en la imagen-->
  <audio id="audio-imagen" src="../sonidos/oraciones_nivelDificil/brocha.mp3"></audio>
  
  <div class="container">
    <div class="dropZone">
      <div class="syllables">
        <!-- Aquí puedes agregar los elementos que desees colocar dentro del dropZone -->
      </div>
    </div>
  </div>

  <div class="keyboard-container">
    <div class="keyboards">
      <div class="keyboard keyboard-1" data-keyboard="1"></div>
      <div class="keyboard keyboard-2" data-keyboard="2"></div>
      <div class="keyboard keyboard-3" data-keyboard="3"></div>
      <div class="keyboard keyboard-4" data-keyboard="4"></div>
    </div>
  </div>

  <div class="button-container">
  </div>

  <audio id="audio-congratulations" src="../sonidos/bien.mp3"></audio>
  <audio id="audio-new" src="../sonidos/audioInicial.mp3"></audio>
  <audio id="audio-error" src="../sonidos/error.mp3"></audio>

  <div class="button-top-left">
    <img src="../imagenes/menuP.png" alt="Botón adicional" onclick="window.location.href = '../pantallas/NivelesO.php';" />
  </div>

  <div class="button-top-right">
    <!-- Aquí solo hay un botón de audio -->
  </div>
</body>
</html>