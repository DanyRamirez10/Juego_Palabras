<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    #map {
      width: 100vw;
      height: 100vh;
      position: relative;
      background-image: url('../imagenes/fondo2.jpg'); /* Imagen de fondo del mar */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    }

    .island {
      position: absolute;
      width: 10vw; /* Cambiado a 10% del ancho de la ventana */
      height: 10vw; /* Cambiado a 10% del ancho de la ventana */
      max-width: 100px; /* Límite máximo de ancho */
      max-height: 100px; /* Límite máximo de altura */
      background-image: url('../imagenes/islas.jpg'); /* Imagen de la isla tropical */
      background-size: cover;
      cursor: pointer;
      display: flex; /* Agregado para alinear las estrellas */
      justify-content: center; /* Agregado para alinear las estrellas */
      align-items: flex-end; /* Agregado para alinear las estrellas */
    }

    .star {
      display: inline-block;
      width: 20px;
      height: 20px;
      background-image: url('../imagenes/trofeo2.png'); /* Imagen de la estrella */
      background-size: cover;
      margin-right: 2px;
    }

    .island.blocked {
      cursor: not-allowed;
      opacity: 0.5;
    }

    .update-button {
      display: block;
      margin-top: 10px;
      position: absolute;
      bottom: 20px;
      right: 20px;
    }

    @media (min-width: 768px) {
      /* Estilos para tablet */
      #map {
        width: 800px;
        height: 600px;
        margin: 0 auto;
      }

      .island {
        width: 100px;
        height: 100px;
      }
    }
  </style>
</head>
<body>
  <div id="map"></div>

  <button id="updateButton" class="update-button">Actualizar</button>

  <script>
    window.addEventListener('load', function() {
      var map = document.getElementById('map');
      var updateButton = document.getElementById('updateButton');

      // Crear islas tropicales en posiciones predefinidas
      createIsland(map, 20, 20, 'pelota.php', 'island1');
      createIsland(map, 40, 30, 'mama.php', 'island2');
      createIsland(map, 60, 15, 'casa.php', 'island3');
      createIsland(map, 30, 50, 'leña.php', 'island4');
      createIsland(map, 70, 40, 'mano.php', 'island5');

      updateButton.addEventListener('click', function() {
        localStorage.clear();
        location.reload();
      });
    });

    // Función para crear una isla en una posición específica con un enlace a otro archivo
    function createIsland(map, posX, posY, link, islandId) {
      var island = document.createElement('div');
      island.classList.add('island');
      island.style.left = posX + '%'; /* Cambiado a porcentaje */
      island.style.top = posY + '%'; /* Cambiado a porcentaje */

      // Verificar si la isla está bloqueada
      var isBlocked = localStorage.getItem(islandId) === 'blocked';
      if (isBlocked) {
        island.classList.add('blocked');
        var stars = island.querySelectorAll('.star');
        for (var i = 0; i < stars.length; i++) {
          stars[i].style.display = 'none';
        }
      }

      // Agregar las estrellas
      for (var i = 0; i < 3; i++) {
        var star = document.createElement('span');
        star.classList.add('star');
        island.appendChild(star);
      }

      island.addEventListener('click', function() {
        if (!island.classList.contains('blocked')) {
          // Guardar el estado de bloqueo en el almacenamiento local
          localStorage.setItem(islandId, 'blocked');

          window.location.href = link;
          island.classList.add('blocked');
          var stars = island.querySelectorAll('.star');
          for (var i = 0; i < stars.length; i++) {
            stars[i].style.display = 'none';
          }
        }
      });
      map.appendChild(island);
    }
  </script>
</body>
</html>