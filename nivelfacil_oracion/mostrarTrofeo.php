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
      background-image: url('../imagenes/menuP.png');
      background-size: cover;
      background-position: center;
      width: 100px;
      height: 100px;
      border: none;
      cursor: pointer;
      position: absolute;
      top: 250px;
      right: -100px;
    }

    .custom-button:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body onload="playAudio()">
  <div class="image-container">
    <img src="../imagenes/profeo3.gif" alt="Imagen de transición">
    <div class="image-text">Felicidades.... Completastes el nivel</div>
    <audio id="audioPlayer">
      <source src="../sonidos/ringtones.mp3" type="audio/mpeg">
      Tu navegador no admite el elemento de audio.
    </audio>
    <a href="../pantallas/NivelesO.php">
      <button class="custom-button"></button>
    </a>
  </div>
  
  <script>
    function playAudio() {
      var audioPlayer = document.getElementById("audioPlayer");
      audioPlayer.play();
    }
  </script>
</body>
</html>
