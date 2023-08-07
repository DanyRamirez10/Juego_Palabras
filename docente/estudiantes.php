<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de los Alumnos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border: 2px solid #333;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #999;
    }

    th {
      background-color: #333;
      color: #fff;
    }

    /* Estilo .table-hover */
    tbody tr:hover {
      background-color: #f5f5f5; /* Puedes ajustar el color a tu preferencia */
    }
    
    /* Estilo para el botón de salida */
    .btn-exit {
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 8px 15px;
      background-color: #007bff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    /* Estilo para el icono del botón de eliminar */
    .eliminar-icon {
      color: #ff0000; /* Color rojo para el icono de eliminar */
      cursor: pointer;
    }

    /* Estilo para el botón de crear usuario */
    .btn-create-user {
      position: absolute;
      top: 10px;
      left: 10px;
      padding: 8px 15px;
      background-color: #4caf50; /* Color verde para el botón de crear usuario */
      border: none;
      border-radius: 4px;
      color: #fff;
      cursor: pointer;
    }

    /* Estilos para la ventana modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
  <!-- Importar Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<a class="btn-exit" href="logout.php">Salir</a> <!-- Cambiar "cerrar_sesion.php" por el archivo de cierre de sesión si es necesario -->
  
  <h1>Listado de los alumnos registrados</h1>

 

  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido paterno</th>
        <th>Apellido materno</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include("../conexion/conexion.php");
        session_start();
        // Consulta para obtener los datos de la tabla de usuarios
        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);

        // Mostrar los datos en la tabla
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nomAlum"] . "</td>";
            echo "<td>" . $row["appAlum"] . "</td>";
            echo "<td>" . $row["apmAlum"] . "</td>";
            // Agregar botón de eliminar con icono de Font Awesome y enlace al script de eliminación
            echo "<td><a href=\"eliminar.php?id=" . $row["idAlum"] . "\"><i class=\"fas fa-trash-alt eliminar-icon\"></i></a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No se encontraron datos.</td></tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>
