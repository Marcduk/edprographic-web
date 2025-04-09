<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pises</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      background: linear-gradient(90deg, #47183e, #e4d9d9, #47183e);
      padding-top: 50px;
      font-family: 'Arial', sans-serif;
    }
    .container {
      max-width: 600px;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      font-family: 'Times New Roman', serif;
      font-weight: bold;
      color: #000;
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }
    .btn {
      margin: 10px 0;
      font-size: 16px;
      border-radius: 5px;
      transition: all 0.3s;
    }
    .btn:hover {
      transform: scale(1.05);
    }
    .btn-default {
      background-color: #fff;
      color: #000;
      border: 2px solid #000;
    }
    .btn-default:hover {
      background-color: rgba(0,0,0,0.1);
      color: #000;
      border-color: #000;
    }
    .btn-default i {
      color: #000;
      margin-right: 5px;
    }
    .form-group label {
      font-weight: bold;
      color: #000;
    }
    .form-control {
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .alert {
      margin-top: 20px;
      border-radius: 5px;
    }
    .text-center {
      text-align: center;
    }
  </style>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1>Formulario Tabla Ciudades</h1>
  <a href="menu.php" class="btn btn-default btn-return"><i class="fas fa-arrow-left"></i> Volver al Menú</a>

  <!-- ⚠️ CORREGIDO: ahora apunta a ciudad.php -->
  <form method="POST" action="ciudad.php">
    <div class="form-group">
      <br>
      <label for="id_ciudad">ID Ciudad</label>
      <input type="text" name="id_ciudad" class="form-control" id="id_ciudad">
    </div>
    <div class="form-group">
      <label for="nombre_ciudad">Nombre de la ciudad</label>
      <input type="text" name="nombre_ciudad" class="form-control" id="nombre_ciudad">
    </div>
    <div class="text-center">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Nuevo" class="btn btn-success" name="btn_nuevo">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </div>
  </form>

  <?php
  include("conexion.php");

  $id_ciud = "";
  $nomb_ciud = "";

  if (isset($_POST['btn_consultar'])) {
      $id_ciud = $_POST['id_ciudad'];
      if ($id_ciud == "") {
          echo '<div class="alert alert-warning">Se requiere el número del ID de la ciudad</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM ciudad WHERE id_ciudad = '$id_ciud'");
          if ($row = $ver->fetch()) {
              echo '<div class="alert alert-info">';
              echo 'ID: ' . $row['id_ciudad'] . '<br>';
              echo 'Nombre de la ciudad: ' . $row['nombre_ciudad'] . '<br>';
              echo '</div>';
          } else {
              echo '<div class="alert alert-warning">El ID de la ciudad no existe en la tabla</div>';
          }
      }
  }

  if (isset($_POST['btn_nuevo'])) {
      $id_ciud = $_POST['id_ciudad'];
      $nomb_ciud = $_POST['nombre_ciudad'];

      if ($id_ciud == "" || $nomb_ciud == "") {
          echo '<div class="alert alert-warning">Los campos: ID Ciudad y Nombre de este son obligatorios</div>';
      } else {
          echo "<div class='alert alert-info'>Voy a intentar insertar: $id_ciud - $nomb_ciud</div>";
          $sql_insert = "INSERT INTO ciudad(id_ciudad, nombre_ciudad) VALUES ('$id_ciud', '$nomb_ciud')";
          $myPDO->query($sql_insert);
          echo '<div class="alert alert-success"> La ciudad se registró en la tabla</div>';
      }
  }

  if (isset($_POST['btn_actualizar'])) {
      $id_ciud = $_POST['id_ciudad'];
      $nomb_ciud = $_POST['nombre_ciudad'];

      if ($id_ciud == "" || $nomb_ciud == "") {
          echo '<div class="alert alert-warning">Los campos: ID Ciudad y Nombre de este son obligatorios</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM ciudad WHERE id_ciudad = '$id_ciud'");
          if ($row = $ver->fetch()) {
              $sql_update = "UPDATE ciudad SET nombre_ciudad = '$nomb_ciud' WHERE id_ciudad = '$id_ciud'";
              $myPDO->query($sql_update);
              echo '<div class="alert alert-success">Actualización realizada</div>';
          } else {
              echo '<div class="alert alert-warning">El ID de la ciudad no existe en la tabla</div>';
          }
      }
  }

  if (isset($_POST['btn_eliminar'])) {
      $id_ciud = $_POST['id_ciudad'];
      if ($id_ciud == "") {
          echo '<div class="alert alert-warning">Se requiere el número del ID de la ciudad</div>';
      } else {
          $ver = $myPDO->query("SELECT * FROM ciudad WHERE id_ciudad = '$id_ciud'");
          if ($row = $ver->fetch()) {
              $sql = "DELETE FROM ciudad WHERE id_ciudad = '$id_ciud'";
              $myPDO->query($sql);
              echo '<div class="alert alert-success">El registro se eliminó</div>';
          } else {
              echo '<div class="alert alert-warning">El ID de la ciudad no existe en la tabla</div>';
          }
      }
  }
  ?>

</div>

</body>
</html>