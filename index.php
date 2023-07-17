<!DOCTYPE html>
<html>
<head>
  <!-- Agrega el enlace a la biblioteca de Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Estilos generales */
    * {
      box-sizing: border-box;
    }

    /* Estilos para el contenedor */
    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      position: relative;
      width: 90%;
      max-width: 500px;
      height: 300px;
      border: 2px solid #007bff;
      border-radius: 10px;
      padding: 20px;
      background-color: #cfe9ff; /* Cambia el color de fondo a un tono celeste más claro */
      margin: 0 auto;
    }

    /* Estilos para los botones */
    .button {
      display: inline-block;
      padding: 10px;
      border: none;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      margin-bottom: 20px; /* Ajusta el espacio entre los botones */
      border-radius: 5px; /* Cambia la forma del botón a redondeado */
      transition: background-color 0.3s; /* Agrega una transición suave al cambiar el color de fondo */
    }

    /* Estilos para el texto del estudiante */
    .student-name {
      margin-left: 5px;
    }

    /* Estilos para el texto del profesor */
    .teacher-name {
      margin-left: 5px;
    }

    /* Estilos para el botón al pasar el cursor por encima */
    .button:hover {
      background-color: #0056b3; /* Cambia el color de fondo al pasar el cursor por encima */
    }

    /* Estilos para el botón del profesor */
    .teacher-button {
      background-color: red; /* Cambia el color de fondo del botón del profesor a rojo */
    }
    
    /* Estilos para el cuerpo del documento */
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url('imagenes/fondoPrincipalO.png'); /* Reemplaza 'ruta/a/la/imagen.jpg' con la ruta de tu imagen de fondo */
      background-size: cover; /* Ajusta la imagen al tamaño del contenedor */
      background-repeat: no-repeat; /* Evita que la imagen se repita */
      font-size: 16px;
    }
    
    /* Estilos para el texto superior */
    h1 {
      color: green; /* Cambia el color del texto a verde */
      margin-top: 10px; /* Ajusta el margen superior del texto */
      text-align: center;
    }

    /* Estilos para el texto en el borde superior */
    .container::before {
      content: "Selecciona tu usuario";
      position: absolute;
      top: -20px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #cfe9ff;
      padding: 5px 10px;
      border-radius: 5px;
      font-weight: bold;
    }

    /* Media query para pantallas pequeñas */
    @media screen and (max-width: 600px) {
      .container {
        width: 90%;
        max-width: 400px;
      }
    }

    /* Media query para pantallas extra pequeñas */
    @media screen and (max-width: 400px) {
      .container {
        width: 90%;
        max-width: 300px;
      }
    }
  </style>
</head>
<body>
  <h1>BIENVENIDOS AL JUEGO DE PALABRAS</h1>

  <div class="container">
    <button class="button student-button" onclick="window.location.href = 'loginAlumno.php';">
      <i class="fas fa-user-graduate"></i>
      <span class="student-name">Estudiante</span>
    </button>

    <button class="button teacher-button" onclick="window.location.href = 'docente/';">
      <i class="fas fa-chalkboard-teacher"></i>
      <span class="teacher-name">Profesor</span>
    </button>
  </div>

  <!-- Recuerda agregar el script de Font Awesome si no lo has hecho en tu proyecto -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
