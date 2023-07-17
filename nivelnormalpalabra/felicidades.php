<!DOCTYPE html>
<html>
<head>
  <style>
    /* Estilos adicionales */
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .image-container {
      position: relative;
    }
    
    .image-text {
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 36px;
      color: rgb(255, 255, 255);
      text-shadow: 2px 2px 4px rgba(1, 2, 0, 0.5);
      white-space: nowrap;
    }

    .custom-button {
      background-image: url('../imagenes/volver.png');
      background-size: cover;
      background-position: center;
      width: 150px;
      height: 150px;
      border: none;
      cursor: pointer;
    }

    .custom-button:hover {
      opacity: 0.8;
    }
    
    .button-container {
      position: absolute;
      bottom: 30px;
      right: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    .button-label {
      margin-top: 5px;
      font-size: 18px;
      color: rgb(255, 255, 255);
    }
  </style>
</head>
<body onload="playAudio()">
  <div class="image-container">
    <img src="../imagenes/profeo3.gif" alt="Imagen de transición">
    <div class="image-text">Felicidades, has terminado el nivel</div>
  </div>
  
  <div class="button-container">
    <a href="../pantallas/NivelesP.php" style="text-decoration: none;">
      <button class="custom-button"></button>
      <div class="text">Volver al menú de niveles</div>
      <p>Continúa jugando y divirtiéndote.</p>
    </a>
  </div>
  
  <audio id="audioPlayer">
    <source src="../sonidos/ganador.mp3" type="audio/mpeg">
  </audio>
  
  <script>
    function playAudio() {
      var audioPlayer = document.getElementById("audioPlayer");
      audioPlayer.play();
    }
  </script>
</body>
</html>



