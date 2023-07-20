<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla con Estilo</title>
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
      background-color: #ccc;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
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
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='3'>No se encontraron datos.</td></tr>";
        }

        // Cerrar la conexión
        $conn->close();
      ?>
    </tbody>
  </table>
</body>
</html>


